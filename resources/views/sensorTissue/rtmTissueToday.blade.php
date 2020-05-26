{{-- @extends('layout')
@section('main-content') --}}

<head>
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Smart Toilet > Real-Time Tissue Dispenser Monitoring</title>
    <link rel="icon" href="{!! asset('storage/dash/Smart Toilet.png') !!}"/>
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="/">
            <img class="text-center img-fluid" src="/storage/dash/SmartToiletClear.png" width="200" height="200" alt="">
        </a>
    </nav>
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <!-- Page Heading -->
            <p></p>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Record > Real-Time Tissue Dispenser State</h1>
            </div>
            <hr>
            <p>This is the record of data send from the tissue dispenser</p>
            <div class="container-fluid">
                <!-- Area Chart Example-->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i> Tissue Dispenser State </div>
                    <div class="card-body">
                        <canvas id="ChartT_Today" width="100%" height="30"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated at @php  echo date('j F Y , h:i:s a' , time() ) @endphp</div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script src="{{url( '/vendor/chart.js/Chart.min.js' )}}"></script>
<script src="{{url( '/vendor/chart.js/TissueChartToday.js' )}}"></script>
<script>
  $('#ChartT_Today').ready(function() {
      // auto refresh page after 1 second
      setInterval('refreshPage()', 5000);
  });

  function refreshPage() { 
      location.reload(); 
  }
</script>
</body>

{{-- @endsection --}}