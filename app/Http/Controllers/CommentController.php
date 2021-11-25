<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        //dd($comment->toArray());

        // Validate if user has permission to delete this comment
        $authID = auth()->id();

        if($authID !== $comment->user_id) {
            // don't allow 
            
            return redirect()->back()
                ->with('error', 'You dont have permission to perform this action.');
        }
        

        // Delete comment
        $comment->delete();

        // Redirect back with success message
        return redirect()
            ->back()
            ->with('message', 'Comment was successfully deleted');
    }
}
