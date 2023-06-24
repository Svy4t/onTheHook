<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function store(Request $request) {
        $errors = Validator::make(
            $request->all(),
            [
                'description' => 'required|string|max:255',
            ],
            [
                'description.required' => 'Описание объявления обязательно',
                'description.string' => 'Описание объявления должно быть строкой',
                'description.max' => 'Описание объявления не может превышать 255 символов',
            ]
        );

        if ($errors->fails()) {
            return response()->json([
                'errors' => $errors->errors(),
            ], 422);
        }

        $comment = Comment::make($request->all());
        $comment->save();

        return Comment::where('advt_id', $request->advt_id)->orderBy('id', 'desc')->with('user')->get();
    }

    public function delete(Request $request) {
        Comment::where('id', $request->id)->delete();
        return Comment::where('advt_id', $request->advt_id)->orderBy('id', 'desc')->with('user')->get();
    }
}
