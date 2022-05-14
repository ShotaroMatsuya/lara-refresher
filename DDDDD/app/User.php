<?php

namespace LaravelForum;

use LaravelForum\Reply;
use LaravelForum\Discussion;
use Illuminate\Notifications\Notifiable;
use LaravelForum\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail //email-verificationを実装する
{
    use Notifiable; //userモデルからnotification関連のメソッドを使用する事ができる

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
    ];
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function sendEmailVerificationNotification() //MustVerifyEmailクラスのメソッドをoverwriteする
    {
        $this->notify(new VerifyEmail());
    }
}
