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

<div class="container">
    <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Soap Dispenser Entries Monthly </div>
        <div class="card-body">
            <canvas id="SoapChartMonthly" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated at @php  echo date('j F Y , h:i:s a' , time() ) @endphp</div>
    </div>
</div>

{{-- <script src="{{url( '/vendor/chart.js/Chart.min.js' )}}"></script>
<script src="{{url( '/vendor/chart.js/ChartSoap.js' )}}"></script> --}}

@endsection