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

Route::get('/','DashboardController@index');

Route::get('/dashboard','DashboardController@index');

Route::resource('monitorTissue','SensorTissueController');
Route::resource('monitorSoap','SensorSoapController');

Route::get('/recordservice','RecordServiceController@index');
Route::get('/recordstate','RecordStateController@index');

Route::get('staffs','StaffController@index');
Route::get('staffs/create','StaffController@create');
Route::resource('staffs','StaffController');

Route::resource('posts','PostsController');

Route::resource('userposts','UserPostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/posts/indexuser', 'PostsController@indexUser');
// Route::get('/logout', function(){
//     Auth::logout();
//     return Redirect::to('home');
// });
