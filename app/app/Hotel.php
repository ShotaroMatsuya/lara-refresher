<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }
}
