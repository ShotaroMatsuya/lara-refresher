<?php

use App\User;
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

    // 1.PDOステートメントを使った記述
    // $pdo = DB::connection(/*'sqlite'*/)->getPdo();
    // $users = $pdo->query('select * from users')->fetchAll();
    
    // 2. DBファサードを使ってrowクエリを書く
    // 2-1. selectクエリ(配列が帰ってくる)
    // $result = DB::select('select * from users where id = ? and name = ?', [1, 'Adalberto Gerlach']);
    // $result = DB::select('select * from users where id = :id', ['id' => 1]);
    // 2-2. insertクエリ
    // DB::insert('insert into users (name, email,password) values (?, ?, ?)', ['Inserted Name', 'email@fdf.fd','passw']);
    // 2-3. updateタイプ(affectされたrecord数が帰ってくる)
    // $affected = DB::update('update users set email = "updatedemail@email.com" where email = ?', ['email@fdf.fd']);
    // 2-4. deleteタイプ(deleteされたrecord数が帰ってくる)
    // $deleted = DB::delete('delete from users where id = ?',[4]);
    // 2-5. truncateタイプ
    // DB::statement('truncate table users');
    
    // 3. DBファサード(rowクエリ版)とDBファサード(クエリビルダ版)で比較
    // $result = DB::select('select * from users'); //arrayが入る
    // $result = DB::table('users')->select()->get(); //collection型が入る
    // Eloquentで書く
    $result = User::all(); //eloquentのcollection型が入る(relationshipのあるデータを取扱さいに便利)

    dump($result);

    return view('welcome');
});

