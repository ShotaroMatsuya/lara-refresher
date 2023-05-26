<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function cities()
    {
        return $this->belongsToMany('App\City', 'city_room', 'room_id', 'city_id')->withPivot('created_at','updated_at'); // 1st 2nd 3rd args are optional
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}

