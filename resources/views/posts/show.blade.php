@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="/posts">Posts</a>
    </h1>
</div>
<hr>
<a href="/userposts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    View My Posts
</a>
<a href="/posts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    View All Broadcast Posts
</a>
<p></p>

{{-- <div class="container">

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

</div> --}}

<div class="card">
    <div class="card-header">
        <div class="d-flex">
            {{-- post title --}}
            <div class="p-2 align-self-center">
                <h2 class="text-dark">{{$post->title}}</h2>
            </div>

            {{-- buttons --}}
            <div class="ml-auto p-2 align-self-center">
                <div class="btn-group pt-3" role="group" aria-label="Button group with nested dropdown">
                    {{-- buttons --}}
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                            {{-- button edit --}}
                            {{-- <div class="p-2"> --}}
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-success"> Edit </a>
                            {{-- </div> --}}
                            {{-- button delete --}}
                            <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Delete this post
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                {{-- <a class="dropdown-item" href="/posts/{{$post->id}}">Yes, I'm sure</a> --}}
                                <a>
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id],
                                'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Yes, Im sure ',['class' => 'dropdown-item'])}}
                                {!!Form::close()!!}
                                </a>
                                <a class="dropdown-item" href="#">Report this post</a>
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
        <div class="row">
            <div class="p-3 mb-2 bg-white text-dark col-sm-9">
                <div class="p-2">
                    <p>{!!$post->body!!}</p>
                    <small>Post created at : {{ $post->created_at}} by <a href="/users/{{$post->user_id}}">{{ucwords($post->user->name)}}</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit </a>

{!!Form::open(['action' => ['PostsController@destroy', $post->id],
                'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!} --}}

@endsection