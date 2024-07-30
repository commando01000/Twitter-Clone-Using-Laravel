<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->idea()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        if ($user->id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // $this->authorize('edit-profile', $user);

        $edit = true;
        $ideas = $user->idea()->paginate(5);
        return view('users.show', compact('user', 'edit', 'ideas'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // $this->authorize('edit-profile', $user);

        //validation

        // $this->validate($request, [
        //     'name' => 'nullable|min:5|max:30',
        //     'bio' => 'nullable|min:5|max:300',
        //     'image' => 'nullable|string',
        // ]);

        $validated = $request->validated();
        $user->update($request->all());
        return redirect()->route('users.show', $user);
    }
    public function profile()
    {
        return $this->show(auth()->user());
    }
}
