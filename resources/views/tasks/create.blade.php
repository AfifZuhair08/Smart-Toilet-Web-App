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
    <p></p>
</div>

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

{{-- <div class="row"> --}}
<div class="col-9">
    {{-- place to choose to which staff did the task is assigned to --}}

</div>
<div class="col">
    <div class="form-group">
        {{-- {{Form::label('staff_id', 'Available Staff')}}<div></div> --}}
        {{-- {{Form::select('staff_id',null, $staffs,['class'=>'form-control','placeholder'=>'Choose category'])}} --}}
        {{-- {{Form::select('staff_id', [null=>'-----Please Select------'] + $staffs)}} --}}
    </div>
</div>

<div class="col-3">
    <div class="form-group">
        {!! Form::Label('item', 'Available Staff') !!}
        <select class="form-control" name="staff_id">
          @foreach($staffs as $staff)
            <option value="{{$staff->id}}">{{$staff->name}}</option>
          @endforeach
        </select>
    </div>
</div>


<div class="col-9">
    {{Form::submit('Submit',['class'=>'btn btn-success btn-md btn-block'])}}
    {!! Form::close() !!}
</div>
    

@endsection