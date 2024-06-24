<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        // get user follwers
        $followers = $user->followers()->pluck('user_id');
        $ideas = Idea::with('user:id,name,image', 'comments.user:id,name,image')->whereIn('user_id', $followers)->latest(); //eager loading of user and comments
        //$ideas = Idea::with('user:id,name,image', 'comments.user:id,name,image')->latest(); //eager loading of user and comments
        if (request()->has('search')) {
            $search = request('search');
            $ideas = Idea::where([
                ['idea', 'like', '%' . $search . '%'],
            ]);
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
