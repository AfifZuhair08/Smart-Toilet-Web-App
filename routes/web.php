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

Auth::routes();

// MANAGER ROUTES
Route::middleware(['auth', 'manager'])->group(function () {
    
    //dashboard and home
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/','DashboardController@index');
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    //posts
    Route::resource('userposts','UserPostsController');
    
    //users
    Route::get('usersam/{id}/editToDelete','UsersController@editToDelete');
    
    //USER ADMIN/MANAGER
    Route::resource('users','UsersController');
    
    //tasks view
    Route::get('/tasks/completed','TaskController@taskCompleted');
    Route::get('/tasks/incomplete','TaskController@taskInCompleted');
    Route::get('/tasks/status','TaskController@status');
    
    //tasks
    Route::resource('tasks','TaskController');
    
    //posts
    Route::resource('posts','PostsController');
    
    //staffs
    Route::get('staffs','StaffController@index');
    Route::resource('staffs','StaffController');
    
    //manage staffs
    Route::get('staffs/create','StaffController@create');
    Route::get('staffs/{id}/editToDelete','StaffController@editToDelete');
    //dispenser records
    Route::get('/sensorTissue/datarecord','RecordStateController@index');
    Route::get('/sensorSoap/datarecord','RecordStateController@index2');
    Route::get('/stafflist','UsersController@index2');

    //RECORD SERVICE ACTIVITY
    Route::get('/records/servicerecords','RecordServiceController@index');
    Route::get('/records/servicerecords2','RecordServiceController@index2');
    Route::get('/records/servicerecords3','RecordServiceController@index3');
    Route::get('/recordstate','RecordStateController@index');

    //Dispensers
    Route::resource('dispenser','ToiletDispenserController');

    Route::get('/toiletDispenser/locations','ToiletDispenserController@showLocations');

    //MONITOR TISSUE DISPENSER
    // Graph Monthly Entry
    Route::get('get_Tchart_monthly_data','SensorTissueController@getMonthlyEntry');
    Route::get('rtmTissue', function(){
        return view('sensorTissue/rtmTissue');
    });
    // Graph Daily 15 last Entry
    Route::get('rtmTissueToday', function(){
        return view('sensorTissue/rtmTissueToday');
    });
    Route::get('toiletDispenser/monitorTD','SensorTissueController@getAllTissueDispenser');
    Route::get('get_Tdata','SensorTissueController@getAllDaily15Entries');
    // Graph Today Only Entry
    Route::get('get_today_STdata','SensorTissueController@getTodayEntries');

    Route::get('/todayTD', 'SensorTissueController@graphToday')->name('todayTD');

    //MONITOR SOAP DISPENSER
    // Graph Monthly
    Route::get('rtmSoap', function(){
        return view('sensorSoap/rtmSoap');
    });
    Route::get('get_Schart_monthly_data','SensorSoapController@getMonthlyEntry');
    // Graph Daily 15 last Entry
    Route::get('rtmSoapToday', function(){
        return view('sensorSoap/rtmSoapToday');
    });
    Route::get('toiletDispenser/monitorSD','SensorSoapController@getAllSoapDispenser');
    Route::get('get_Sdata','SensorSoapController@getAllDaily15Entries');
    // Graph Today Only Entry
    Route::get('get_today_SSdata','SensorSoapController@getTodayEntries');
});

// STAFF ROUTES
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff','DashboardController@index2')->name('staff');
});

// GENERAL ROUTES
Route::middleware(['auth'])->group(function () {
    
});
