<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){

    }

    public function create(Request $request){

        $categories = Category::all();
        $data['categories'] = $categories;

        return view('components/tasks.create', $data);
    }

    public function createAction(Request $request){

        $task = $request->only(['title', 'category_id', 'description', 'due_date']);

        $task['user_id'] = 1;
        $dbTask = Task::create($task);

        return redirect(route('home'));
    }

    public function edit(Request $request){

        $task = Task::find($request->id);
        $categories = Category::all();

        if(!$task){
            return redirect(route('home'));
        }


        $data['categories'] = $categories;
        $data['task'] = $task;
        return view('components/tasks.edit', $data);
    }

    public function editAction(Request $request){

        //"id" => "1"
        //"title" => "Minha tarefa id 3"
        //"due_date" => "2002-10-11T00:14:54"
        //"category_id" => "3"
        //"description" => "Laborum non voluptatem est nisi aspernatur in."

        $task = Task::find($request->id);

        if(!$task){
            return "Tarefa não existente!";
        }

        $data = $request->only(['title', 'due_date', 'category_id', 'description']);

        $data['is_done'] = $request->is_done ? true : false;

        $task->update($data);
        $task->save();

        return redirect(route('home'));

    }

    public function delete(Request $request){

        $task = Task::find($request->id);

        if($task){
            $task->delete();
        }
        return redirect(route('home'));
    }
}
