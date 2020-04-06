<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SensorTissue;
use App\SensorSoap;

class RecordStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensorStateTs = SensorTissue::orderBy('entryDate','desc')->paginate(10);
        // $sensorStateSs = SensorSoap::orderBy('entryDate','desc')->paginate(3);
        return view('sensorTissue.datarecord')->with('sensorStateTs', $sensorStateTs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        // $sensorStateTs = SensorTissue::orderBy('entryDate','desc')->paginate(3);
        $sensorStateSs = SensorSoap::orderBy('entryDate','desc')->paginate(10);
        return view('sensorSoap.datarecord')->with('sensorStateSs', $sensorStateSs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
