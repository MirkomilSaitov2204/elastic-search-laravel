<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;

class HomeController extends Controller
{

    public function index()
    {
        if(env('ELASTIC_SYNC') == 'true')
        {

        }else{
            $posts = Post::with(['category', 'tags', 'user'])->get();
            $users  = User::query()->get();
            $tags  = Tag::query()->get();
            $categories  = Category::query()->get();

        }


        return view('welcome')->with([
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'users' => $users
        ]);
    }
}
