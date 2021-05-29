<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get();
        return view('index')->with(['posts' => $posts]);
    }

    //Implicit Binding
    public function show(Post $post)
    {
        // $post = Post::findOrFail($post);
        return view('posts.show')->with(['post' => $post]);
    }
}
