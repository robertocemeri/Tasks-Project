<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index(){
        $projects = Project::all();
        return view('welcome',compact('projects'));
    }
    public function view_all_tasks(Project $project){
        $tasks = $project->tasks;
        return view('project/tasks',compact('tasks','project'));
    }
}
