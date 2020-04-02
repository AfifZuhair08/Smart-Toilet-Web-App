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
</p>

<div class="container-sm col-xl-5">
    @if (count($sensorStateSs) > 0)
        <table class="table table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr class="d-flex">
                    <th class="col-4">Date/Time</th>
                    <th class="col-sm-4">ID</th>
                    <th class="col-sm-4">Value</th>
                </tr>
            </thead>
            @foreach ($sensorStateSs as $sensorStateS)
            <tbody>
                <tr class="d-flex">
                    <th class="col-4">{{$sensorStateS->entryDate}}</th>
                    <th class="col-sm-4">{{$sensorStateS->ssID}}</th>
                    <th class="col-sm-4">{{$sensorStateS->sensorValue}}</th>
                </tr>
            </tbody>    
            @endforeach
            <small>
                {{$sensorStateSs->links()}}
            </small>
        </table>    
    @else
        <p>No data of Tissue Dispenser</p>
    @endif
</div>


@endsection