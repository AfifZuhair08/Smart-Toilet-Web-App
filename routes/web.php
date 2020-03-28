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

Route::get('/monitorTissue','MonitorTissueController@index');
Route::get('/monitorSoap','MonitorSoapController@index');

Route::get('/recordservice','RecordServiceController@index');
Route::get('/recordstate','RecordStateController@index');

Route::resource('posts','PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/posts/indexuser', 'PostsController@indexUser');
// Route::get('/logout', function(){
//     Auth::logout();
//     return Redirect::to('home');
// });
