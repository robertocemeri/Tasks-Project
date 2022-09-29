<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;


class TaskController extends Controller
{
    //
    public function index(Request $request){
        $tasks = Task::orderBy('priority','asc')->get();
        return view('tasks/tasks',compact('tasks'));
    }

    public function updatePriority(Request $request){
        foreach ($request->priority as $key => $priority) {
            $task = Task::find($priority['id'])->update(['priority' => $priority['priority']]);
        }
        return response('Update Successfully.', 200);
    }

    // todo create
    public function create(){
        $projects = Project::all();
        return view('tasks/create',compact('projects'));
    }

    // todo create
    public function store(Request $request){
        if($request->task_id){
            $task = Task::find($request->task_id)->first();
            $task->task_name = $request->task_name;
            if(isset($request->project_id)) $task->project_id = $request->project_id;
            $task->save();
        }
        else {
            $tasks = Task::orderBy('priority','asc')->get();
            foreach ($tasks as $key => $task) {
                Task::find($task['id'])->update(['priority' => $task['priority'] + 1]);
            }
            $task = new Task();
            $task->task_name = $request->task_name;
            if(isset($request->project_id)) $task->project_id = $request->project_id;
            $task->priority = 0;
            $task->save();
        };
        return redirect('/tasks');
    }

    // todo update
    public function update(Task $task){
        $projects = Project::all();
        return view('tasks/create',compact('task','projects'));
    }

    // todo delete
    public function delete(Task $task){
        $task->delete();
        return redirect('/tasks');
        
    }
}
