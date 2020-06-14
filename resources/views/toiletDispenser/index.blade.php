@extends('layout')
@section('main-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dispenser Inventory</h1>
    <a href="/dispenser/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Register New Dispenser</a>
</div>
<hr>
@include('inc.cpmessage')

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total of Tissue Dispenser</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dispenserT ?? ''}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-toilet-paper fa-2x text-gray-500"></i>
              </div>
            </div>
            {{-- <a href="/tasks" class="stretched-link"></a> --}}
          </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total of Soap Dispenser</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dispenserS ?? ''}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-tint fa-2x text-gray-500"></i>
              </div>
            </div>
            {{-- <a href="/tasks" class="stretched-link"></a> --}}
          </div>
        </div>
    </div>
</div>

<br>
<h5 class="mb-0 text-gray-800">Lists of Registered Dispenser</h5>
<br>
<div class="container-fluid">
    @if (count($alldispensers) > 0)
        <table class="table table-hover table-sm table-bordered">
            <thead class="thead-light">
                <tr class="d-flex">
                    <th class="col-sm-1">ID</th>
                    <th class="col-sm-1">Dispenser ID</th>
                    <th class="col-sm-2">Dispenser Type</th>
                    <th class="col-sm-2">Location</th>
                    <th class="col-sm-4">Description</th>
                    <th class="col-1">Real-time Status</th>
                    <th class="col-sm-1">Details</th>
                </tr>
            </thead>
            @foreach ($alldispensers as $alldispenser)
            <tbody>
                <tr class="d-flex">
                    <th class="col-sm-1">{{$alldispenser->id}}</th>
                    <th class="col-sm-1">{{$alldispenser->dispenserID}}</th>
                    <th class="col-sm-2">
                        @if ($alldispenser->dispenserType == 'sensor_tissue')
                            Tissue Dispenser
                        @else
                            Soap Dispenser
                        @endif
                    </th>
                    <th class="col-sm-2">{{$alldispenser->location}}</th>
                    <th class="col-sm-4">{{$alldispenser->description}}</th>
                    <th class="col-1" style="text-align: center">
                        @if ($alldispenser->dispenserType == 'sensor_tissue')
                        <a href="/rtmTissueToday/{{$alldispenser->dispenserID}}" target="_blank">
                                <i class="fas fa-fw fa-chart-area"></i>
                            </a>
                        @else
                          <a href="/rtmSoapToday/{{$alldispenser->dispenserID}}" target="_blank">
                              <i class="fas fa-fw fa-chart-area"></i>
                          </a>
                        @endif
                    </th>
                    <th class="col-sm-1" style="text-align: center">
                      <a href="/dispenser/{{$alldispenser->id}}" class="btn btn-success">View</a>
                    </th>
                </tr>
            </tbody>
            @endforeach
        </table>
    @else
        <p>No Registered Dispenser</p>
    @endif
</div>

@endsection