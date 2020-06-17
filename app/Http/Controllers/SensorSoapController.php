<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SensorSoap;
use App\ToiletDispenser;
use Carbon\Carbon;

class SensorSoapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monitorSoap');
    }

    function getAllMonth(){
        
        $month_array = array();
        $SensorTissues = SensorSoap::orderBy('entryDate','asc')->pluck('entryDate');
        $SensorTissues = json_decode($SensorTissues);
        
        if( !empty ($SensorTissues)){
            foreach( $SensorTissues as $unformatted_date){
                $date = new \DateTime( $unformatted_date);
                $month_num = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_num] = $month_name;
            }
        }
        return $month_array;
    }

    function getCountMonthEntry($month){
        // $month = 03;
        $monthlyEntry = SensorSoap::whereMonth('entryDate',$month)->get()->count();
        return $monthlyEntry;
    }

    function getMonthlyEntry(){
        
        $monthlyEntry_array = array();
        $monthName_array = array();

        $month_array = $this->getAllMonth();
        if(!empty($month_array)){
            foreach($month_array as $month_num => $month_name){
                $monthlyEntry = $this->getCountMonthEntry($month_num);
                array_push( $monthlyEntry_array, $monthlyEntry);
                array_push( $monthName_array, $month_name);
            }
        }

        $max_num = max($monthlyEntry_array);
        $max = round(($max_num + 10/2 ) / 10)*10;
        
        $monthlyEntryData_array = array(
            'months' => $monthName_array,
            'monthly_entries' => $monthlyEntry_array,
            'max' => $max,
        );
        return $monthlyEntryData_array;
    }

    public function getTodayEntries(){

        $todayentry = array();
        $todayentry = SensorSoap::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('entryDate');
        $todayentry = json_decode($todayentry);

        $todayentryValues = array();
        $todayentryValues = SensorSoap::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);

        $labels = $todayentry;
        $data = $todayentryValues;
        return response()->json(compact('labels','data'));
    }

    public function rtmSoap($id){
        $dispenser = SensorSoap::where('dispenserID','=', $id)->latest()->limit(1)->get();
        // return $dispenserID;
        return view('sensorSoap/rtmSoapToday')->with('dispenser', $dispenser);
    }

    public function getAllDaily15Entries($id){
        $todayentryDates = array();
        $todayentryDates = SensorSoap::latest()->where('dispenserID','=', $id)->take(15)->get()->sortBy('entryDate')->pluck('ssID');
        $todayentryDates = json_decode($todayentryDates);

        $todayentryValues = array();
        $todayentryValues = SensorSoap::latest()->where('dispenserID','=', $id)->take(15)->get()->sortBy('entryDate')->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);

        $labels = $todayentryDates;
        $data = $todayentryValues;
        return response()->json(compact('labels','data'));
    }

    public function getAllSoapDispenser(){
        $Tdispensers = ToiletDispenser::where('dispenserType','=','sensor_soap')->get();
        return view('toiletDispenser.monitorSD')->with('Tdispensers', $Tdispensers);
    }

}
