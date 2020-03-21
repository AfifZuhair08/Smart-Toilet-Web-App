@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Posts</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

@if (count($posts) > 0)
    @foreach ($posts as $post)
        <div class="well">
            
            {{-- <h3>{{$post->title}}</h3>
            <small>Written on {{$post->created_at}}</small> --}}

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h6>
                  <small>Written on {{$post->created_at}}</small>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <p>{{$post->body}}</p>
                </div>
            </div>

        </div>
    @endforeach
    {{$posts->links()}}
@else
    <p>No posts found !</p>
@endif

@endsection
