@extends('layout')

@section('main-content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Service Activity</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<hr>
<div class="container-fluid">
    <a href="/records/servicerecords" class="d-block d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    All Service</a>
    <a href="/records/servicerecords2" class="d-block d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    Checked</a>
    <a href="/records/servicerecords3" class="d-block d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-task fa-sm text-white-50"></i>    Not Checked</a>
<p></p>
</div>

@include('inc.cpmessage')
<div class="container-fluid">
    @if (count($records) > 0)
    <table class="table table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <tr class="d-flex">
                <th class="col-1">ID</th>
                <th class="col-5">Notes</th>
                <th class="col-2">Staff</th>
                <th class="col-1">Task</th>
                <th class="col-1">Status</th>
                <th class="col-2">Date Submitted</th>
            </tr>
        </thead>
        @foreach ($records as $record)
        <tbody>
            <tr class="d-flex">
                <th class="col-1">{{$record->id}}</th>
                <th class="col-5">{{$record->additional_notes}}</th>
                <th class="col-2">{{ ucwords($record->staff->name)}}</th>
                <th class="col-1 text-center">
                    @if(!empty($record->task_id))
                        <a href="/tasks/{{$record->task_id}}"> View Task</a>
                    @else
                        No
                    @endif
                </th>
                <th class="col-1 text-center">
                    @if ($record->is_checked)
                        <a href="#" class="btn btn-success"> Checked </a>
                    @else
                        <a href="#" class="btn btn-warning"> Not Checked </a>
                    @endif
                </th>
                <th class="col-2">{{$record->created_at}}</th>
            </tr>
        </tbody>  
        @endforeach
    </table>
    {{$records->links()}}
    @else
        <p>No Records !</p>
    @endif

</div>
@endsection