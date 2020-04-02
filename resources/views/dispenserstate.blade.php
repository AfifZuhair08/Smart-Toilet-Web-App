@extends('layout')
@section('main-content')
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Record > Dispenser State</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<hr>



{{-- <div class="container-sm col-xl-4">
    @if (count($sensorStateSs) > 0)
        <table class="table table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="col-md-3">Date & Time</th>
                    <th class="col-md-3">ID</th>
                    <th class="col-md-3">Value</th>
                </tr>
            </thead>
            @foreach ($sensorStateSs as $sensorStateS)
            <tbody>
                <tr>
                    <th class="col-md-3">{{$sensorStateS->entryDate}}</th>
                    <th class="col-md-3">{{$sensorStateS->SsID}}</th>
                    <th class="col-md-3">{{$sensorStateS->sensorValue}}</th>
                </tr>
            </tbody>    
            @endforeach
        </table>    
    @else
        <p>No data of Soap DispeSnser</p>
    @endif
</div> --}}


@endsection