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


class MobileAccessController extends Controller
{
  // LOGIN
  public function login()
  {
    if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
      $user = Auth::user();
      $success['token'] = $user->createToken('appToken')->accessToken;
      //After successfull authentication, notice how I return json parameters
      return response()->json([
        'success' => true,
        'token' => $success,
        'user' => $user
      ]);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'Invalid Email or Password',
      ], 401);
    }
  }

  // LOGOUT
  public function logout(Request $res)
  {
    return response()->json([
      'success' => true,
      'message' => 'Logout successfully'
    ]);
  }

  /**
   * Register api. Only available for TESTING purpose
   *
   * @return \Illuminate\Http\Response
   */
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      // 'phone' => 'required|unique:users|regex:/(0)[0-9]{10}/',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => $validator->errors(),
      ], 401);
    }

    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    
    $user = User::create($input);
    $success['token'] = $user->createToken('appToken')->accessToken;
    
    return response()->json([
      'success' => true,
      'token' => $success,
      'user' => $user
    ]);
  }

}
