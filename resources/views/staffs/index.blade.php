@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Staffs</h1>
    <a href="/staffs/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-blog fa-sm text-white-50"></i>    Create New Staff Account</a>
</div>
<hr>

@include('inc.cpmessage')

@if (count($users) > 0)
    @foreach ($users as $user)
        <div class="well">
            
            {{-- <h3>{{$post->title}}</h3>
            <small>Written on {{$post->created_at}}</small> --}}
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                    <a href="/users/{{$user->id}}">{{ ucwords($user->name) }}</a>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1">
                            <img style="width:100%" src="/storage/staff/{{$user->userImage}}" alt="">
                        </div>
                        <div class="col-sm-9">
                            <ul class="list-unstyled">
                                <li><i class="far fa-user"></i>&nbsp;&nbsp;{{$user->username}}</li>
                                <li><i class="far fa-address-book"></i>&nbsp;&nbsp;{{$user->phone}}</li>
                                <li><i class="far fa-envelope"></i>&nbsp;&nbsp;{{$user->email}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{$users->links()}}
@else
    <p>No users found !</p>
@endif

@endsection