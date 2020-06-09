@extends('layout')
@section('main-content')
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Record > Soap Dispenser State</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<hr>
<p>
    This is the record of data send from the soap dispenser
    <p>*data are displayed as latest order</p>
</p>

<div class="container-sm col-md-9">
    @if (count($sensorStateSs) > 0)
        <table class="table table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr class="d-flex">
                    <th class="col-2">Date</th>
                    <th class="col-2">Time</th>
                    <th class="col-sm-3">Dispenser ID</th>
                    <th class="col-sm-3">Entry ID</th>
                    <th class="col-sm-2">Level (mm)</th>
                </tr>
            </thead>
            @foreach ($sensorStateSs as $sensorStateS)
            <tbody>
                <tr class="d-flex">
                    <th class="col-2">{{$sensorStateS->entryDate->format('D d/m/y')}}</th>
                    <th class="col-2">{{$sensorStateS->entryDate->format('g:i:s A')}}</th>
                    <th class="col-sm-3">{{$sensorStateS->dispenserID}}</th>
                    <th class="col-sm-3">{{$sensorStateS->ssID}}</th>
                    <th class="col-sm-2">{{$sensorStateS->sensorValue}}</th>
                </tr>
            </tbody>    
            @endforeach
        </table>
        <small>
            {{$sensorStateSs->links()}}
        </small>
    @else
        <p>No data of Tissue Dispenser</p>
    @endif
</div>


@endsection