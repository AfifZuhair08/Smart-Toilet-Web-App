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

class MobileModelController extends Controller
{
    // User Profile
    public function userProfile(Request $request){

        $validator = Validator::make($request->all(), [
          'id' => 'required',
        ]);
    
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'message' => $validator->errors(),
          ], 401);
        }
    
        $input = $request->all();
        $input['id'] = $input['id'];
        
        $user = User::find($input)->where('role_id','=','1');
        // $success['token'] = $user->createToken('appToken')->accessToken;
        
        return response()->json([
          'success' => true,
        //   'token' => $success,
          'user' => $user,
        //   'id' => $this->$id,
        ]);
    
    }
    
    // Tissue Dispenser data
    public function tissueDispenserLatest(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }
        
        $input = $request->all();
        $input['id'] = $input['id'];

        $sensor = SensorTissue::latest('entryDate')->first();
        
        return response()->json([
            'success' => true,
            'sensor' => $sensor,
        ]);
    }

    // Tissue Dispenser data
    public function tissueDispenserLists(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }
        
        $input = $request->all();
        $input['id'] = $input['id'];

        $sensor = SensorTissue::orderBy('entryDate','desc')->get();
        
        return response()->json([
            'success' => true,
            'sensor' => $sensor,
        ]);
    }

    // Soap Dispenser data
    public function soapDispenserLatest(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }
        
        $input = $request->all();
        $input['id'] = $input['id'];

        $sensor = Sensor::orderBy('entryDate', 'desc')->paginate(1);
        
        return response()->json([
            'success' => true,
            'sensor' => $sensor,
        ]);
    }

    // Soap Dispenser data
    public function soapDispenserLists(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'message' => $validator->errors(),
            ], 401);
        }
        
        $input = $request->all();
        $input['id'] = $input['id'];

        $sensor = Sensor::orderBy('entryDate', 'desc')->paginate(1);
        
        return response()->json([
            'success' => true,
            'sensor' => $sensor,
        ]);
    }

    // Tasks by individual users
    public function tasksViewById(Request $request){
        
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();
        $input_id = $input['id'];

        $tasks = Task::where('staff_id','=', $input_id)->get();
        // $tasks = Task::orderBy('created_at','desc')->paginate(2);

        return response()->json([
            'success' => true,
            'tasks' => $tasks,
        ]);

    }
}
