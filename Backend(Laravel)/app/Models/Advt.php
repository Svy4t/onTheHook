<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Advt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'header',
        'description',
        'place',
        'date',
        'point_meeting'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'advt_id', 'id')->orderBy('id', 'desc')->with('user');
    }

    public function car() {
        return $this->hasOne(Car::class, 'advt_id', 'id');
    }

    public function passengers() {
        return $this->hasMany(Passenger::class, 'advt_id', 'id');
    }
}
