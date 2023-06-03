<?php

use App\Client;
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
    // GET ALL CLIENTS:
    $result = Client::all(); // lazy loading
    $result = Client::with('orders.details.product')->get(); // eager loading

    dump($result);

    return view('welcome');
});
