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

    $item_id = 2;

    // $result  = Post::with('comments')->find($item_id);
    // $result  = Tag::with(['posts' => function($q){
    //     $q->select('posts.id', 'posts.title');
    // }])->find($item_id);
    $result  = Category::with(['posts' => function($q){
        $q->select('posts.id', 'posts.title', 'posts.category_id');
    }])->find($item_id);

    dump($result);

    return view('welcome');
});
