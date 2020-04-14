@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Your Posts</h1>
    <a href="/posts/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-blog fa-sm text-white-50"></i>    Create New Post</a>

</div>
<hr>
@include('inc.cpmessage')

<div class="container-fluid">
    @if (count($posts) > 0)
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Post Title</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach ($posts as $post)
        <tbody>
            <tr>
                <td>{{$post->title}}</td>
                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @else
        <p>You don't have any post yet</p>
    @endif
    
</div>


@endsection