<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//DASHBOARD
Route::get('/','DashboardController@index');
Route::get('/dashboard','DashboardController@index');

//MONITOR TISSUE DISPENSER
// Route::resource('monitorTissue','SensorTissueController');
Route::get('monitorTissue','SensorTissueController@graph');
// Graph Monthly Entry
Route::get('get_chart_data','SensorTissueController@getMonthlyEntry');
Route::get('get_chart_data2','SensorSoapController@getMonthlyEntry');
Route::get('rtmTissue', function(){
    return view('sensorTissue/rtmTissue');
});
// Graph Daily Entry
Route::get('get_today_STdata','SensorTissueController@getTodayEntries');
Route::get('get_today_Tdata','SensorTissueController@getAllTodayEntriesDates');
// Route::get('get_today_data','SensorTissueController@getAllTodayValues');
Route::get('rtmTissueToday', function(){
    return view('sensorTissue/rtmTissueToday');
});

//MONITOR SOAP DISPENSER
Route::resource('monitorSoap','SensorSoapController');
// Graph Daily Entry
Route::get('get_today_Sdata','SensorSoapController@getTodayEntries');
Route::get('rtmSoap', function(){
    return view('sensorSoap/rtmSoap');
});

//RECORD DISPENSER STATE
Route::get('/sensorTissue/datarecord','RecordStateController@index');
Route::get('/sensorSoap/datarecord','RecordStateController@index2');

//RECORD SERVICE ACTIVITY
Route::get('/recordservice','RecordServiceController@index');
Route::get('/recordstate','RecordStateController@index');

//MANAGE STAFF
Route::get('staffs','StaffController@index');
Route::get('staffs/create','StaffController@create');
Route::resource('staffs','StaffController');

//POSTS
Route::resource('posts','PostsController');
Route::resource('userposts','UserPostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/posts/indexuser', 'PostsController@indexUser');
// Route::get('/logout', function(){
//     Auth::logout();
//     return Redirect::to('home');
// });
