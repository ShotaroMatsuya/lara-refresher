<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }

}
