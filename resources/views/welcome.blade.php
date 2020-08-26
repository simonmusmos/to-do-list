@extends("layouts.app")
@section("content")
<div class="container mt-5">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-md-6">
        <h1>Todo List</h1>
        <form method="POST" action={{url('/task')}}>
            {{csrf_field()}}
            <div class="form-group">
            <input type="text" class="form-control" name="task" placeholder="Enter Task">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
        <hr>
        <h4>Pending</h4>
        <ol>
            @foreach($tasks as $task)
                <li><a href ="javascript:void(0)">{{ $task->task }}</a>       <a class="btn btn-primary"href ={{url('/'.$task->id.'/edit')}}>Edit</a>     <a class="btn btn-primary"href ={{url('/'.$task->id.'/delete')}}>Delete</a>   <a class="btn btn-primary"href ={{url('/'.$task->id.'/complete')}}>Mark as Done</a></li>
            @endforeach
        </ol>
        <h4>Completed</h4>
        <ol>
            @foreach($completed_tasks as $c_task)
            <li><a href ="javascript:void(0)">{{ $c_task->task }}</a>   <a class="btn btn-primary"href ={{url('/'.$c_task->id.'/edit')}}>Edit</a>     <a class="btn btn-primary"href ={{url('/'.$c_task->id.'/delete')}}>Delete</a>   <a class="btn btn-primary"href ={{url('/'.$c_task->id.'/uncomplete')}}>Mark to Pending</a></li>
            @endforeach
        </ol>
    </div>
</div>
@endsection