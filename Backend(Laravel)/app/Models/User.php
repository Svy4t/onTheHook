<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestaps = false;
    protected $fillable = [
        'name',
        'surname',
        'login',
        'password',
        'date_of_birth',
        'avatar',
        'fishing_rod',
        'tent',
        'motor_boat',
        'boat',
    ];

    public function rating() {
        return $this->hasMany(UserRating::class, 'user_for_id', 'id');
    }
}
