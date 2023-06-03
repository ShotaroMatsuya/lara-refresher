<?php

use App\Client;
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
    // GET ALL CLIENTS:

    // GET PRODUCTS FOR A SPECIFIC ORDER:
    $result = DB::table('order_details')
            ->join('products', 'order_details.product_code', '=', 'products.product_code')
            ->where('order_id', 1)
            ->get();


    dump($result);

    return view('welcome');
});
