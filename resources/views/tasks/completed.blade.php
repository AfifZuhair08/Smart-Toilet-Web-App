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
    @foreach ($tasks as $task)
        <div class="well">
            {{-- <h3>{{$post->title}}</h3>
            <small>Written on {{$post->created_at}}</small> --}}
            <div class="card shadow mb-4" style="width: 75rem;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">
                    <a href="/tasks/{{$task->id}}">{{$task->task_title}}</a>
                    </h5>
                  <small>Assigned on {{$task->created_at}} by <b>{{ucwords($task->user->name)}}</b></small>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr class="d-flex">
                            <th class="col-6">
                                <p>Person in charge :
                                    <a href="/staffs/{{$task->staff_id}}"><b>{{ ucwords($task->staff->name)}}</b></a>
                                </p>
                            </th>
                            <th class="col-6" style="text-align: right">
                                <p>
                                    Task status : 
                                    @if ($task->is_complete)
                                        <a href="#" class="btn btn-success"> Completed </a>
                                    @else
                                        <a href="#" class="btn btn-warning"> Incomplete </a>
                                    @endif
                                </p>
                            </th>
                        </tr>
                    </table>
                    <div>
                        <p><b> Reminder message : </b>{{$task->task_description}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{$tasks->links()}}
@else
    <p>No tasks found !</p>
@endif

</div>

@endsection
