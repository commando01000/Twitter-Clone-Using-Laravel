<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->followers()->attach($user->id);
        return redirect()->route('users.show', $user->id)->with('success', 'Followed successfully');
    }
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower->followers()->detach($user->id);
        return redirect()->route('users.show', $user->id)->with('success', 'Unfollowed successfully');
    }
}
