<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function auth(Request $request)
    {
        $errors = Validator::make(
            $request->all(),
            [
                'email' => 'exists:users|string|required',
                'password' => 'required|string'
            ],
            [
                'email.required' => 'Адрес электронной почты обязателен',
                'email.string' => 'Поле "Адрес электронной почты" должно быть строкой',
                'email.exists' => 'Данного пользователя не существует',
                'password.required' => 'Пароль обязателен',
                'password.string' => 'Пароль должен быть строкой'
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $user = User::where('email', $request->email)->where('password', md5($request->password . 'salt'))->get();
        if (count($user)) {
            $token = Str::random(15);
            $newUser = $user[0];
            $newUser->token = $token;
            $newUser->save();
            return response()->json([
                'token' => $token,
                'id' => $newUser->id
            ]);
        }
        return response($request, 404);
    }

    function register(Request $request)
    {
        $errors = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:2|max:255',
                'surname' => 'required|string|min:2|max:255',
                'login' => 'unique:users|email|string|required|min:8|max:255',
                'password' => 'required|string|min:8|max:255|same:password_confirmation',
                'password_confirmation' => 'required|string|min:8|max:255',
            ],
            [
                'name.required' => 'Имя пользователя обязательно',
                'name.string' => 'Имя пользователя должно быть строкой',
                'name.min' => 'Имя пользователя не может быть короче 2 символов',
                'name.max' => 'Имя пользователя не может превышать 255 символов',

                'surname.required' => 'Фамилия пользователя обязательно',
                'surname.string' => 'Фамилия пользователя должно быть строкой',
                'surname.min' => 'Фамилия пользователя не может быть короче 2 символов',
                'surname.max' => 'Фамилия пользователя не может превышать 255 символов',

                'login.required' => 'Адрес электронной почты обязательно',
                'login.unique' => 'Адрес электронной почты уже занят',
                'login.string' => 'Адрес электронной почты должен быть строкой',
                'login.email' => 'Адрес электронной почты некорректен',
                'login.min' => 'Адрес электронной почты не может быть короче 8 символов',
                'login.max' => 'Адрес электронной почты не может превышать 255 символов',

                'password.required' => 'Пароль обязателен',
                'password.string' => 'Пароль должен быть строкой',
                'password.min' => 'Пароль не может быть короче 8 символов',
                'password.max' => 'Пароль не может превышать 255 символов',
                'password.same' => 'Пароли должны совпадать',

                'password_confirmation.required' => 'Подтверждение пароля обязательно',
                'password_confirmation.string' => 'Подтверждение пароля должно быть строкой',
                'password_confirmation.min' => 'Подтверждение пароля не может быть короче 8 символов',
                'password_confirmation.max' => 'Подтверждение пароля не может превышать 255 символов',
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->password = md5($request->password . 'salt');
        $user->login = $request->login;
        $user->rest_comment = false;
        $user->rest_advt = false;
        $user->rest_car = false;
        $user->rest_message = false;
        $user->rest_participate_in_the_event = false;
        $user->rest_event = false;
        $user->role = 'none';
        $user->date_of_birth = $request->date;
        $user->token = Str::random(15);

        $filename = Str::random(15).'.'.$request->file('photo')->getClientOriginalExtension();
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'avatars'
        ]);
        $disk->put('/'.$filename,file_get_contents($request->file('photo')));

        $user->avatar = $filename;
        $user->save();
        return $user->id;
    }

    // public function update(Request $request) {
    //     if (isset($request->file('avatar'))) {
    //         $filename = Str::random(15).'.'.$request->file('avatar')->getClientOriginalExtension();
    //         $disk = Storage::build([
    //             'driver' => 'local',
    //             'root' => 'avatars'
    //         ]);
    //         $disk->put('/'.$filename,file_get_contents($request->file('avatar')));
    //         User::where('id', $request->id)->update([
    //             'avatar' => $request->name,
    //         ]);
    //     }
    //     if (isset($request->name)) {
    //         User::where('id', $request->id)->update([
    //             'name' => $request->name
    //         ]);
    //     }
    //     if (isset($request->surname)) {
    //         User::where('id', $request->id)->update([
    //             'surname' => $request->surname
    //         ]);
    //     }
    //     if (isset($request->middle_name)) {
    //         User::where('id', $request->id)->update([
    //             'middle_name' => $request->middle_name
    //         ]);
    //     }
    //     if (isset($request->tel)) {
    //         User::where('id', $request->id)->update([
    //             'tel' => $request->tel
    //         ]);
    //     }
    // }

    function getUser(Request $request) {
        return User::where('token', $request->token)->get();
    }

    function updatePhoto(Request $r) {
        $filename = Str::random(15).'.'.$r->file('photo')->getClientOriginalExtension();
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'avatars'
        ]);
        $disk->put('/'.$filename,file_get_contents($r->file('photo')));
        User::where('id',$r->id)->update([
            'avatar' => $filename
        ]);
    }

    function updateUser(Request $request) {
        User::where('id',$request->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            // 'date_of_birth' => $request->date_of_birth,
        ]);
    }

    function updateDateUser(Request $request) {
        User::where('id',$request->id)->update([
            'date_of_birth' => $request->date_of_birth
        ]);
    }

    function updateInventory(Request $request) {
        User::where('id',$request->id)->update([
            'fishing_rod' => $request->fishing_rod,
            'tent' => $request->tent,
            'motor_boat' => $request->motor_boat,
            'boat' => $request->boat,
        ]);
    }
}
