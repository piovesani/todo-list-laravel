<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

    }

    public function create(Request $request){
        return view('components/tasks.create');
    }

    public function edit(Request $request){
        return view('components/tasks.edit');
    }

    public function delete(Request $request){
        return redirect(route('home'));
    }
}
