<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // $idea = new Idea(
        //     [
        //         'idea' => 'test',
        //         'likes' => 0,
        //     ]
        // );
        // $idea->save();
        // // dump($idea::all());
        return view('dashboard', [
            'ideas' => Idea::all(),
        ]);
    }
}
