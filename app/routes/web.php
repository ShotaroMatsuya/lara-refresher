<?php

use App\Room;
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
    $check_in = '2023-06-12';
    $check_out = '2023-06-15';
    
    $city_id = 2;
    $room_size = 2;

    // $result = DB::table('rooms')
    // ->select('rooms.*', 'room_types.size', 'room_types.price', 'room_types.amount', 'hotels.name as hotel_name', 'hotels.id as hotel_id')
    // ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
    // ->join('hotels', 'rooms.hotel_id', '=', 'hotels.id')
    // ->whereNotExists(function ($query) use ($check_in, $check_out) {
    //     $query->select('reservations.id')
    //             ->from('reservations')
    //             ->join('reservation_room', 'reservations.id', '=', 'reservation_room.reservation_id')
    //             ->whereColumn('rooms.id', 'reservation_room.room_id')
    //             ->where(function ($q) use ($check_in, $check_out) {
    //                     $q->where('check_out', '>', $check_in);
    //                     $q->where('check_in', '<', $check_out);
    //                 })
    //                 ->limit(1);
    // })
    // ->whereExists(function($q) use($city_id) {
    //     $q->select('hotels.id')
    //             ->from('hotels')
    //             ->whereColumn('rooms.hotel_id','hotels.id')
    //             ->whereExists(function($q) use($city_id) {
    //                 $q->select('cities.id')
    //                 ->from('cities')
    //                 ->whereColumn('cities.id','hotels.city_id')
    //                 ->where('id', $city_id)
    //                 ->limit(1);
    //             })
    //             ->limit(1);
    // })
    // ->where('room_types.amount', '>', 0)
    // ->where('room_types.size', '=', $room_size)
    // ->orderBy('room_types.price', 'asc')
    // ->paginate(10);
    
    $result = Room::with(['type', 'hotel'])
        ->whereDoesntHave('reservations' , function($q) use ($check_in, $check_out, $room_size) {
                    $q->where(function($q) use($check_in, $check_out) {
                        $q->where('check_out', '>', $check_in);
                        $q->where('check_in', '<', $check_out);
                });
            })
            ->whereHas('hotel.city', function($q) use ($city_id) {
                $q->where('id', $city_id);
            })
            ->whereHas('type', function($q) use($room_size) {
                $q->where('amount', '>', 0);
                $q->where('size', '=', $room_size);
            })
            ->paginate(10)
            ->sortBy('type.price'); // sortByDesc()

    dump($result);
    
    return view('welcome');
});
