@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Staffs</h1>
    <a href="/staffs/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-blog fa-sm text-white-50"></i>    Create New Staff Data</a>
</div>
<hr>

@include('inc.cpmessage')

@if (count($staffs) > 0)
    @foreach ($staffs as $staff)
        <div class="well">
            
            {{-- <h3>{{$post->title}}</h3>
            <small>Written on {{$post->created_at}}</small> --}}
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                    <a href="/staffs/{{$staff->id}}">{{$staff->name}}</a>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <ul>
                    <li>{{$staff->name}}</li>
                    <li>{{$staff->phone}}</li>
                    <li>{{$staff->email}}</li>
                </ul>
                </div>
            </div>
        </div>
    @endforeach
    {{$staffs->links()}}
@else
    <p>No users found !</p>
@endif

@endsection