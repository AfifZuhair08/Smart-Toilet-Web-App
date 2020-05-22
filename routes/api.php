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

    Route::post('/home','MobileModelController@home');

    Route::post('/tV','MobileModelController@tasksViewById');
    Route::post('/tS','MobileModelController@taskShowById');

    Route::post('/posts','MobileModelController@posts');

    Route::post('/mainMonitor','MobileModelController@mainMonitoring');
    Route::post('/tD','MobileModelController@tissueDispenserLatest');
    Route::post('/tDList','MobileModelController@tissueDispenserLists');
    Route::post('/sD','MobileModelController@soapDispenserLatest');
    Route::post('/sDList','MobileModelController@soapDispenserLists');

    Route::post('/sensorT','MobileResponseController@tissueDispenserEntry');
    Route::post('/sensorS','MobileResponseController@soapDispenserEntry');

    Route::post('/allrecords','MobileModelController@countallrecords');
    Route::post('/allservicerecords','MobileModelController@viewAllServiceRecords');
    Route::post('/recordService','MobileResponseController@recordService');

    Route::post('/userProfile', 'MobileModelController@userProfile');

    Route::get('chartTissue', 'ChartsApiController@graphTissue')->name('api.chartTissue');
    Route::get('chartSoap', 'ChartsApiController@graphSoap')->name('api.chartSoap');

});