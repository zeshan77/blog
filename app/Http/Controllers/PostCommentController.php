<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store($slug, Request $request)
    {
        $post = Post::where('slug', $slug)->first();

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('message', 'Comment was posted successfully');
    }
}
