<?php

use Illuminate\Http\Request;
use App\Area;
use App\Member;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','APIAuthController@login');
Route::post('register','APIAuthController@register');

Route::group(['middleware' => 'auth:member-api'], function(){
  Route::post('/member', 'APIAuthController@details');
});
Route::get('test', 'APIAuthController@test');
/*
Route::get('api/areas/testget', 'AreaController@storeChildArea'); //not work
Route::apiResource('areas','AreaController');
*/


/*
Route::get('/areas', 'AreaController@index');
Route::get('/areas/{id}', 'AreaController@show');

Route::post('/areas', 'AreaController@store');
Route::post('/areas/{id}', 'AreaController@storeChildArea');

Route::put('/areas/{id}', 'AreaController@update');
Route::delete('/areas/{id}', 'AreaController@destroy');


Route::get('/activities', 'ActivityController@index');
Route::get('/activities/{id}', 'ActivityController@show');

Route::post('/activities', 'ActivityController@store');
Route::put('/activities/{id}', 'ActivityController@update');
Route::delete('/activities/{id}', 'ActivityController@destroy');


Route::get('/members', 'MemberController@index');
Route::post('/members', 'MemberController@store');
Route::apiResource('/members','MemberController');
*/
