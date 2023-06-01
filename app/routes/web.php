<?php

use App\Category;
use App\Models\Comment;
use App\Models\Post;
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
    // $categories = Category::select('id','title')->orderBy('title')->get();
    // // $tags = Tag::select('id', 'name')->get();
    // $tags = Tag::select('id', 'name')->orderByDesc(
    //             DB::table('post_tag')
    //                 ->selectRaw('count(tag_id) as tag_count')
    //                 ->whereColumn('tags.id', 'post_tag.tag_id')
    //                 ->orderBy('tag_count','desc')
    //                 ->limit(1)
    //         )
    //         ->get();

    // $latest_posts = Post::select('id','title')->latest()->take(5)->withCount('comments')->get(); // good candidate for replacing with redis database

    // dump($categories, $tags, $latest_posts);

    // $most_popular_posts  = Post::select('id', 'title')->orderByDesc(
    //     Comment::selectRaw('count(post_id) as comment_count')
    //         ->whereColumn('posts.id', 'comments.post_id')
    //         ->orderBy('comment_count','desc')
    //         ->limit(1)
    // )
    // ->withCount('comments')->take(5)->get();

    // $most_active_users = User::select('id','name')->orderByDesc(
    //                 Post::selectRaw('count(user_id) as post_count')
    //                 ->whereColumn('users.id', 'posts.user_id')
    //                 ->orderBy('post_count','desc')
    //                 ->limit(1)
    //             )
    //             ->withCount('posts')
    //             ->take(3)
    //             ->get();

    // dump($most_popular_posts, $most_active_users);

    // $most_popular_category  = Category::select('id', 'title')
    //     ->withCount('comments')
    //     ->orderBy('comments_count', 'desc')
    //     ->take(1)->get();

    // dump($most_popular_category);

    // $item_id = 2;

    // // $result  = Post::with('comments')->find($item_id);
    // // $result  = Tag::with(['posts' => function($q){
    // //     $q->select('posts.id', 'posts.title');
    // // }])->find($item_id);
    // $result  = Category::with(['posts' => function($q){
    //     $q->select('posts.id', 'posts.title', 'posts.category_id');
    // }])->find($item_id);

    // dump($result);

    // $search_term = 'Voluptatibus';

    // $result = DB::table('posts')
    //             ->where('title', 'like', "%$search_term%")
    //             ->orWhere('content', 'like', "%$search_term%")
    //             // ->get()
    //             ->paginate(10);

    // $result = DB::table('posts')
    //             ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$search_term])
    //             ->paginate(10);


    // dump($result);

    // $search_term = 'Voluptatibus';

    // // $sortBy = 'created_at';
    // // $sortBy = 'updated_at';
    // $sortBy = 'updated_at desc, title asc';

    // $result = DB::table('posts')
    //             ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$search_term])
    //             ->when($sortBy, function($q, $sortBy){
    //                 // return $q->orderBy($sortBy);
    //                 return $q->orderByRaw($sortBy);
    //             }, function($q){
    //                 return $q->orderBy('title');
    //             })
    //             // ->paginate(10);
    //             ->simplePaginate(10); // only prev, next links

    // dump($result);

    // return view('welcome');

    $search_term = 'Voluptatibus';

    $sortBy = 'created_at';
    $sortByMostCommented = true;

    $result = DB::table('posts')
        ->select('id', 'title')
        ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$search_term]);
    $result->when($sortBy, function($q, $sortBy){
        // return $q->orderBy($sortBy);
        return $q->orderByRaw($sortBy);
    }, function($q){
        return $q->orderBy('title');
    });
    $result->when($sortByMostCommented, function($q){
        return $q->orderByDesc(
            DB::table('comments')
            ->selectRaw('count(comments.post_id)')
            ->whereColumn('comments.post_id','posts.id')
            ->orderByRaw('count(comments.post_id) DESC')
            ->limit(1)
        );
    });
    $result = $result->paginate(10);

    dump($result);

    return view('welcome');
});
