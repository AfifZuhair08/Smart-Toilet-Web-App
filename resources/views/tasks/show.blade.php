@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        {{-- <a href="/tasks"> --}}
            Tasks Details
        {{-- </a> --}}
    </h1>
</div>
<hr>
<a href="/tasks" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    View All Task
</a>
<p></p>

<div class="card">
    <div class="card-header">
        <div class="d-flex">
            {{-- post title --}}
            <div class="p-2 align-self-center">
                <h3>Task: {{$task->task_title}}</h3>
            </div>

            {{-- buttons --}}
            <div class="ml-auto p-2 align-self-center">
                <div class="btn-group pt-3" role="group" aria-label="Button group with nested dropdown">
                    {{-- buttons --}}
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $task->user_id)
                            @if($task->is_complete == 1)
                                <button class="btn btn-primary">Task Completed</button>
                            @else
                            <a href="/tasks/{{$task->id}}/edit" class="btn btn-success"> Edit </a>
                            <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cancel task assignment
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                {{-- <a class="dropdown-item" href="/posts/{{$post->id}}">Yes, I'm sure</a> --}}
                                <a>
                                {!!Form::open(['action' => ['TaskController@destroy', $task->id],
                                'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Yes, Im sure ',['class' => 'dropdown-item'])}}
                                {!!Form::close()!!}
                                </a>
                                {{-- <a class="dropdown-item" href="#">Report this task</a> --}}
                            </div>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-borderless">
            <tr class="d-flex">
                <th class="col-3">
                    <p><b>Person in Charge</b></p>
                </th>
                <th class="col-3">
                    <p><b>Assigned by</b></p>
                </th>
                <th class="col-3">
                    <p><b>Date & time task assigned</b></p>
                </th>
                <th class="col-3" style="text-align: center">
                    <p><b>Status</b></p>
                </th>
            </tr>
            <tr class="d-flex">
                <th class="col-3">
                    <a href="/staffs/{{$task->staff_id}}"><b>{{ucwords($task->staff->name)}}</b></a>
                </th>
                <th class="col-3">
                    <a href="/users/{{$task->user_id}}"><b>{{ ucwords($task->user->name)}}</b></a>
                </th>
                <th class="col-3">
                    {{$task->created_at}}
                </th>
                <th class="col-3" style="text-align: center">
                    <p>
                        @if ($task->is_complete)
                            <a href="#" class="btn btn-success"> Completed </a>
                        @else
                            <a href="#" class="btn btn-warning"> Incomplete </a>
                        @endif
                    </p>
                </th>
            </tr>
            <tr class="d-flex">
                <th>
                    <p>Reminder message : {{$task->task_description}}</p>
                </th>
            </tr>
        </table>
        <div>
        </div>
    </div>
    {{-- <hr> --}}
    <div class="card-header">
        <h4>
            Record Service Details
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-sm table-borderless">
            @if (count($records) > 0)
            @foreach ($records as $record)
                <tr class="d-flex">
                    <th class="col-6">
                        <p>Notes of record : {{$record->additional_notes}}</p>
                    </th>
                    <th class="col-6" style="text-align: right">
                        <p>Date Checked : {{$record->created_at}}</p>
                    </th>
                </tr>

                <tr class="d-flex">
                    <th class="col-6">
                    </th>
                    <th class="col-6" style="text-align: right">
                        <p>
                            Task status : 
                            @if ($record->is_checked)
                                <a href="#" class="btn btn-success"> Checked </a>
                            @else
                                <a href="#" class="btn btn-warning"> Not-checked </a>
                            @endif
                        </p>
                    </th>
                </tr>

            @endforeach
            {{$records->links()}}
            @else
                <p>No record found</p>
            @endif
        </table>
    </div>
</div>

@endsection