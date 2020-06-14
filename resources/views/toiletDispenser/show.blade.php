@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Dispenser Details
    </h1>
</div>
<hr>
<a href="/dispenser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    All Dispenser
</a>
@if ($dispenser->dispenserType == 'sensor_tissue')
    <a href="/toiletDispenser/monitorTD" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        All Locations for Tissue Dispenser
    </a>
@else
    <a href="/toiletDispenser/monitorSD" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        All Locations for Soap Dispenser
    </a>
@endif

<br><br><br>

<div class="container-sm col-sm-6">
    <div class="row justify-content-start">
        <div class="col-2"><b>Dispenser ID</b> </div>
        <div class="col">: {{$dispenser->dispenserID}}</div>
    </div>
    <div class="row justify-content-start">
        <div class="col-2"><b>Type</b></div>
        <div class="col">: 
            @if ($dispenser->dispenserType == 'sensor_tissue')
                Tissue Dispenser
            @else
                Soap Dispenser
            @endif
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col-2"><b>Location</b></div>
        <div class="col">: {{$dispenser->location}}</div>
    </div>
    <div class="row justify-content-start">
        <div class="col-2"><b>Description</b></div>
        <div class="col">: {{$dispenser->description}}</div>
    </div>
</div>
<br><br>
<h4>Real-time Graph</h4>
<p>
    @if ($dispenser->dispenserType == 'sensor_tissue')
        <a href="/rtmTissueToday/{{$dispenser->dispenserID}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">View</a>
    @else
        <a href="/rtmSoapToday/{{$dispenser->dispenserID}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">View</a>
    @endif
</p><br>
<h4>State Records</h4><br>    
<div class="container-sm col-md-9">
    @if (count($sensorRecords) > 0)
        <table class="table table-hover table-sm table-bordered">
            <thead class="thead-light">
                <tr class="d-flex">
                    <th class="col-3">Date</th>
                    <th class="col-3">Time</th>
                    <th class="col-sm-3">ID</th>
                    <th class="col-sm-3">Value (cm)</th>
                </tr>
            </thead>
            @foreach ($sensorRecords as $sensorRecord)
            <tbody>
                <tr class="d-flex">
                    <th class="col-3">{{$sensorRecord->entryDate->format('D d/m/y')}}</th>
                    <th class="col-3">{{$sensorRecord->entryDate->format('g:i:s A')}}</th>
                    <th class="col-sm-3">
                        @if($sensorRecord->dispenserID == 'tsID')
                            {{$sensorRecord->tsID}}
                        @else
                            {{$sensorRecord->ssID}}
                        @endif
                        {{$sensorRecord->tsID}}
                    </th>
                    <th class="col-sm-3">{{$sensorRecord->sensorValue}}</th>
                </tr>
            </tbody>    
            @endforeach
        </table>
        <small class="default">
            {{$sensorRecords->links()}}
        </small>
    @else
    <table class="table table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <tr class="d-flex">
                <th class="col-3">Date</th>
                <th class="col-3">Time</th>
                <th class="col-sm-3">ID</th>
                <th class="col-sm-3">Value (cm)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <p>No data of this dispenser</p>
                </th>
            </tr>
        </tbody>
    </table>
    @endif
</div>
@endsection
