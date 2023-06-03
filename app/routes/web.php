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
    // $result = Client::all(); // lazy loading
    // $result = Client::with('orders.details.product')->get(); // eager loading


    // // GET PRODUCTS FOR A SPECIFIC ORDER:
    // $result = DB::table('order_details')
    //         ->join('products', 'order_details.product_code', '=', 'products.product_code')
    //         ->where('order_id', 1)
    //         ->get();


    // GET PRODUCTS AND ORDER THEM BY THE MOST POPULAR PRODUCTS (MOST SOLD):
    $result = DB::table('order_details')
            ->selectRaw('products.product_name, sum(order_details.product_amount) as number_of_orders')
            ->join('products', 'order_details.product_code', '=', 'products.product_code')
            ->groupBy('order_details.product_code')
            ->orderBy('number_of_orders', 'desc')
            ->get();


    dump($result);

    return view('welcome');
});
