<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Participant;
use App\Models\Comment;
use App\Models\Advt;
use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    function auth(Request $request)
    {
        $errors = Validator::make(
            $request->all(),
            [
                'login' => 'exists:users|string|required',
                'password' => 'required|string'
            ],
            [
                'login.required' => 'Адрес электронной почты обязателен',
                'login.string' => 'Поле "Адрес электронной почты" должно быть строкой',
                'login.exists' => 'Данного пользователя не существует',
                'password.required' => 'Пароль обязателен',
                'password.string' => 'Пароль должен быть строкой'
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $user = User::where('login', $request->login)->where('password', md5($request->password . 'salt'))->get();
        if (count($user)) {
            $token = Str::random(15);
            $newUser = $user[0];
            $newUser->token = $token;
            $newUser->save();
            return $user[0];
        }
        return response('Вы не вошли', 404);
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
                'date_of_birth' => 'required|date'
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

                'login.unique' => 'Адрес электронной почты уже занят',
                'login.string' => 'Адрес электронной почты должен быть строкой',
                'login.email' => 'Адрес электронной почты некорректен',
                'login.min' => 'Адрес электронной почты не может быть короче 8 символов',
                'login.max' => 'Адрес электронной почты не может превышать 255 символов',

                'password.required' => 'Пароль обязателен',
                'password.string' => 'Пароль должен быть строкой',
                'password.min' => 'Пароль не может быть короче 8 символов',
                'password.max' => 'Пароль не может превышать 255 символов',
                'password.same' => 'Пароль должен соответствовать подтверждению пароля',

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

        $users = User::make($request->all());
        $users->password = md5($users->password . 'salt');
        $users->rest_comment = 'none';
        $users->rest_advt = 'none';
        $users->rest_car = 'none';
        $users->rest_message = 'none';
        $users->rest_participate_in_the_event = 'none';
        $users->rest_event = 'none';
        $users->role = 'none';
        $users->token = Str::random(15);
        $users->save();

    }

    function getUser(Request $request)
    {
        $countEvents = Event::where('organizer',$request->id)->get();
        $countPartsInEvents = Participant::where('user_id',$request->id)->get();
        $countComment = Comment::where('user_id',$request->id)->get();
        $countEstimated = UserRating::where('user_who_id',$request->id)->get();
        $user = User::where('id', $request->id)->with("rating")->get();
        $response = [
            'user' => $user,
            'events' => count($countEvents),
            'parts' => count($countPartsInEvents),
            'comments' => count($countComment),
            'estimates' => count($countEstimated),
        ];
        return $response;
    }

    function restraction(Request $request) {
        if (isset($request->comment)) {
            User::where('id', $request->id)->update([
                'rest_comment' => $request->comment
            ]);
        }

        if (isset($request->advt)) {
            User::where('id', $request->id)->update([
                'rest_advt' => $request->advt
            ]);
        }

        if (isset($request->car)) {
            User::where('id', $request->id)->update([
                'rest_car' => $request->car
            ]);
        }

        if (isset($request->event)) {
            User::where('id', $request->id)->update([
                'rest_event' => $request->event
            ]);
        }

        if (isset($request->part)) {
            User::where('id', $request->id)->update([
                'rest_participate_in_the_event' => $request->part
            ]);
        }

        if (isset($request->message)) {
            User::where('id', $request->id)->update([
                'rest_message' => $request->message
            ]);
        }
    }

    function getUserRating(Request $request) {
        return UserRating::where('user_who_id', $request->id)->where('user_for_id', $request->user_for_id)->get('rating');
    }

    function userRating(Request $request) {
        $total = UserRating::where('user_who_id', $request->user_who_id)->where('user_for_id', $request->user_for_id)->get();
        if (count($total)) {
            UserRating::where('user_who_id', $request->user_who_id)->where('user_for_id', $request->user_for_id)->update([
                'rating' => $request->rating
            ]);
        }
        else {
            $rating = UserRating::make($request->all());
            $rating->save();
        }
    }

    function getRests(Request $r) {
        $user = User::where('id',$r->id)->get();
        return [
            'car' => $user[0]->rest_car,
            'advt' => $user[0]->rest_advt,
            'comment' => $user[0]->rest_comment,
            'message' => $user[0]->rest_message,
            'part' => $user[0]->rest_participate_in_the_event,
            'event' => $user[0]->rest_event
        ];
    }


}
