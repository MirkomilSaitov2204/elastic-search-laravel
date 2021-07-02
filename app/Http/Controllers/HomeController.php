<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags', 'user'])->paginate(20);

        return view('welcome')->with([
            'posts' => $posts
        ]);
    }
}
