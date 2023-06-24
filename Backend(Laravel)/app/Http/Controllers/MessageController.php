<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function getMessages(Request $q) {
        $messages = Message::all();
        $newMessages = [];
        foreach ($messages as $mess) {
            if (($mess->user_id == $q->user_id && $mess->interlocutor_id == $q->interlocutor_id) || ($mess->interlocutor_id == $q->user_id && $mess->user_id == $q->interlocutor_id)) array_push($newMessages, $mess);
        }
        return $newMessages;
    }

    public function addMessage(Request $r) {
        $errors = Validator::make(
            $r->all(),
            [
                'text' => 'string|required|max:5000',
            ],
            [
                'text.string' => 'Текст должен быть строкой',
                'text.required' => 'Текст должен быть обязателен',
                'text.max' => 'Текст не может превышать 5000 символов',
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $newMessage = new Message();
        $newMessage->user_id = $r->user_id;
        $newMessage->interlocutor_id = $r->interlocutor_id;
        $newMessage->text = $r->text;
        $newMessage->save();

        return Message::where('user_id',$r->user_id)->where('interlocutor_id',$r->interlocutor_id)->get();
    }

    public function delete(Request $r) {
        $message = Message::where('user_id',$r->user_id)->where('interlocutor_id',$r->interlocutor_id)->where('created_at',$r->time)->get();
        if (count($message)) $message[0]->delete();
        else return 'Данного сообщения не существует';

        return Message::where('user_id',$r->user_id)->where('interlocutor_id',$r->interlocutor_id)->get();
    }
}
