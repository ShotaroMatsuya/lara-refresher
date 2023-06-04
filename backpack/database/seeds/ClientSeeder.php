<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, 5)->create()->each(function ($client) {
            $orders = $client->orders()->saveMany(factory(App\Order::class, 4)->make());

            foreach ($orders as $order)
            {
                $order_details = $order->details()->saveMany(factory(App\OrderDetail::class, 3)->make());

                foreach ($order_details as $order_detail)
                {
                    $order_detail->product()->save(factory(App\Product::class)->make());
                }
            }
        });
    }
}
