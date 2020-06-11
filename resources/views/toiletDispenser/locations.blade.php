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
        @if (count($dispenserLocations) > 0)
            
            @foreach ($dispenserLocations as $dispenserLocation)
                
            @endforeach
        </div>
        @else
            <p>No locations</p>
        @endif
    </div>
</div>

@endsection