<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'city_room', 'city_id', 'room_id')->withPivot('created_at','updated_at'); // 1st 2nd 3rd args are optional
        // wherePivot() wherePivotNotIn() or wherePivotIn('priority', [1, 2]);
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
