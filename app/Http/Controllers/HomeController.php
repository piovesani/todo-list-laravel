<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request){

        $filteredDate = $request->date;

        $carbonDate = Carbon::createFromDate($filteredDate);

        $tasks = Task::whereDate('due_date', $filteredDate)->get();

        $data['date_as_string'] = $carbonDate->translatedFormat('d')
                                .' de '.ucfirst($carbonDate->translatedFormat('M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');

        $data['authUser'] = Auth::user();

        $data['taskCount'] = $tasks->count();

        $authUser = Auth::user();

        $arr = [];
        for($i = 0; $i < $tasks->count(); $i ++){
            if($tasks[$i]['is_done']){
                array_push($arr, $tasks[$i]['is_done']);
            }
        }
        $data['taskIsDone'] = sizeof($arr);

        return view('home', ['tasks' => $tasks, 'authUser' => $authUser, 'dataInfo' => $data]);
    }
}
