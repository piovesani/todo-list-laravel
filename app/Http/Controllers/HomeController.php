<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $tasks = Task::all()->take(8);
        $authUser = Auth::user();

        return view('home', ['tasks' => $tasks, 'authUser' => $authUser]);
    }
}
