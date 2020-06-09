@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tasks</h1>
    {{-- <a href="/posts/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-blog fa-sm text-white-50"></i>    Create New Task</a> --}}
</div>
<hr>
<div class="container-fluid">
    <a href="/tasks" class="d-block d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    All Task</a>
    <a href="/tasks/incomplete" class="d-block d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    Incomplete</a>
    <a href="/tasks/completed" class="d-block d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    Completed</a>
    <a href="/tasks/create" class="d-block d-sm-inline-block btn btn-sm btn-default shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    Create New Task</a>
<p></p>
</div>


@include('inc.cpmessage')
<div class="container-fluid">
    @if (count($tasks) > 0)
    <table class="table table-hover table-sm table-bordered">
        <thead class="thead-light">
            <tr class="d-flex">
                <th class="col-4">Tasks</th>
                <th class="col-sm-2">Staff</th>
                <th class="col-sm-2">Assigned by</th>
                <th class="col-sm-2">Status</th>
                <th class="col-2">Date Assigned</th>
            </tr>
        </thead>
        @foreach ($tasks as $task)
        <tbody>
            <tr class="d-flex">
                <th class="col-4"><a href="/tasks/{{$task->id}}" class="text-dark">{{$task->task_title}}</a></th>
                <th class="col-sm-2">{{ ucwords($task->staff->name)}}</th>
                <th class="col-sm-2">{{ ucwords($task->user->name)}}</th>
                <th class="col-sm-2 text-center">
                    @if ($task->is_complete)
                        <a href="#" class="btn btn-success"> Completed </a>
                    @else
                        <a href="#" class="btn btn-warning"> Incomplete </a>
                    @endif
                </th>
                <th class="col-2">{{$task->created_at}}</th>
            </tr>
        </tbody>  
        @endforeach
    </table>
    {{$tasks->links()}}
    @else
        <p>No Tasks !</p>
    @endif

</div>
@endsection