<?php

namespace LaravelForum\Providers;

use LaravelForum\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    //  composer install時に一時的にコメント化する必要あり
    public function boot()
    {
        Schema::defaultStringLength(191);
        //shareメソッドでviewとデータを共有することができる(viewでは変数$channelsで受け取る)
        View::share('channels', Channel::all());
    }
}