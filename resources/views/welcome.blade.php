@extends('layouts.layout')

@section('content')


<div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center mb-4">Drag and Drop Datatables Using jQuery UI Sortable - Demo </h3>
            <a href="{{route('tasks.all')}}">View All Tasks</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="30px">#</th>
                  <th>Project Name</th>
                  <th>Task Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tablecontents">
              @foreach($projects as $project)
    	            <tr class="row1" data-id="{{ $project->id }}">
    	              <td class="pl-3"><i class="fa fa-sort"></i></td>
    	              <td>{{ $project->project_name }}</td>
    	              <td>{{ isset($project->tasks)?count($project->tasks):'' }}</td>
    	              <td><a href="{{route('project.tasks',['project'=> $project->id])}}">View project tasks</a></td>
    	            </tr>
                @endforeach
              </tbody>
            </table>
    	</div>

@endsection
