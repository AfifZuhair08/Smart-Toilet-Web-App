@extends('layout')
@section('main-content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Monitor Tissue Dispenser
    </h1>
</div>
<hr>
<a href="/dispenser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    Dispenser Inventory
</a>

<br><br>

<h5>Dispenser Location</h5><br>
<div class="container-sm">
    <div class="align-content-start">
        @if (count($Tdispensers) > 0)
            <div class="row">
                @foreach ($Tdispensers as $Tdispenser)
                    <div class="col-auto mb-3">
                        <div class="card" style="width: 15rem;">
                            <div class="card-body">
                            <h5 class="card-title"><b>{{$Tdispenser->location}}</b></h5>
                            <p class="card-text">ID : 
                                <a href="/dispenser/{{$Tdispenser->id}}">
                                    {{$Tdispenser->dispenserID}}
                                </a>
                                <a href="/rtmTissueToday/{{$Tdispenser->dispenserID}}" class="btn btn-info float-right" target="_blank">
                                    <i class="fas fa-fw fa-chart-area"></i>
                                </a>
                            </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No Dispenser in inventory</p>
        @endif
    </div>
</div>

@endsection