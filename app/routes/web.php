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
    $city = City::find(1);
    
    $hotel = new Hotel();
    $hotel->name = 'hotel name';
    $hotel->description = 'hotel description';
    $hotel->city()->associate($city);
    $result = $hotel->save();

    dump($result);
    
    return view('welcome');
});
