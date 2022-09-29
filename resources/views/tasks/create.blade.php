@extends('layouts.layout')

@section('content')
        <!--Section: Contact v.2-->
<section class="mb-4">

<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Create new Task</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5">Here is the place you create new task for the moment you cant choose the project </p>

<div class="row">

    <!--Grid column-->
    <div class="col-md-12 mb-md-0 mb-5 ">
        <form id="contact-form" name="contact-form" action="{{route('task.store')}}" method="POST">
            @csrf
            <input type="text" id="task_id" name="task_id" class="form-control" hidden value="{{isset($task) ?$task->id:''}}">

            <!--Grid row-->
            <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="task_name" name="task_name" class="form-control" value="{{isset($task) ?$task->task_name:''}}">
                        <label for="task_name" class="">Task name</label>
                    </div>
                </div>
                <!--Grid column-->


            </div>
            <!--Grid row-->
            @if(isset($projects))

                <!--Grid row-->
                <div class="row d-flex justify-content-center">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <select class="form-control" id="project_id" name="project_id" aria-label="Default select example">
                            <option selected>Select Project (optional)</option>
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                        </select>
                            <label for="project_id" class="">Project</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
            @endif

            <!--Grid row-->
            <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6 d-flex justify-content-center">
            <a class="btn btn-danger text-white" onclick="document.getElementById('contact-form').submit();">Send</a>

            </div>
            <!--Grid column-->


            </div>
            <div >
        </div>
        </form>

        
    </div>
    <!--Grid column-->
</div>

</section>
<!--Section: Contact v.2-->
@endsection