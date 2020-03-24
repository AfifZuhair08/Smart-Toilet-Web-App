@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
    <a href="/posts/{{$post->id}}">Posts > Editing</a>
    </h1>
</div>
<hr>

<div class="col-9">
    {{-- Form to POST --}}
    {!! Form::open(['action' => ['PostsController@update',$post->id],
        'method' => 'POST']) !!}
    
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title', $post->title,['class' => 'form-control','placeholder' => 'Title'])}}
    </div>
</div>

{{-- <div class="row"> --}}
<div class="col-9">
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',
        $post->body,
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
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-success btn-md btn-block'])}}
    {!! Form::close() !!}
</div>



@endsection