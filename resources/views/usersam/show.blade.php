@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Manager Profile
    </h1>
</div>
<small><a href="/users"> < back to lists </a></small>
<hr>

<div class="card">
    <div class="card-header">
        <div class="d-flex">
            <div class="p-2 align-self-center">
                <h2 class="text-dark">{{$user->name}}</h2>
            </div>
            
            <div class="ml-auto p-2 align-self-center">
                <div class="btn-group pt-3" role="group" aria-label="Button group with nested dropdown">
                    <a href="/users/{{$user->id}}/edit" class="btn btn-primary"> Edit </a>
                
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Delete this account
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="/users/{{$user->id}}/editToDelete">Yes, I'm sure</a>
                        <a class="dropdown-item" href="#">Report this account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!Auth::guest())
            {{-- @if(Auth::user()->id == $staff->user_id) --}}
            {{-- <div class="mr-auto p-2">
                <a href="/staffs/{{$staff->id}}/edit" class="btn btn-success"> Edit </a>
            </div> --}}
            {{-- @endif --}}
        @endif
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <img style="width:100%" src="/storage/user/{{$user->userImage}}" alt="">
            </div>
            <div class="p-3 mb-2 bg-white text-dark col-sm-9">
                <div class="p-2">
                    <p>Username : {{$user->username}}</p>
                    <p>Email : {{$user->email}}</p>
                    <p>Phone : {{$user->phone}}</p>
                    <small>User created at : {{ $user->created_at}}</small>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="well">
    <a href="/staffs/{{$staff->id}}/edit" class="btn btn-primary"> Edit </a>
</div> --}}

{{-- <div class="btn-group pt-3" role="group" aria-label="Button group with nested dropdown">
    <a href="/staffs/{{$staff->id}}/edit" class="btn btn-primary"> Edit </a>

    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Delete this account
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item" href="/staffs/{{$staff->id}}/editToDelete">Yes, I'm sure</a>
        <a class="dropdown-item" href="#">Report this account</a>
        </div>
    </div>
</div> --}}

{{-- {!!Form::open(['action' => ['StaffController@destroy', $staff->id],
                'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!} --}}


@endsection