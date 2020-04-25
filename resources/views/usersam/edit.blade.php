@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
    <a href="/users/{{$user->id}}"> < </a> Manager - Edit
    </h1>
</div>
<hr>

<div class="col-9">
    {{-- Form to POST --}}
    {!! Form::open(['action' => ['UsersController@update',$user->id],
        'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="form-group">
        {{Form::label('name','Full Name')}}
        {{Form::text('name',$user->name,['class' => 'form-control','placeholder' => ''])}}
    </div>
</div>

<div class="col-3">
    <div class="form-group">
        {{Form::label('userImage','Profile Image')}}
        {{Form::file('userImage')}}
    </div>
</div>

{{-- <div class="row"> --}}
<div class="col-9">
    <div class="form-group">
        {{Form::label('username','Username')}}
        {{Form::text('username',$user->username,['class' => 'form-control','placeholder' => ''])}}
    </div>
    <div class="form-group">
        {{Form::label('phone','Phone')}}
        {{Form::text('phone',$user->phone,['class' => 'form-control','placeholder' => ''])}}
    </div>
    <div class="form-group">
        {{Form::label('email','Email')}}
        {{Form::text('email',$user->email,['class' => 'form-control','placeholder' => ''])}}
    </div>
    {{-- <div class="form-group">
        {{Form::label('password','Password')}}
        {{Form::text('password','',['class' => 'form-control','placeholder' => ''])}}
    </div> --}}
</div>
<div class="col">

</div>

<div class="col-9">
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-success btn-md btn-block'])}}
    {!! Form::close() !!}
</div>



@endsection