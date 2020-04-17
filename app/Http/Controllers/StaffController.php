<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Storage;
use App\Staff;


class StaffController extends Controller
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
        // $staffs = Staff::orderBy('id','desc')->get();
        $staffs = Staff::orderBy('id','desc')->paginate(5);
        return view('staffs.index')->with('staffs', $staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');

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
            'name' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'userImage' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasFile('userImage')){
            //get file name with ext
            $filenamewithext = $request->file('userImage')->getClientOriginalName();
            //get file name
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('userImage')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('userImage')->storeAs('public/staff', $filenametostore);
        }else{
            $filenametostore = 'noimage.jpg';
        }

        // create post
        $post = new Staff;
        $post->name = $request->input('name');
        $post->userImage = $filenametostore;
        $post->username = $request->input('username');
        $post->phone = $request->input('phone');
        $post->email = $request->input('email');
        //create hash password
        $post->password = Hash::make($request->input('password'));

        // using auth to gain the current logged in user->id
        // $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/staffs')->with('success', 'Staff Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('staffs.show')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);

        //Check if user is authorized
        // if(auth()->user()->id !== $staff->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorized action!');
        // }
        return view('staffs.edit')->with('staff', $staff);
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
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'email' => 'required',
            'userImage' => 'image|nullable|max:3999'
        ]);

        //Handle file upload
        if($request->hasFile('userImage')){
            //get file name with ext
            $filenamewithext = $request->file('userImage')->getClientOriginalName();
            //get file name
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('userImage')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('userImage')->storeAs('public/staff', $filenametostore);
        }

        // create post
        $staff = Staff::find($id);
        $staff->name = $request->input('name');
        
        // $post->userImage = $filenametostore;
        // if($staff->userImage==="noimage.jpg"){
        //     return redirect('/staffs')->with('success', 'Post Updated');
        // }

        if($request->hasFile('userImage')){
            // Storage::delete('public/userImage/' . $staff->userImage);
            $staff->userImage = $filenametostore;
        }

        $staff->username = $request->input('username');
        $staff->phone = $request->input('phone');
        $staff->email = $request->input('email');
        $staff->save();

        return redirect('/staffs')->with('success', 'Staff details has been updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editToDelete(Request $request, $id)
    {
        $staff = Staff::find($id);
        return view('staffs.editToDelete')->with('staff', $staff);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);

        //Check if user is authorized
        // if(auth()->user()->id !== $staff->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorized action!');
        // }

        if($staff->userImage != 'noimage.jpg'){
            Storage::delete('public/staff/'.$staff->userImage);
        }
        $staff->delete();
        return redirect('/staffs')->with('success', 'Staff account removed');
    }
}
