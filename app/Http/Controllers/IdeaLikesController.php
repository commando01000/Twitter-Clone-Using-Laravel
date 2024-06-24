<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikesController extends Controller
{
    public function like(Idea $idea)
    {
        $user = auth()->user();
        $user->likes()->attach($idea->id);
        return redirect()->route('dashboard')->with('success', 'Liked successfully');
    }

    public function unlike(Idea $idea)
    {
        $user = auth()->user();
        $user->likes()->detach($idea->id);
        return redirect()->route('dashboard')->with('success', 'UnLiked successfully');
    }
}
