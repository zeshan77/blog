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

    // Deprecated in favor of approval()
    //    @Deprecated
    public function approve(Comment $comment)
    {
        // Approve this comment
        $comment->has_approved = now();
        $comment->save();

        // redirect back
        return redirect()->back()->with('message', 'Comment was successfully approved.');
    }

    public function approval(Comment $comment)
    {
        // First check if comment is approved or disapproved
        $hasApproved = $comment->has_approved;

        if($hasApproved) {
            $comment->has_approved = null;
        } else {
            $comment->has_approved = now();
        }

        $comment->save();

        // Mark comment as approve or disapprove based on its old status
        // Redirect back with message
        return redirect()->back()->with('message', 'Comment was successfully saved');
    }

    public function destroy(Comment $comment)
    {
        // Delete comment from the database
        $comment->delete();

        // Redirect back with a message
        return redirect()->back()->with('message', 'Comment was successfully deleted');
    }
}
