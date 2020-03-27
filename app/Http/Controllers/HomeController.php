<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


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
        $posts = Post::orderBy('created_at','desc')->take(1)->get();
        return view('dashboard')->with('posts', $posts);
    }
}
