<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function type()
    {
        return $this->belongsTo('App\RoomType');
    }
}
