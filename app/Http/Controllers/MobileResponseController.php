<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Input, Redirect;
use Auth;
use App\User;
use App\SensorTissue;
use App\SensorSoap;
use App\Task;

class MobileResponseController extends Controller
{
    // Tissue Dispenser Entry
    public function tissueDispenserEntry(Request $request){

        $validator = Validator::make($request->all(), [
            'sensorValue' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }
        
        $sensorTissue = new SensorTissue;
        $sensorTissue->sensorValue = $request->input('sensorValue');

        $sensorTissue->save();

        return response()->json([
            'success' => true,
            'sensor' => $sensorTissue,
        ]);
    }

    // Tissue Dispenser Entry
    public function soapDispenserEntry(Request $request){

        $validator = Validator::make($request->all(), [
            'sensorValue' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }
        
        $sensorSoap = new SensorSoap;
        $sensorSoap->sensorValue = $request->input('sensorValue');

        $sensorSoap->save();

        return response()->json([
            'success' => true,
            'sensor' => $sensorSoap,
        ]);
    }

    
}
