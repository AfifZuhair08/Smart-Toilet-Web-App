@extends('layout')
@section('main-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
       <a href="/dispenser" class="text-dark">Dispensers</a> > Register New Dispenser</h1>
</div>
<hr>

@include('inc.cpmessage')

<div class="col-3">
    {{-- Form to POST --}}
    {!! Form::open(['action' => 'ToiletDispenserController@store',
        'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="form-group">
        {{Form::label('dispenserType','Dispenser type')}}
        {{-- {{Form::text('dispenserType','',['class' => 'form-control','placeholder' => ''])}} --}}
        <select class="form-control" name="dispenserType">
            <option value="" disabled selected hidden>--------------Select type--------------</option>
            <option value="sensor_tissue">Tissue Dispenser</option>
            <option value="sensor_soap">Soap Dispenser</option>
        </select>
    </div><br>
    <div class="form-group">
        {{Form::label('location','Location of the dispenser')}}
        <br><small>(Level)-(Wing/Side/Location Number)-(Female/Male)</small>
        <br><small>eg: G-South-Male</small>
        {{Form::text('location','',['class' => 'form-control','placeholder' => ''])}}
    </div>
    <div class="form-group">
        {{Form::label('dispenserID','Dispenser ID')}}
        <br><small>(Dispenser type)-(Level/Location/Toilet)</small>
        <br><small>eg: SD-GSM</small>
        {{Form::text('dispenserID','',['class' => 'form-control','placeholder' => ''])}}
    </div>
</div>
<div class="col-9">
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::text('description','',['class' => 'form-control','placeholder' => ''])}}
    </div>
</div>
<br>
<div class="col-3">
    <div class="form-group">
        {{Form::label('unitImage','Image of dispenser (optional)')}}
        {{Form::file('unitImage')}}
    </div>
</div>
<hr>
<div class="col-9">
    {{Form::submit('Submit',['class'=>'btn btn-success btn-md btn-block'])}}
    {!! Form::close() !!}
</div>

@endsection