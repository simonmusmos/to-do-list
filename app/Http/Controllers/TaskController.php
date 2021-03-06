<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Task;
class TaskController extends Controller
{
    //
    public function index(){
        $tasks = Task::where("iscompleted", false)->orderBy("id", "desc")->get();
        $completed_tasks = Task::where("iscompleted", true)->get();
        return view("welcome", compact("tasks", "completed_tasks"));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $task = new Task();
        $task->task = request("task");
        $task->save();
        return Redirect::back()->with("message", "Task has been added");
    }

    public function complete($id)
    {
        $task = Task::find($id);
        $task->iscompleted = true;
        $task->save();
        return Redirect::back()->with("message", "Task has been added to completed list");
    }

    public function uncomplete($id)
    {
        $task = Task::find($id);
        $task->iscompleted = false;
        $task->save();
        return Redirect::back()->with("message", "Task has been added to pending list");
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return Redirect::back()->with('message', "Task has been deleted");
    }

    public function edit($id){
        $task = Task::find($id);
        return view("edit", compact("task"));
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        $task->task = $request->task;
        $task->save();
        return Redirect::to('/')->with("message", "Task has been updated!");
    }
}
