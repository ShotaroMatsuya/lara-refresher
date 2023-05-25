<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'meta' => 'json',
    ];

    public function address()
    {
        return $this->hasOne('App\Address', 'user_id', 'id'); // 2nd 3rd args optional
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','user_id', 'id'); // 2nd 3rd args optional
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}

