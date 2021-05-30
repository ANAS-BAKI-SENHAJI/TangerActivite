<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/ //it was already here, and i added the routes down. i dont know if we will need this one


Route::get('/Activitys', 'ActivityController@index');
Route::post('/upload-file', 'ActivityController@uploadFile');
Route::get('/Activitys/{Activity}', 'ActivityController@show');

Route::group(['middleware' => 'auth:api'], function(){
    Route::patch('Activitys/{Activity}/units/add','ActivityController@updateUnits');
    Route::resource('/Activitys', 'ActivityController')->except(['index','show']);
});
