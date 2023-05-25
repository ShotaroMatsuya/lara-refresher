<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function rooms() {
        // return $this->belongsToMany('App\Room', 'city_room', 'city_id', 'room_id'); //2nd 3rd 4th args are optional
        return $this->belongsToMany('App\Room', 'city_room', 'city_id', 'room_id')->withPivot('created_at', 'updated_at'); //2nd 3rd 4th args are optional
        // wherePivot() wherePivotNotIn() or wherePivotIn('priority', [1, 2]);
    }
}
