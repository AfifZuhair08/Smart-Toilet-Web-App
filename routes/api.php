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
    
    Route::post('/login', 'MobileAPI\MobileAccessController@login');
    Route::post('/register', 'MobileAPI\MobileAccessController@register');//Available only for testing purposes
    Route::get('/logout', 'MobileAPI\MobileAccessController@logout');

    Route::post('/home','MobileAPI\MobileModelController@home');

    Route::post('/tV','MobileAPI\MobileModelController@tasksViewById');
    Route::post('/tS','MobileAPI\MobileModelController@taskShowById');

    Route::post('/posts','MobileAPI\MobileModelController@posts');

    Route::post('/mainMonitor','MobileAPI\MobileModelController@mainMonitoring');
    Route::post('/tD','MobileAPI\MobileModelController@tissueDispenserLatest');
    Route::post('/tDList','MobileAPI\MobileModelController@tissueDispenserLists');
    Route::post('/sD','MobileAPI\MobileModelController@soapDispenserLatest');
    Route::post('/sDList','MobileAPI\MobileModelController@soapDispenserLists');

    Route::post('/sensorT','MobileAPI\MobileResponseController@tissueDispenserEntry');
    Route::post('/sensorS','MobileAPI\MobileResponseController@soapDispenserEntry');

    Route::post('/allrecords','MobileAPI\MobileModelController@countallrecords');
    Route::post('/allservicerecords','MobileAPI\MobileModelController@viewAllServiceRecords');
    Route::post('/recordService','MobileAPI\MobileResponseController@recordService');

    Route::post('/userProfile', 'MobileAPI\MobileModelController@userProfile');

    Route::get('chartTissue', 'ChartsApiController@graphTissue')->name('api.chartTissue');
    Route::get('chartSoap', 'ChartsApiController@graphSoap')->name('api.chartSoap');

});