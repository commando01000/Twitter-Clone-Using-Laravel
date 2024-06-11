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
        request()->validate([
            'idea' => 'required | min:5 | max:300',
        ]);
        $idea = Idea::create(              ////////////// 2.
            [
                'idea' => $request->idea,
            ]
        );
        // return redirect('/'); /////////// 1
        return redirect()->route('dashboard')->with('success', 'Idea inserted successfully'); ////////////// 2
    }
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }
    public function edit(Idea $idea)
    {
        $edit = true;
        return view('ideas.show', compact('idea', 'edit'));
    }
    public function update(Idea $idea)
    {
        request()->validate([
            'idea' => 'required | min:5 | max:300',
        ]);
        $idea->idea = request('idea');
        // update the idea
        $idea->save();
        return redirect()->route('dashboard')->with('success', 'Idea updated successfully');
    }
    public function delete($id)
    {
        $idea = Idea::find($id);
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }
}
