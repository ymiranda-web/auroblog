<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', ['posts' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        dd($post);
        return view('posts.show', ['post' => $post]);
    }
}
