@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="/posts">Tasks</a>
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
                <h2 class="text-dark">{{$task->task_title}}</h2>
            </div>

            {{-- buttons --}}
            <div class="ml-auto p-2 align-self-center">
                <div class="btn-group pt-3" role="group" aria-label="Button group with nested dropdown">
                    {{-- buttons --}}
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $task->user_id)
                            {{-- button edit --}}
                            {{-- <div class="p-2"> --}}
                                <a href="/tasks/{{$task->id}}/edit" class="btn btn-success"> Edit </a>
                            {{-- </div> --}}
                            {{-- button delete --}}
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
                                <a class="dropdown-item" href="#">Report this task</a>
                            </div>
                        @endif
                    @endif
                    {{-- <div class="btn-group pt-3" role="group" aria-label="Button group with nested dropdown">
                        <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary"> Edit </a>
                    
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Delete this post
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id],
                                'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'dropdown-item'])}}
                                {!!Form::close()!!}
                            <a class="dropdown-item" href="#">Report this post</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-borderless">
            <tr class="d-flex">
                <th class="col-6">
                    <p>Person in charge :
                        <a href="/staffs/{{$task->staff_id}}"><b>{{ucwords($task->staff->name)}}</b></a>
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

@endsection