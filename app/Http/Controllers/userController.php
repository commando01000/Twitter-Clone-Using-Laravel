<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function edit(User $user)
    {
        $edit = true;
        $ideas = $user->idea()->paginate(5);
        return view('users.show', compact('user', 'edit', 'ideas'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validation
        $this->validate($request, [
            'name' => 'nullable|min:5|max:30',
            'bio' => 'nullable|min:5|max:300',
            'image' => 'nullable|string',
        ]);
        $user->update($request->all());
        return redirect()->route('users.show', $user);
    }
    public function profile()
    {
        return $this->show(auth()->user());
    }
}