<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Storage;
use App\Staff;
use App\User;


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
        // $staffs = Staff::orderBy('id','desc')->paginate(5);
        $users = User::orderBy('id','desc')->where('role_id','=','2')->paginate(5);
        return view('staffs.index')->with('users', $users);
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
        $user = new User;
        $user->name = $request->input('name');
        $user->userImage = $filenametostore;
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        //create hash password
        $user->password = Hash::make($request->input('password'));
        $user->role_id = '2';

        // using auth to gain the current logged in user->id
        // $post->user_id = auth()->user()->id;
        $user->save();

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
        $user = User::find($id);
        return view('staffs.show')->with('user', $user);
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
        }

        // create post
        $user = User::find($id);
        $user->name = $request->input('name');

        if($request->hasFile('userImage')){
            // Storage::delete('public/userImage/' . $staff->userImage);
            $user->userImage = $filenametostore;
        }

        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();

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
