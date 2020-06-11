@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Task</h1>
</div>
<hr>

<div>
    <a href="/tasks" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        {{-- <i class="fas fa-blog fa-sm text-white-50"></i>     --}}
        View All Task
    </a>
</div>
<br>

@include('inc.cpmessage')

<div class="col-9">
    {{-- Form to POST --}}
    {!! Form::open(['action' => 'TaskController@store',
        'method' => 'POST']) !!}
    
    <div class="form-group">
        {{Form::label('task_title','Title')}}
        {{Form::text('task_title','',['class' => 'form-control','placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('task_description','Description')}}
        {{Form::text('task_description','',['class' => 'form-control','placeholder' => 'Description'])}}
    </div>
</div>

<div class="col-3">
    <div class="form-group">
        {!! Form::Label('item', 'Toilet Location') !!}
        <select class="form-control" name="location">
            <option value="">----Select Location----</option>
          @foreach($dispensers as $dispenser)
            <option value="{{$dispenser->location}}">{{$dispenser->location}}</option>
          @endforeach
        </select>
    </div>
</div>

<div class="col-3">
    <div class="form-group">
        {!! Form::Label('item', 'Available Staff') !!}
        <select class="form-control" name="user_id">
            <option value="">----Select staff----</option>
          @foreach($users as $user)
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