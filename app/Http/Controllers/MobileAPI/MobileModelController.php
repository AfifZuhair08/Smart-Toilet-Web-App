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
use App\Staff;
use App\SensorTissue;
use App\SensorSoap;
use App\Task;
use App\Post;
use App\RecordService;


class MobileModelController extends Controller
{
    // Home
    public function home(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
              'success' => false,
              'message' => $validator->errors(),
            ], 401);
        }

        $staff_id = $request->input('id');

        $user = Staff::find($staff_id);

        $userTaskCompleted = Task::where('is_complete','=','1')
        ->where('staff_id','=', $staff_id)->count();

        $userTaskInCompleted = Task::where('is_complete','=','0')
        ->where('staff_id','=', $staff_id)->count();

        // $posts = Post::orderBy('created_at','desc')->take(1)->get();
        $posts = Post::orderBy('created_at','desc')->latest()->get();

        return response()->json([
            'success' => true,
            'staff_detail' => $user,
            'userTaskCompleted' => $userTaskCompleted,
            'userTaskInCompleted' => $userTaskInCompleted,
            'posts' => $posts
        ]);

    }

    // Posts
    public function posts(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
              'success' => false,
              'message' => $validator->errors(),
            ], 401);
        }

        $staff_id = $request->input('id');

        $posts = Post::orderBy('created_at','desc')->get();

        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);

    }

    // Tissue Dispenser data
    public function mainMonitoring(Request $request){

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

        $sensorT = SensorTissue::latest('entryDate')->first();
        $sensorS = SensorSoap::latest('entryDate')->first();
        
        return response()->json([
            'success' => true,
            'sensorT' => $sensorT,
            'sensorS' => $sensorS,
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

        $sensor = SensorTissue::orderBy('entryDate','desc')->paginate(30);
        $sensorcount = SensorTissue::count();
        
        return response()->json([
            'success' => true,
            'sensorcount' => $sensorcount,
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

        $sensor = SensorSoap::orderBy('entryDate', 'desc')->paginate(1);
        
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

        $sensor = SensorSoap::orderBy('entryDate', 'desc')->paginate(30);
        $sensorcount = SensorSoap::count();
        
        return response()->json([
            'success' => true,
            'sensorcount' => $sensorcount,
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

        $tasks = Task::where('staff_id','=', $input_id)->orderBy('created_at','desc')->get();
        // $tasks = Task::orderBy('created_at','desc')->paginate(2);

        return response()->json([
            'success' => true,
            'tasks' => $tasks,
        ]);

    }

    // View single Task by task_id
    public function taskShowById(Request $request){
        
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'task_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();
        $task_id = $input['task_id'];

        $tasks = Task::where('id','=', $task_id)->get();
        // $tasks = Task::orderBy('created_at','desc')->paginate(2);

        return response()->json([
            'success' => true,
            'tasks' => $tasks,
        ]);

    }

    // Tasks by individual users
    public function countallrecords(Request $request){
        
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

        $records = RecordService::where('staff_id','=', $input_id)->count();
        $sensorT = SensorTissue::count();
        $sensorS = SensorSoap::count();

        return response()->json([
            'success' => true,
            'service_records' => $records,
            'sensorT' => $sensorT,
            'sensorS' => $sensorS
        ]);

    }

    // Tasks by individual users
    public function viewAllServiceRecords(Request $request){
        
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

        $records = RecordService::orderBy('created_at','desc')->where('staff_id','=', $input_id)->get();

        return response()->json([
            'success' => true,
            'service_records' => $records
        ]);

    }


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
        
        $user = User::find($input);
        // $success['token'] = $user->createToken('appToken')->accessToken;
        
        return response()->json([
          'success' => true,
        //   'token' => $success,
          'user' => $user,
        //   'id' => $this->$id,
        ]);
    
    }
}
