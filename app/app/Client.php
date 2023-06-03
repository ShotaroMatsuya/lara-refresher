<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $fillable = [
        'client_name', 'client_address', 'client_city', 'client_postal_code'
    ];
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
