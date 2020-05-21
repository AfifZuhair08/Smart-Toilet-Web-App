<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SensorTissue;
use App\Http\Resources\SensorTissue as SensorTissueResource;
use Carbon\Carbon;
use DB;

class SensorTissueController extends Controller
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
        //return view('monitorTissue');
        $sensortissues = SensorTissue::paginate(15);
        return SensorTissueResource::collection($sensortissues);
    }

    public function graphToday(){
        return view('sensorTissue/tdgraph');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getAllMonth(){
        
        $month_array = array();
        $SensorTissues = SensorTissue::orderBy('entryDate','asc')->pluck('entryDate');
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
        $monthlyEntry = SensorTissue::whereMonth('entryDate',$month)->get()->count();
        return $monthlyEntry;
    }

    function getMonthlyEntry(){
        
        // $monthlyEntryData_array = array();
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
        // $month_array = $this->getAllMonth();
        // return $monthlyEntry_array;
        $max_num = max($monthlyEntry_array);
        $max = round(($max_num + 10/2 ) / 10)*10;
        
        $monthlyEntryData_array = array(
            'months' => $monthName_array,
            'monthly_entries' => $monthlyEntry_array,
            'max' => $max,
        );

        return $monthlyEntryData_array;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getAllTodayEntries(){
        
        // GET ALL TODAY'S ENTRY DATA
        $todayentry = SensorTissue::whereDate('entryDate', '=', date('Y-m-d'))->get()->sortBy('entryDate');
        // $todayentry_array = array();
        // $todayentryDates = SensorTissue::orderBy('entryDate','asc')->take(30)->pluck('entryDate');
        $todayentryDates = json_decode($todayentry);
        return $todayentry;
    }

    public function getAllDaily15Entries(){
        $todayentryDates = array();
        $todayentryDates = SensorTissue::latest()->take(15)->get()->sortBy('entryDate')->pluck('entryDate');
        // $todayentryDates = SensorTissue::orderBy('entryDate','asc')->format("Y-m-d H:i:s")->take(15)->pluck('entryDate');
        // $todayentryDates = $todayentryDates->format("Y-m-d H:i:s");
        $todayentryDates = json_decode($todayentryDates);

        $todayentryValues = array();
        $todayentryValues = SensorTissue::latest()->take(15)->get()->sortBy('entryDate')->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);

        $labels = $todayentryDates;
        $data = $todayentryValues;
        return response()->json(compact('labels','data'));

    }

    public function getAllTodayEntriesValues(){
        // $todayentryValues_array = array();
        $todayentryValues = SensorTissue::orderBy('entryDate','asc')->take(30)->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);
        return $todayentryValues;
    }

    public function getTodayEntries(){
        $todayentry = array();
        $todayentry = SensorTissue::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('entryDate');
        $todayentry = json_decode($todayentry);

        $todayentryValues = array();
        // $todayentryValues = SensorTissue::orderBy('entryDate','asc')->take(30)->pluck('sensorValue');
        $todayentryValues = SensorTissue::whereDate('entryDate', Carbon::today())->get()->take(30)->pluck('sensorValue');
        $todayentryValues = json_decode($todayentryValues);

        $labels = $todayentry;
        $data = $todayentryValues;
        return response()->json(compact('labels','data'));
        // return $todayentry;
    }

    /**
     * Display a listing of the resource.(LINE GRAPH)
     *
     * @return \Illuminate\Http\Response
     */
    public function graph()
    {
        return view('monitorTissue');
    }

}
