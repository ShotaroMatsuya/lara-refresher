<?php

use App\Reservation;
use App\Room;
use App\RoomType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $result = DB::table('users')->orderByDesc(
        DB::table('reservations')
            ->select('price')
            ->whereColumn('users.id', 'reservations.user_id')
            ->orderByDesc('price')
            ->limit(1)
    )->get();
    
    dump($result);
    
    return view('welcome');
});
