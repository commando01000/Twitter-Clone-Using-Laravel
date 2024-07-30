<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class AdminIdeasController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->paginate(5);
        return view('admin.ideas.index', compact('ideas'));
    }
}
