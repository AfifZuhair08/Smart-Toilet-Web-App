<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Task;
use App\SensorTissue;
use App\SensorSoap;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        // $posts = Post::orderBy('created_at','desc')->take(1)->get();
        // return view('dashboard')->with('posts', $posts);

        // testing
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::orderBy('created_at','desc')->take(1)->get();

        $tasks = Task::count();
        $tasks_complete = Task::where('is_complete','=','1')->count();
        $tasks_complete = $tasks_complete / $tasks *100;

        $sTissue = SensorTissue::count();
        $sSoap = SensorSoap::count();

        return view('dashboard')
        ->with('tasks', $tasks)
        ->with('tasks_complete', $tasks_complete)
        ->with('sTissue',$sTissue)
        ->with('sSoap',$sSoap)
        ->with('posts', $posts);
    }
}
