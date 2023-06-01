<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Country::class, 10)
            ->create()
            ->each(function ($country) {
                $country->cities()->saveMany(factory(App\City::class, mt_rand(1, 10))->make());
            });
    }
}
