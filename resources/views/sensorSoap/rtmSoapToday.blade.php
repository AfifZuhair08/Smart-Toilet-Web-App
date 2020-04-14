@extends('layout')
@section('main-content')
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Record > Real-Time Tissue Dispenser State</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<hr>
<p>
    This is the record of data send from the tissue dispenser
</p>

<div class="container-fluid">
    <!-- Area Chart Example-->
    <div class="card" style="width: 100rem;">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Tissue Dispenser State </div>
        <div class="card-body">
            <canvas id="ChartS_Today" width="180%" height="65"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated at @php  echo date('j F Y , h:i:s a' , time() ) @endphp</div>
    </div>
</div>


@endsection

{{-- @section( 'scripts' ) --}}
{{-- <script src="/vendor/jquery/jquery.min.js"></script>

<script src="/vendor/chart.js/Chart.min.js"></script>

<script src="/vendor/chart.js/newChart.js"></script> --}}

    {{-- <script src="{{url( '/vendor/jquery/jquery.min.js' )}}"></script>

    <script src="{{url( '/vendor/chart.js/Chart.min.js' )}}"></script>

    <script src="{{url( '/vendor/chart.js/newChart.js' )}}"></script> --}}
{{-- @endsection --}}

{{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}