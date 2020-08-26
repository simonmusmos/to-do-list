@extends("layouts.app")
@section("content")
<div class="container">

    <div class="col-md-6">
        <h1>Todo List</h1>
        <form method="POST" action="update">
            {{csrf_field()}}
            <div class="form-group">
            <input type="text" class="form-control" name="task" placeholder="Enter Task" value="{{$task->task}}">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
        <hr>
        
    </div>
</div>
@endsection