<?php

use App\Client;
use App\Order;
use App\OrderDetail;
use App\Product;
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
    // $result = DB::table('order_details')
    //         ->selectRaw('products.product_name, sum(order_details.product_amount) as number_of_orders')
    //         ->join('products', 'order_details.product_code', '=', 'products.product_code')
    //         ->groupBy('order_details.product_code')
    //         ->orderBy('number_of_orders', 'desc')
    //         ->get();


    // CREATE NEW ORDER FOR A CLIENT:
    $client = Client::find(1);
    $product1 = Product::find(1);
    $howManyProduct1 = 1;
    $product2 = Product::find(2);
    $howManyProduct2 = 3;
    $order = new Order();
    $order->order_date = date('Y-m-d');
    $order->order_value = $howManyProduct1 * $product1->product_unit_price + $howManyProduct2 * $product2->product_unit_price;
    $client->orders()->save($order);
    $order_detail1 = new OrderDetail();
    $order_detail1->product_code = $product1->product_code;
    $order_detail1->product_amount = $howManyProduct1;
    $order_detail2 = new OrderDetail();
    $order_detail2->product_code = $product2->product_code;
    $order_detail2->product_amount = $howManyProduct2;
    $result = $order->details()->saveMany([$order_detail1, $order_detail2]);

    dump($result);

    return view('welcome');
});
