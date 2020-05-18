<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SensorTissue;
use App\SensorSoap;
use Carbon\Carbon;


class ChartsApiController extends Controller
{
    public function graphTissue(){
        $todayentry = array();
        // $todayentry = SensorTissue::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('entryDate');
        $todayentry = SensorTissue::orderBy('entryDate', 'asc')->take(30)->pluck('entryDate');
        $todayentry = json_decode($todayentry);

        $todayentryValues = array();
        // $todayentryValues = SensorTissue::orderBy('entryDate','asc')->take(30)->pluck('sensorValue');
        // $todayentryValues = SensorTissue::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('sensorValue');
        $todayentryValues = SensorTissue::orderBy('entryDate', 'asc')->take(30)->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);

        $labels = $todayentry;
        $data = $todayentryValues;
        return response()->json(compact('labels','data'));
        // return $todayentry;
    }

    public function graphSoap(){
        $todayentry = array();
        // $todayentry = SensorTissue::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('entryDate');
        $todayentry = SensorSoap::orderBy('entryDate', 'asc')->take(30)->pluck('entryDate');
        $todayentry = json_decode($todayentry);

        $todayentryValues = array();
        // $todayentryValues = SensorTissue::orderBy('entryDate','asc')->take(30)->pluck('sensorValue');
        // $todayentryValues = SensorTissue::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('sensorValue');
        $todayentryValues = SensorSoap::orderBy('entryDate', 'asc')->take(30)->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);

        $labels = $todayentry;
        $data = $todayentryValues;
        return response()->json(compact('labels','data'));
        // return $todayentry;
    }
}
