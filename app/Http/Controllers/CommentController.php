<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function insert(Request $request)
    {
        $comment = new Comment();
        request()->validate([
            'idea' => 'required | min:5 | max:300',
        ]);
        $comment->idea = request('idea');
        $comment->idea_id = request('idea_id');
        return redirect()->route('ideas.show', $comment->idea_id)->with('success', 'Comment added successfully');
    }
}
