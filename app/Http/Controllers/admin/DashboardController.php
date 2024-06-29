<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        // if (Gate::allows('admin')) {
        //     return view('admin.dashboard');
        // } else {
        //     abort(403, 'Unauthorized action.');
        // }
    }
}
