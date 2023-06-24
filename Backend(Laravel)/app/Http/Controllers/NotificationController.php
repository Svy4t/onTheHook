<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index($id) {
        return Notification::where('user_id',$id)->with('interlocutor')->get();
    }

    public function indexUnread($id) {
        return Notification::where('user_id',$id)->where('status','Не прочитано')->get('id');
    }

    public function store(Request $request) {
        $newNot = new Notification();
        $newNot->user_id = $request->user_id;
        $newNot->interlocutor_id = $request->interlocutor_id;
        $newNot->description = $request->description;
        $newNot->status = 'Не прочитано';
        $newNot->save();
        return 'Все гуд';
    }

    public function updateStatus(Request $request) {
        foreach ($request->nots_id as $value) {
            Notification::where('id', $value)->update([
                'status' => 'Прочитано'
            ]);
        }
        return 'Все просмотрено';
    }

    public function delete($id) {
        return Notification::where('id',$id)->delete();
    }
}
