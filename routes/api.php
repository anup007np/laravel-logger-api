<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('register', 'AuthController@register');
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');

Route::apiResource('devices', 'DeviceController');

Route::get('logs', 'LogController@index');
Route::get('logs/{log}', 'LogController@show');
Route::delete('logs/{log}', 'LogController@destroy');

Route::apiResource('incidents', 'IncidentController');
Route::apiResource('changes', 'ChangeController');

