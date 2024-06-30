<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        $request['user_id'] = auth()->user()->id;
        $idea = Idea::create(              ////////////// 2.
            request()->all()
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

        // if (!Gate::allows('edit-idea', $idea)) {
        //     abort(403);
        // }

        $this->authorize('update', $idea);

        return view('ideas.show', compact('idea', 'edit'));
    }
    public function update(Idea $idea)
    {
        request()->validate([
            'idea' => 'required | min:5 | max:300',
        ]);

        // if (!Gate::allows('edit-idea', $idea)) {
        //     abort(403);
        // }
        $this->authorize('update', $idea);

        $idea->idea = request('idea');
        if (auth()->user()->id != $idea->user_id) {
            abort(403, 'Unauthorized action.');
        }
        // update the idea
        $idea->save();
        return redirect()->route('dashboard')->with('success', 'Idea updated successfully');
    }
    public function delete(Idea $idea)
    {
        // if (!Gate::allows('delete-idea', $idea)) {
        //     abort(403);
        // }
        $this->authorize('delete', $idea);

        $idea = Idea::find($idea->id);
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }
}
