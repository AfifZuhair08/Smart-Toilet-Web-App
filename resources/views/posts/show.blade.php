@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="/posts">Posts</a>
    </h1>
</div>
<hr>

<div class="">

    <h2 class="h3 mb-0 text-black"><b>{{$post->title}}</b></h2>
    <small>{{ $post->created_at}}</small>
    <div>
        <p>{{$post->body}}</p>
    </div>
</div>


@endsection