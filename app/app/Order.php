<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    public $timestamps = false;
    protected $fillable = [
        'client_id','order_date', 'order_value'
    ];
    public function details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
