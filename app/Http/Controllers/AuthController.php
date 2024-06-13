<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('Authentication.register');
    }
    public function insert(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|min:5|unique:users|max:75',
            'password' => 'required|confirmed|min:5|max:50',
            'password_confirmation' => 'required|min:5|max:50',
        ]);
        // dd($validation);
        User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => Hash::make($validation['password']),
        ]);
        return redirect('/')->with('success', 'User registered successfully');
    }
}
