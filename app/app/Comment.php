<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user() {
        return $this->belongsTo('App\User',  'user_id', 'id'); // 2nd 3rd args optional
    }

    public function country() {
        return $this->hasOneThrough('App\Address', 'App\User', 'id', 'user_id', 'user_id', 'id')->select('country as name');
    }
}
