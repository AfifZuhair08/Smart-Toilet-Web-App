@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        {{-- <a href="/tasks"> --}}
            Dispenser Details
        {{-- </a> --}}
    </h1>
</div>
<hr>
<a href="/dispenser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    View All Dispenser
</a>
<br><br><br>

<div class="flex">
    <h5><b>Dispenser ID </b>&nbsp;: {{$dispenser->dispenserID}}</h5>
    <h5><b>Dispenser Type </b>&nbsp;:
        @if ($dispenser->dispenserType == 'sensor_tissue')
            Tissue Dispenser
        @else
            Soap Dispenser
        @endif
    </h5>
    <h5><b>Location </b>&nbsp;: {{$dispenser->location}}</h5>
    <h5><b>Description </b>&nbsp;: {{$dispenser->description}}</h5>
</div>

<br>

<h4>State Records</h4><br>    
<div class="container-sm col-md-9">
    @if (count($sensorRecords) > 0)
        <table class="table table-hover table-sm table-bordered">
            <thead class="thead-dark">
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
        <p>No data of this dispenser</p>
    @endif
</div>
@endsection
