<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2000)
            ->create()
            ->each(function ($user) {
                $user->address()->save(factory(App\Address::class)->make());
            }); // no need  to use faker unique()

        // $user->posts()->createMany(
        //     factory(App\Post::class, 3)->make()->toArray()
        // );

        // $connection = 'sqlite';
        // $users = factory(App\User::class, 3)->make();
        // $users->each(function($model) use($connection) {
        //     $model->setConnection($connection);
        //     $model->save();
        // });
    }
}