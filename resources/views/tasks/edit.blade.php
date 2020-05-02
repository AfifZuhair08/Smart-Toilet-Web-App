@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
    <a href="/tasks/{{$task->id}}">Tasks > Editing</a>
    </h1>
</div>
<hr>

<div>
    <a href="/tasks" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        {{-- <i class="fas fa-blog fa-sm text-white-50"></i>     --}}
        View All Task
    </a>
    <p></p>
</div>

@include('inc.cpmessage')

<div class="col-9">
    {{-- Form to POST --}}
    {!! Form::open(['action' =>  ['TaskController@update',$task->id],
        'method' => 'PUT']) !!}
    
    <div class="form-group">
        {{Form::label('task_title','Title')}}
        {{Form::text('task_title', $task->task_title,['class' => 'form-control','placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('task_description','Description')}}
        {{Form::text('task_description', $task->task_description,['class' => 'form-control','placeholder' => 'Description'])}}
    </div>
</div>

<div class="col-3">
    <div class="form-group">
        {{Form::label('staff_id','Staff In Charge (current)')}}
        {{Form::text('staff_id', ucwords($task->staff->name),['class' => 'form-control','placeholder' => 'Description'])}}
    </div>
    <p>Assign this task to other staff (optional)</p>
    <div class="form-group">
        {{-- {!! Form::Label('item', 'Available Staff') !!} --}}
        <select class="form-control" name="user_id">
          @foreach($users as $user)
            <option value="{{$task->staff_id}}"></option>
            <option value="{{$user->id}}">{{ ucwords($user->name) }}</option>
          @endforeach
        </select>
    </div>
</div>


<div class="col-9">
    {{Form::submit('Submit',['class'=>'btn btn-success btn-md btn-block'])}}
    {!! Form::close() !!}
</div>


@endsection