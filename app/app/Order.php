<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    public $timestamps = false;
    
    public function details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
