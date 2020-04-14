@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="/posts">Posts</a>
    </h1>
</div>
<hr>

<div class="container">

    <div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="h3 mb-0 text-black"><b>{{$post->title}}</b></h2>
        </div>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
            <div class="p-2">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-success"> Edit </a>
            </div>
            <div class="p-2">
                {!!Form::open(['action' => ['PostsController@destroy', $post->id],
                'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
            @endif
        @endif
    </div>
    <div class="p-3 mb-2 bg-white text-dark">
        <p>{!!$post->body!!}</p>
    </div>

    <small>{{ $post->created_at}}</small>

</div>

{{-- <a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit </a>

{!!Form::open(['action' => ['PostsController@destroy', $post->id],
                'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!} --}}

@endsection