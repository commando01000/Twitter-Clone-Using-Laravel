<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    // public function index()
    // {
    //     return view('ideas.index');
    // }

    public function insert(Request $request)
    {
        // dump(request('idea'));
        // dump(request());

        // both methods work
        // $idea = new Idea(        ////////////// 1.
        //     [
        //         'idea' => $request->idea,
        //     ]
        // );
        // $idea->save();
        // return view('dashboard', [
        //     'ideas' => Idea::all(),
        // ]);
        $idea = Idea::create(              ////////////// 2.
            [
                'idea' => $request->idea,
            ]
        );
        // return redirect('/'); /////////// 1
        return redirect()->route('dashboard')->with('success', 'Idea inserted successfully'); ////////////// 2
    }
}
