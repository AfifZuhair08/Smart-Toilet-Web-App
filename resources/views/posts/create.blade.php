@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Post</h1>
</div>

<div>
    <a href="/posts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        {{-- <i class="fas fa-blog fa-sm text-white-50"></i>     --}}
        View All Posts
    </a>
</div>
<hr>

@include('inc.cpmessage')

<div class="col-9">
    {{-- Form to POST --}}
    {!! Form::open(['action' => 'PostsController@store',
        'method' => 'POST']) !!}
    
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
    </div>
</div>

{{-- <div class="row"> --}}
<div class="col-9">
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',
        '',
        ['id' => 'summary-ckeditor',
        'class' => 'form-control',
        'placeholder' => 'Body',
        'rows' => 10,
        'cols' => 10
        ])}}
    </div>
</div>
<div class="col">

</div>

<div class="col-9">
    {{Form::submit('Submit',['class'=>'btn btn-success btn-md btn-block'])}}
    {!! Form::close() !!}
</div>
    

@endsection