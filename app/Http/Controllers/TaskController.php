<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Staff;
use App\User;
use Auth;

class TaskController extends Controller
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
        // $tasks = Task::orderBy('created_at','desc')->get();
        $tasks = Task::orderBy('created_at','desc')->paginate(3);
        return view('tasks.index', compact('tasks'));
        // return $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskCompleted()
    {
        $tasks = Task::orderBy('created_at','desc')->where('is_complete', '1')->paginate(3);
        return view('tasks.completed')->with('tasks', $tasks);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskInCompleted()
    {
        $tasks = Task::orderBy('created_at','desc')->where('is_complete','0')->paginate(3);
        return view('tasks.incomplete')->with('tasks', $tasks);
    }

    public function status(){
        $tasks = Task::all();
        return view('tasks.status')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $staffs = Staff::get()->pluck('name','id')->toArray();
        // return view('tasks.create')->with(compact('staffs'));
        // return $staffs;
        if (Auth::user()->role_id == 2) {
            return redirect()->route('staff');
        }
        $users = User::select('name','id')->where('role_id','=','2')->get();

        return view('tasks.create', compact('users'));
        // return $users;
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
            'task_title' => 'required',
            'task_description' => 'required',
            'user_id' => 'required',
        ],[
            'task_title.required' => 'Title is empty',
            'task_description.required' => 'Description is empty',
            'user_id.required' => 'Assigning available staff is required'
        ]);

        // create post
        $tasks = new Task;
        $tasks->task_title = $request->input('task_title');
        $tasks->task_description = $request->input('task_description');
        $tasks->is_complete = false;
        // using auth to gain the current logged in user->id
        // $category->user()->associate($request->user());
        $tasks->staff_id = $request->input('user_id');
        // $tasks->manager_id = auth()->user()->id;
        $tasks->user()->associate($request->user());

        $tasks->save();

        return redirect('/tasks')->with('success', 'Tasks succesfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        //Check if user is authorized
        if(auth()->user()->id !== $task->user_id){
            return redirect('/tasks')->with('error', 'Unauthorized action!');
        }
        $users = User::select('name','id')->where('role_id','=','2')->get();
        return view('tasks.edit')->with('task', $task)->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'task_title' => 'required',
            'task_description' => 'required',
            'user_id' => 'required',
        ],[
            'task_title.required' => 'Title is empty',
            'task_description.required' => 'Description is empty',
            'user_id.required' => 'Assigning available staff is required'
        ]);

        // create post
        $tasks = Task::find($id);
        $tasks->task_title = $request->input('task_title');
        $tasks->task_description = $request->input('task_description');
        $tasks->is_complete = false;
        // using auth to gain the current logged in user->id
        // $category->user()->associate($request->user());
        $tasks->staff_id = $request->input('user_id');
        // $tasks->manager_id = auth()->user()->id;
        $tasks->user()->associate($request->user());

        $tasks->save();

        return redirect('/tasks')->with('success', 'Tasks has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        //Check if user is authorized
        if(auth()->user()->id !== $task->user_id){
            return redirect('/tasks')->with('error', 'Unauthorized action!');
        }
        
        $task->delete();
        return redirect('/tasks')->with('success', 'Task has been removed');
    }
}
