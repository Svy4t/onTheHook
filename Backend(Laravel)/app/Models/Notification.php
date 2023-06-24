<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'interlocutor_id',
        'description',
        'status',
    ];

    protected $hidden = [
        'updated_at',
        'user_id'
    ];

    public function interlocutor() {
        return $this->hasOne(User::class, 'id', 'interlocutor_id');
    }
}
