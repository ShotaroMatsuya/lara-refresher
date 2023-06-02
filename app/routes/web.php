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
    $hotel_id = [1];
    
    $result = Reservation::with(['rooms.type', 'user'])
            ->whereHas('rooms.hotel', function($q) use($hotel_id) {
                $q->whereIn('hotel_id', $hotel_id);
            })
            ->get();

    dump($result);
    
    return view('welcome');
});
