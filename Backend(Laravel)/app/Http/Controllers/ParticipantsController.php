<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index(Request $request) {
        return Participant::where('event_id',$request->event_id)->get();
    }

    public function store(Request $request) {
        $par = Participant::make($request->all());
        $par->save();
        return 'Вы зарегестрироваись на это мероприятие';
    }

    public function delete(Request $request) {
        return Participant::where('user_id',$request->user_id)->where('event_id',$request->event_id)->delete();
    }

    public function found(Request $request) {
        $user = Participant::where('user_id',$request->user_id)->where('event_id',$request->event_id)->get();
        if (count($user)) return 1;
        else return 0;
    }
}