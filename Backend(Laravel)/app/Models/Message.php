<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'interlocutor_id',
        'text'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function interlocutor() {
        return $this->hasOne(User::class, 'id', 'interlocutor_id');
    }

}
