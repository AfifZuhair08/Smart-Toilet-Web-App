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
Route::get('get_chart_data','SensorTissueController@getMonthlyEntry');
Route::get('rtmTissue', function(){
    return view('sensorTissue/rtmTissue');
});
// Route::get('test','SensorTissueController@getMonthlyEntry');


//MONITOR SOAP DISPENSER
Route::resource('monitorSoap','SensorSoapController');

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
