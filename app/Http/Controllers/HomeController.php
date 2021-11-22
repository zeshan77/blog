<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::with(['comments' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->where('slug', $slug)->first();

        return view('details', [
            'post' => $post,
        ]);
    }
}
