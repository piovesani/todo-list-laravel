<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $count = Task::where('due_date', "=", $request->date)->get();

        if(!sizeof($count)){
            $filteredDate = $request->date;
        }
        else{
            $filteredDate = date('Y-m-d');
        }


        $tasks = Task::whereDate('due_date', $filteredDate)->get();

        $data['date_as_string'] = '10 de Jun';
        $data['date_prev_button'] = '2023-06-10';
        $data['date_next_button'] = '2023-06-11';

        $authUser = Auth::user();

        return view('home', ['tasks' => $tasks, 'authUser' => $authUser, 'dataInfo' => $data]);
    }
}
