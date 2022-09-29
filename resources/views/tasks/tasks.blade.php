<!DOCTYPE html>
<html>
<head>
    <title>Task Priority</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center mb-4">Drag and Drop Datatables Using jQuery UI Sortable - Demo </h3>
            <a href="{{route('task.create')}}">Create new task</a>
            <a href="{{route('projects.all')}}">View All Projects</a>
            
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="30px">#</th>
                  <th>Task Name</th>
                  <th>Created At</th>
                  <th>Project</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tablecontents">
                @foreach($tasks as $task)
    	            <tr class="row1" data-id="{{ $task->id }}">
    	              <td class="pl-3"><i class="fa fa-sort"></i></td>
    	              <td>{{ $task->task_name }}</td>
    	              <td>{{ date('d-m-Y h:m:s',strtotime($task->created_at)) }}</td>
    	              <td>{{ isset($task->project)?$task->project->project_name:'' }}</td>
    	              <td><a href="{{route('task.edit',['task'=> $task->id])}}">View/Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('task.delete',['task'=> $task->id])}}" class="text-danger">Delete</a></td>

    	            </tr>
                @endforeach
              </tbody>
            </table>
    	</div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $( "#tablecontents" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function(e) {
              updateTaskPriority();
          }
        });
        function updateTaskPriority() {
          var priority = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row1').each(function(index, element) {
            priority.push({
              id: $(this).attr('data-id'),
              priority: index
            });
          });
          $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('tasks/update-priority') }}",
            data: {
              priority: priority,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
</body>
</html>