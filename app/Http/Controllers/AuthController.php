<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('Authentication.register');
    }
    public function login()
    {
        $locale = Session::get('locale');
        App::setLocale($locale);
        Session::put('locale', $locale);
        return view('Authentication.login');
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
        $user = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => Hash::make($validation['password']),
        ]);
        //Mail::to($validation['email'])->send(new WelcomeEmail($user));
        return redirect('/')->with('success', 'User registered successfully');
    }
    public function authenticate(Request $request)
    {

        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:50',
        ]);
        if (auth()->attempt($validation)) {
            request()->session()->regenerate();
            return redirect('/dashboard')->with('success', 'User logged in successfully');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'User logged out successfully');
    }
}
