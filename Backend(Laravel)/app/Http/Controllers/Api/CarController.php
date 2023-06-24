<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advt;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function store(Request $request) {
        $errors = Validator::make(
            $request->all(),
            [
                'name_car' => 'string|min:2|max:255',
                'max_places' => 'numeric|min:2|max:8',
                'allowed_number_of_seats' => 'numeric|min:1|max:7'
            ],
            [
                'name_car.string' => 'Название машины должен быть строкой',
                'name_car.min' => 'Название машины не может быть короче 2 символов',
                'name_car.max' => 'Название машины не может превышать 255 символов',

                'max_places.numeric' => 'Максимум места в машине должно быть числом',
                'max_places.max' => 'Максимум места в машине не может превышать 8',
                'max_places.min' => 'В машине должно быть хотя бы двухместной',

                'allowed_number_of_seats.numeric' => 'Максимум посадочного места в машине должно быть числом',
                'allowed_number_of_seats.max' => 'Максимум посадочного места в машине не может превышать 7',
                'allowed_number_of_seats.min' => 'В машине свободное место должно быть хотя бы одно место',
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $advtId = Advt::where('header', $request->header)->
        where('description', $request->description)->
        where('point_meeting', $request->point_meeting)->
        get('id');

        $query = Car::make($request->all());
        $query->advt_id = $advtId[0]->id;
        $query->save();
        return response('dct uel');
    }

    public function index(Request $request) {
        return Car::where('id', $request->id)->get();
    }
}
