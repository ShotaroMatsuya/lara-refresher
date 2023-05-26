<?php

use App\City;
use App\Room;
use App\User;
use App\Image;
use App\Address;
use App\Comment;
use App\Company;
use App\Reservation;
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
    // $result = User::all(); //eloquentのcollection型が入る(relationshipのあるデータを取扱さいに便利)

    // DB::transaction(function () {
    //     // try catch block is not necessary as well as DB::rollBack();
    //     try {
    //         DB::table('users')->delete();
    //         $result = DB::table('users')->where('id',4)->update(['email' => 'none']);
    //         if(!$result)
    //         {
    //             throw new \Exception;
    //         }
    //     } catch(\Exception $e) {
    //         DB::rollBack();
    //     }
  
    // }, 5); // optional third argument, how many times a transaction should be reattempted
    
    // commentsテーブルから取得
    $users = DB::table('users')->get();
    $comments = DB::table('comments')->get();

    // factoryの使い方
    // dump(factory(App\Comment::class,3)->make());  //実際にはクエリは実行されない(Modelインスタンスを作るだけ)
    // dump(factory(App\Comment::class,3)->create()); // 実際にDBに保存される

    // QueryBuilderまとめ
    // 1. SELECT
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->pluck('email');
    // $user = DB::table('users')->where('name', 'Mrs. Odie Metz')->first();
    // $user = DB::table('users')->where('name', 'Mrs. Odie Metz')->value('email');
    // $user = DB::table('users')->find(1);

    // $comments= DB::table('comments')->select('content as comment_content')->get();
    // $comments= DB::table('comments')->select('user_id')->distinct()->get();

    // $result = DB::table('comments')->count();
    // $result = DB::table('comments')->max('user_id');
    // $result = DB::table('comments')->sum('user_id');
    // min, avg

    // $result = DB::table('comments')->where('content', 'content')->exists();
    // $result = DB::table('comments')->where('content', 'content')->doesntExist();
    

    // where句
    // $result = DB::table('rooms')->get();
    // $result = DB::table('rooms')->where('price','<',200)->get(); // = like, etc.

    // AND条件
    // $result = DB::table('rooms')->where([
    //     ['room_size', '2'],
    //     ['price', '<', '400'],
    // ])->get();
    
    // OR条件
    //  $result = DB::table('rooms')
    //     ->where('room_size' ,'2')
    //     ->orWhere('price', '<' ,'400')
    //     ->get();
    
    // // 無名関数は()になる
    // $result = DB::table('rooms')
    //         ->where('price', '<' ,'400')
    //         ->orWhere(function($query) {
    //             $query->where('room_size', '>' ,'1')
    //                   ->where('room_size', '<' ,'4');
    //         })
    //         ->get();

    // dump($result);

    
    // $result = DB::table('rooms')
    //         ->whereBetween('room_size',[1,3]) // whereNotBetween
    //         ->get();

    // $result = DB::table('rooms')
    //         ->whereNotIn('id',[1,2,3]) // whereIn
    //         ->get();
    // whereNull('column')  whereNotNull
    // whereDate('created_at', '2020-05-13')
    // whereMonth('created_at', '5')
    // whereDay('created_at', '13')
    // whereYear('created_at', '2020')
    // whereTime('created_at', '=', '12:25:10')
    // whereColumn('column1', '>', 'column2')
    // whereColumn([
    //     ['first_name', '=', 'last_name'],
    //     ['updated_at', '>', 'created_at']
    // ]

    // // 相関サブクエリ
    // $result = DB::table('users')
    //        ->whereExists(function ($query) {
    //            $query->select('id')
    //                  ->from('reservations')
    //                  ->whereRaw('reservations.user_id = users.id')
    //                  ->where('check_in', '=', '2020-05-12')
    //                  ->limit(1);
    //        })
    //        ->get();

    // dump($result);
    
    
    // Json型の操作
    // $result = DB::table('users')
    //             ->whereJsonContains('meta->skills', 'Laravel')
    //             ->get();

    // $result = DB::table('users')
    //             ->where('meta->settings->site_language', 'en')
    //             ->get();

    // dump($result);

    
    // 
    // return $result = DB::table('comments')->paginate(3); // other statements like where clause are also possible
    // // simplePaginate(3); // paginateとの違いは前ページか後ページのリンクしか渡さない
                
    // dump($result->items()); //配列を返す


    //     // $result = DB::statement('ALTER TABLE comments ADD FULLTEXT fulltext_index(content)'); // MySQL >= 5.6
    // $result = DB::table('comments')
    //     ->whereRaw("MATCH(content) AGAINST(? IN BOOLEAN MODE)", ['+inventore -pariatur'])
    //     ->get(); // inventoreを含み、pariaturを含まないという条件で検索

    // // $result = DB::table('comments')
    // // ->where("content", 'like', '%inventore%')
    // // ->get(); //like句よりもfull text　indexの方が速い

    // dump($result);


        // $result = DB::table('comments')
    // // ->where("content", 'like', '%inventore%')
    // ->whereRaw("content LIKE '%inventore%'") // be careful about SQL injections!
    // // ->where(DB::raw("content LIKE '%inventore%'")) // not working because where() needs two parameters
    // ->get();

    // $result = DB::table('comments')
    //     // ->select(DB::raw('count(user_id) as number_of_comments, users.name'))
    //     ->selectRaw('count(user_id) as number_of_comments, users.name',[])
    //     ->join('users','users.id','=','comments.user_id')
    //     ->groupBy('user_id')
    //     ->get();

    // whereRaw / orWhereRaw
    // havingRaw / orHavingRaw
    // orderByRaw
    // groupByRaw

    // $result = DB::table('comments')
    //             ->orderByRaw('updated_at - created_at DESC')
    //             ->get();

    // $result = DB::table('users')
    //             ->selectRaw('LENGTH(name) as name_lenght, name')
    //             ->orderByRaw('LENGTH(name) DESC')
    //             ->get();
                
    // dump($result);

    // $result = User::find(1);
    // $result = App\Address::find(1);

    // // dump($result->address->street, $result->address->number);
    // dump($result->user->name);

    // $result = User::find(1);
    // $result = App\Comment::find(1);

    // // dump($result->comments);
    // dump($result->user->name);

    // $result = App\City::find(1);
    // dump($result->rooms);

    // $result = App\Room::where('room_size', 3)->get();
    // // dump($result[0]->cities);

    // foreach($result as $room) {
    //     foreach($room->cities as $city) {
    //         echo $city->name. '<br>';
    //         echo $city->pivot->room_id. '<br>';
    //     }
    // }
    // $result = App\Comment::find(6);

    // dump($result->country->name);

    // $result = App\Company::find(2);
    // dump($result->reservations);

    // $result = User::find(3);
    // $result = Image::find(7);

    // // dump($result->image);
    // dump($result->imageable);

    // $result = Room::find(10);
    // $result = Comment::find(2);

    // // dump($result->comments);
    // dump($result->commentable);
    // $result = User::find(1);
    $result = Room::find(4);

    // dump($result->likedImages, $result->likedRooms);
    dump($result->likes);

    return view('welcome');
});