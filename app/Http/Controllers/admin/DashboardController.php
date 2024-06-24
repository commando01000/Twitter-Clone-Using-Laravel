<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            return view('admin.dashboard');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
