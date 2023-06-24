<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'advt_id',
        'name_car',
        'max_places',
        'allowed_number_of_seats',
        'country',
        'class',
        'year_from',
        'year_to',
    ];

    public function passengers() {
        return $this->hasMany(Passenger::class, 'id', 'advt_id');
    }
}
