<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('has_published')->get();

        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::with(['comments' => function($query) {
            $query->where('has_approved', '!=', NULL)
                ->orderBy('created_at', 'desc');
        }])->where('slug', $slug)->first();

        return view('details', [
            'post' => $post,
        ]);
    }
}
