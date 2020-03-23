@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Post</h1>
    <a href="/posts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-blog fa-sm text-white-50"></i>    All Post</a>
</div>

@include('inc.cpmessage')

{{-- Form to POST --}}
{!! Form::open(['action' => 'PostsController@store',
                'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Body'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection