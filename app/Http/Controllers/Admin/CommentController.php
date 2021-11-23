<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::get();

        return view('admin.comments.index', [
            'comments' => $comments,
        ]);
    }

    public function approve(Comment $comment)
    {
        // Approve this comment
        $comment->has_approved = now();
        $comment->save();

        // redirect back
        return redirect()->back()->with('message', 'Comment was successfully approved.');
    }

    public function destroy(Comment $comment)
    {
        // Delete comment from the database
        $comment->delete();

        // Redirect back with a message
        return redirect()->back()->with('message', 'Comment was successfully deleted');
    }
}
