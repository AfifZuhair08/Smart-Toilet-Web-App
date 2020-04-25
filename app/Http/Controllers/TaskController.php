<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Staff;
use App\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at','desc')->get();
        $tasks = Task::orderBy('created_at','desc')->paginate(3);
        return view('tasks.index')->with('tasks', $tasks);
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
        // $tasks = Task::orderBy('created_at','desc')->paginate(3);
        return view('tasks.index')->with('tasks', $tasks);
        // return $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskInCompleted()
    {
        $tasks = Task::orderBy('created_at','desc')->where('is_complete','0')->paginate(3);
        // $tasks = Task::orderBy('created_at','desc')->paginate(3);
        return view('tasks.index')->with('tasks', $tasks);
        // return $tasks;
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

        $staffs = Staff::all(['id', 'name']);
        return view('tasks.create', compact('staffs',$staffs));
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
            'staff_id' => 'required',
        ]);

        // create post
        $tasks = new Task;
        $tasks->task_title = $request->input('task_title');
        $tasks->task_description = $request->input('task_description');
        $tasks->staff_id = $request->input('staff_id');
        $tasks->is_complete = false;
        // using auth to gain the current logged in user->id
        $tasks->user_id = auth()->user()->id;
        $tasks->save();

        return redirect('/tasks/create')->with('success', 'Tasks succesfully created');
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
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
