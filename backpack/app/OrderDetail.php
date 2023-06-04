<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    
    public function product()
    {
        return $this->hasOne('App\Product', 'product_code', 'product_code');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
