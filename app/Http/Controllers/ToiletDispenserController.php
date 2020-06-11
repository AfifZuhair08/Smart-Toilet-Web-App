<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Input, Redirect;
use Auth;
use App\User;
use App\ToiletDispenser;
use App\SensorTissue;
use App\SensorSoap;
use DB;

class ToiletDispenserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispenserT = ToiletDispenser::where('dispenserType','=','sensor_tissue')->count();
        $dispenserS = ToiletDispenser::where('dispenserType','=','sensor_soap')->count();
        $alldispensers = ToiletDispenser::all();
        return view('toiletDispenser.index')
        ->with('alldispensers', $alldispensers)
        ->with('dispenserT', $dispenserT)
        ->with('dispenserS', $dispenserS);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toiletDispenser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'dispenserType' => 'required',
            'location' => 'required',
            'dispenserID' => 'required',
            'description' => 'required',
            'unitImage' => 'image|nullable|max:1999'
        ],[
            'dispenserType.required' => 'Please select dispenser type',
            'location.required' => 'Dispenser location is required',
            'dispenserID.required' => 'Unique ID is required',
            'task_description.required' => 'Description should be filled',
        ]);

        if($request->hasFile('unitImage')){
            //get file name with ext
            $filenamewithext = $request->file('unitImage')->getClientOriginalName();
            //get file name
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('unitImage')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('unitImage')->storeAs('public/dispenser', $filenametostore);
        }else{
            $filenametostore = 'nodeviceimage.jpg';
        }

        $dispenser = new ToiletDispenser;
        $dispenser->unitImage = $filenametostore;
        $dispenser->dispenserType = $request->input('dispenserType');
        $dispenser->location = $request->input('location');
        $dispenser->dispenserID = $request->input('dispenserID');
        $dispenser->description = $request->input('description');

        $dispenser->save();

        return redirect('/dispenser')->with('success', 'Dispenser registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispenser = ToiletDispenser::find($id);

        if($dispenser->dispenserType == 'sensor_tissue'){
            $sensorRecords = SensorTissue::orderby('entryDate', 'desc')->where('dispenserID',$dispenser->dispenserID)->paginate(5);
        }else if($dispenser->dispenserType == 'sensor_soap'){
            $sensorRecords = SensorSoap::orderby('entryDate', 'desc')->where('dispenserID',$dispenser->dispenserID)->paginate(5);
        }

        return view('toiletDispenser.show')
        ->with('dispenser', $dispenser)
        ->with('sensorRecords', $sensorRecords);

    }

    public function showLocations()
    {   
        // $dispenserLocations = ToiletDispenser::select('dispenserID','dispenserType', DB::raw('location'))->get()->groupBy('location');        
        $dispenserLocations = ToiletDispenser::orderBy('location','asc')->get();
        // return $dispenserLocations;
        return view('toiletDispenser.locations')->with('dispenserLocations', $dispenserLocations);
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
