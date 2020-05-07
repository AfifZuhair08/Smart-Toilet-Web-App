@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Your Posts</h1>
    <a href="/posts/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-blog fa-sm text-white-50"></i>    Create New Post</a>

</div>
<hr>
<a href="/posts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    View All Broadcast Posts
</a>
<p></p>

@include('inc.cpmessage')

<div class="container-fluid">
    @if (count($posts) > 0)
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th class="" style="width: 10%">Date</th>
                <th class="" style="width: 50%">Post Title</th>
                <th class="" style="width: 10%"></th>
                <th class="text-center" style="width: 10%" colspan="2">Settings</th>
                {{-- <th class="text-center" style="width: 10%">Delete</th> --}}
                {{-- <th class="col-1"></th> --}}
            </tr>
        </thead>
        @foreach ($posts as $post)
        <tbody>
            <tr>
                <td>{{$post->created_at}}</td>
                <td><a href="/posts/{{$post->id}}" class="text-dark">{{$post->title}}</a></td>
                <td class="text-center"><a href="/posts/{{$post->id}}">View</a></td>
                <td class="text-center"><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td class="text-center"><a href="/posts/{{$post->id}}" class="btn btn-danger">Delete</a>
                    {{-- {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!} --}}
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