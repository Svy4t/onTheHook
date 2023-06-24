<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Participant;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'description',
        'place',
        'day',
        'start',
        'end',
        'organizer',
        'win',
        'max_people'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function organizer() {
        return $this->hasOne(User::class, 'id', 'organizer');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function parts() {
        return $this->hasManyThrough(User::class,Participant::class, 'event_id', 'id', 'id', 'user_id');
    }

    // public function infoAboutOrganizer() {
    //     return $this->hasOneThrough(User::class,Participant::class, 'event_id', 'id', 'id', 'user_id');
    // }
}
