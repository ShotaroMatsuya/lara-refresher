<?php

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Todo::class, 5)->create(); //第一引数にModleクラスをセット、10回factoryを実行してくれる
    }
}
