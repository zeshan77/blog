<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(CreatePostRequest $request)
    {

        auth()->user()->posts()->create($request->validated());

        return redirect('/admin/posts')->with('message', 'Post has successfully created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        // update post in the database
        $post->update($request->validated());
        // redirect user back to posts/index
        return redirect('/admin/posts')->with('message', 'Post was successfully updated.');
    }

    public function destroy(Post $post)
    {
        // delete functionality
        $post->delete();

        // redirect
        return redirect('/admin/posts')->with('message', 'Post was successfully deleted');
    }
}
