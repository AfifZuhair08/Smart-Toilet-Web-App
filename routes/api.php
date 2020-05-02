<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'UsersController@login');
    Route::post('/register', 'UsersController@register');
    Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
});

Route::group(['prefix' => 'v2'], function () {
    Route::post('/login', 'MobileAppController@login');
    Route::post('/register', 'MobileAppController@register');
    Route::get('/logout', 'MobileAppController@logout')->middleware('auth:api');
});

// // SENSORTISSUE
// // list 15
// Route::get('sensortissues','SensorTissueController@index');
// // list single one
// Route::get('sensortissue/{id}','SensorTissueController@show');
// // show all latest
// Route::get('get_daily15_Tdata','SensorTissueController@getAllDaily15Entries');
// // create new entry
// Route::post('sensortissue','SensorTissueController@store');
// // update
// Route::put('sensortissues','SensorTissueController@store');
// // delete
// Route::delete('sensortissues','SensorTissueController@destroy');
