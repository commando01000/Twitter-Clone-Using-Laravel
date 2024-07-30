<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        // if (Gate::allows('admin')) {
        //     return view('admin.dashboard');
        // } else {
        //     abort(403, 'Unauthorized action.');
        // }
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }
}
