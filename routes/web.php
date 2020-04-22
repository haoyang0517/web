<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/areas', 'AreaController@index');
Route::get('/areas/{id}', 'AreaController@show')->name('area.show');

Route::post('/areas', 'AreaController@store');
Route::post('/areas/{id}/create', 'AreaController@storeChildArea');

Route::post('/areas/{id}', 'AreaController@storeMember');
Route::put('/areas/{id}', 'AreaController@update');
Route::delete('/areas/{id}', 'AreaController@destroy');
//Route::put('/areas/{id}/remove', 'AreaController@removeMember');

Route::get('/test', function () {
  return view('activities.create');
});
Route::delete('activities/destroy', 'ActivityController@massDestroy')->name('activities.massDestroy');
Route::resource('activities','ActivityController');
Route::get('calendar', 'CalendarController@index')->name('calendar');
