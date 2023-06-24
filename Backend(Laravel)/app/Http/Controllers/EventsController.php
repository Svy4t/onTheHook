<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function index()
    {
        return Event::where('confirmed',true)->with('organizer')->with('parts')->get();
    }

    public function store(Request $request)
    {
        $errors = Validator::make(
            $request->all(),
            [
                'header' => 'string|min:11|required',
                'description' => 'string|max:5000|required'
            ],
            [
                'header.string' => 'Заголовок должен быть строкой',
                'header.min' => 'Заголовок не может быть короче 11 символов',
                'header.required' => 'Заголовок не может превышать 255 символов',

                'description.string' => 'Описание должно быть строкой',
                'description.max' => 'Описание не должно превышать 5000 симовлов',
                'description.required' => 'Описание обязательно',
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $event = Event::make($request->all());
        $event->confirmed = false;
        $event->save();

        return 'Ваша заявка была отправлена';
    }

    public function show($id) {
        return Event::where('id',$id)->with('organizer')->with('parts')->get();
    }

    public function myEvents(Request $r) {
        $events = Event::with('organizer')->with('parts')->get();
        $myParticipation = [];
        foreach ($events as $value) {
            $p = Participant::where('event_id', $value->id)->where('user_id',$r->user_id)->get();
            if(count($p)) array_push($myParticipation,$value);
        }
        return $myParticipation;
    }

    public function notConfirmedEvents() {
        return Event::where('confirmed',false)->with('organizer')->with('parts')->get();
    }

    public function confirmedEvent(Request $r){
        $user = User::where('id',$r->organizer)->get('role');
        if ($user !== 'admin') User::where('id',$r->organizer)->update([
            'role' => 'organizer'
        ]);
        Event::where('id',$r->event_id)->update([
            'confirmed' => true
        ]);
    }

    public function delete(Request $r){
        Event::where('id',$r->event_id)->delete();
    }
}
