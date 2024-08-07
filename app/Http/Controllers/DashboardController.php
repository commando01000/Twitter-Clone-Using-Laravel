<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //

    public function index(Request $request)
    {
        // $idea = new Idea(
        //     [
        //         'idea' => 'test',
        //         'likes' => 0,
        //     ]
        // );
        // $idea->save();
        // // dump($idea::all());
        $locale = Session::get('locale');
        App::setLocale($locale);
        Session::put('locale', $locale);
        $ideas = Idea::with('user:id,name,image', 'comments.user:id,name,image')->latest(); //eager loading of user and comments
        if (request()->has('search')) {
            $search = request('search');
            $ideas = Idea::where([
                ['idea', 'like', '%' . $search . '%'],
            ]);
        }

        $topIdeas = $ideas->get()->sortByDesc('likes')->take(5);

        $topUsers = $topIdeas->unique('user_id')->take(5)->values();

        $users = User::all();

        $topUsersNames = $users->whereIn('id', $topUsers->pluck('user_id'));

        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
            'topUsers' => $topUsersNames
        ]);
    }
}
