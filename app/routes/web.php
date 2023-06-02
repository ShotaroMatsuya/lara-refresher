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
    $hotel_id = range(1,10);
  
    // $result = Hotel::whereIn('id',$hotel_id)
    //         ->withCount('rooms')
    //         ->orderBy('rooms_count', 'desc')
    //         ->get();
            
    $result = DB::table('rooms')
            ->join('room_types','rooms.room_type_id', '=', 'room_types.id')
            ->selectRaw('sum(room_types.amount) as number_of_single_rooms, rooms.name')
            ->groupBy('rooms.name', 'room_types.size')
            ->having('room_types.size', '=', 1)
            ->whereIn('rooms.hotel_id', $hotel_id)
            ->orderBy('number_of_single_rooms', 'desc')
            ->get();
 
    dump($result);
    
    return view('welcome');
});
