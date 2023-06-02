<?php

use App\City;
use App\Hotel;
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
    $hotel = Hotel::find(1);
    
    $room_type = new RoomType();
    $room_type->size = 2;
    $room_type->price = 200;
    $room_type->amount = 2;
    $room_type->save();
    
    $room = new Room;
    $room->name = 'hotel name';
    $room->description = 'hotel description';
    $room->type()->associate($room_type);
    
    $result = $hotel->rooms()->save($room);

    dump($result);
    
    return view('welcome');
});
