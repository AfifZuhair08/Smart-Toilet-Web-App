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
use App\RecordService;

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

    public function recordService(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'is_checked' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }

        $record = new RecordService;
        $record->staff_id = $request->input('id');
        $record->is_checked = $request->input('is_checked');
        $record->task_id = $request->input('task_id');
        $record->additional_notes = $request->input('notes');

        $record->save();
        $record_id = $record->id;

        //If the record is associated with task
        if(!empty($record->task_id)){
            
            $task = Task::find($record->task_id);
            $task->is_complete = true;
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
