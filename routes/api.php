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
    
    Route::post('/login', 'MobileAccessController@login');
    Route::post('/register', 'MobileAccessController@register');//Available only for testing purposes
    Route::get('/logout', 'MobileAccessController@logout');

    Route::post('/userProfile', 'MobileModelController@userProfile');

    Route::post('/tV','MobileModelController@tasksViewById');

    Route::post('/tD','MobileModelController@tissueDispenserLatest');
    Route::post('/tDList','MobileModelController@tissueDispenserList');
    Route::post('/tS','MobileModelController@soapDispenserLatest');
    Route::post('/tSList','MobileModelController@soapDispenserList');

    Route::post('/sensorT','MobileResponseController@tissueDispenserEntry');
    Route::post('/sensorS','MobileResponseController@soapDispenserEntry');

    Route::post('/recordService','MobileResponseController@recordService');

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
