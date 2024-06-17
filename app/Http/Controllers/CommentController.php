<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function insert(Idea $idea)
    {
        $comment = new Comment();
        request()->validate([
            'comment' => 'required | min:5 | max:300',
        ]);
        $comment->comment = request('comment');
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return redirect()->route('idea.showIdea', $idea->id)->with('success', 'Comment added successfully');
    }
}
