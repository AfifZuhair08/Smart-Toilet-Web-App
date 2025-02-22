@extends('layoutstaff')
@section('staff-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<hr>
<div class="card-body">
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

  You are logged in as Staff
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Toilet Services (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tasks ?? ''}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-500"></i>
            </div>
          </div>
          <a href="/tasks" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Tasks Complete (Weekly)</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format(($tasks_complete ?? ''), 0)}}%</div> --}}
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format(($tasks_complete ?? '0.0'), 0)}}%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: {{$tasks_complete ?? ''}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-500"></i>
            </div>
          </div>
          <a href="/tasks" class="stretched-link"></a>
        </div>
      </div>
    </div>

    {{-- <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Message/Enquiry</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Tissue Dispenser Entries</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sTissue ?? ''}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-toilet-paper fa-2x text-gray-500"></i>
            </div>
          </div>
          <a href="/rtmTissueToday" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Soap Dispenser Entries</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sSoap ?? ''}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tint fa-2x text-gray-500"></i>
            </div>
          </div>
          <a href="/rtmSoapToday" class="stretched-link"></a>
        </div>
      </div>
    </div>
</div>

<hr>
<br/>
<div class="">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Latest Post</h3>
    <a href="posts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-clipboard fa-sm text-white-50"></i> View more posts
    </a>
  </div>
  <div>
  @if (count($posts) > 0)
    @foreach ($posts as $post)
        <div class="well">
            
          {{-- <h3>{{$post->title}}</h3>
          <small>Written on {{$post->created_at}}</small> --}}
          <div class="card shadow mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                  </h6>
                <small>Written on {{$post->created_at}} by <b>{{ucwords($post->user->name)}}</b></small>
              </div>
              
              <!-- Card Body -->
              <div class="card-body">
              <p>{!!$post->body!!}</p>
              </div>
            </div>
            <a href="/posts/{{$post->id}}" class="stretched-link"></a>
          </div>

        </div>
    @endforeach
  @else
    <p>No posts found !</p>
  @endif
  </div>
</div>

<script>
  $(document).ready(function() {
      // auto refresh page after 1 second
      setInterval('refreshPage()', 1000);
  });

  function refreshPage() { 
      location.reload(); 
  }
</script>

@endsection