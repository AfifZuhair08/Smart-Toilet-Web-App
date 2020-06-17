<?php

namespace App\Http\Controllers\MobileAPI;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Input, Redirect;
use Auth;
use App\User;
use App\SensorTissue;
use App\SensorSoap;
use App\ToiletDispenser;
use App\Task;
use App\RecordService;

class MobileResponseController extends Controller
{
    // Tissue Dispenser Entry
    public function tissueDispenserEntry(Request $request){

        $validator = Validator::make($request->all(), [
            'dispenserID' => 'required',
            'location' => 'required',
            'sensorValue' => 'required',
            'sensorStatus' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => $validator->errors(),
                'message' => 'Sent from Smart Toilet Web Server'
            ], 401);
        }

        $dispenserID = $request->input('dispenserID');
        $validate = ToiletDispenser::where('dispenserID','=', $dispenserID)->first();
        
        if($validate == null){
            return response()->json([
            'success' => false,
            'validate' => $validate,
            'status' => 'dispenser are not registered',
            'message' => 'Sent from Smart Toilet Web Server'
            ], 401);
        }
        
        $sensorTissue = new SensorTissue;
        $sensorTissue->dispenserID = $request->input('dispenserID');
        $sensorTissue->location = $request->input('location');
        $sensorTissue->sensorValue = $request->input('sensorValue');
        $sensorTissue->sensorStatus = $request->input('sensorStatus');

        $sensorTissue->save();

        return response()->json([
            'success' => true,
            'sensor' => $sensorTissue,
            'message' => 'Sent from Smart Toilet Web Server'
        ]);
    }

    // Tissue Dispenser Entry
    public function soapDispenserEntry(Request $request){

        $validator = Validator::make($request->all(), [
            'dispenserID' => 'required',
            'location' => 'required',
            'sensorValue' => 'required',
            'sensorStatus' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            'message' => 'Sent from Smart Toilet Web Server'
            ], 401);
        }

        $dispenserID = $request->input('dispenserID');
        $validate = ToiletDispenser::where('dispenserID','=', $dispenserID)->first();
        
        if($validate == null){
            return response()->json([
            'success' => false,
            'validate' => $validate,
            'status' => 'dispenser are not registered',
            'message' => 'Sent from Smart Toilet Web Server'
            ], 401);
        }
        
        $sensorSoap = new SensorSoap;
        $sensorSoap->dispenserID = $request->input('dispenserID');
        $sensorSoap->location = $request->input('location');
        $sensorSoap->sensorValue = $request->input('sensorValue');
        $sensorSoap->sensorStatus = $request->input('sensorStatus');

        $sensorSoap->save();

        return response()->json([
            'success' => true,
            'sensor' => $sensorSoap,
            'message' => 'Sent from Smart Toilet Web Server'
        ]);
    }

    public function recordService(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            // 'is_checked' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }

        $record = new RecordService;
        $record->staff_id = $request->input('id');
        $record->task_id = $request->input('task_id');
        $record->additional_notes = $request->input('notes');

        $record->is_checked = true;
        $task_is_checked = $request->input('is_checked');

        $record->save();
        $record_id = $record->id;

        //If the record is associated with task
        if(!empty($record->task_id)){
            
            $task = Task::find($record->task_id);

            if($task_is_checked == false){
                $task->is_complete = false;
            }else{
                $task->is_complete = true;
            }
            
            $task->record_service_id = $record_id;
            $task->save();
        }

        return response()->json([
            'success' => true,
            'record' => $record,
            'task' => $task ?? 'No task associate',
        ]);

    }

}
