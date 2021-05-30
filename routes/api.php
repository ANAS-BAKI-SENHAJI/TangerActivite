<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::get('/activities', 'App\Http\Controllers\ActivityController@index');
Route::post('/upload-file', 'App\Http\Controllers\ActivityController@uploadFile');
Route::get('/activities/{activity}', 'App\Http\Controllers\ActivityController@show');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// }); //it was already here, and i added the routes down. i dont know if we will need this one





Route::group(['middleware' => 'auth:api'], function(){    //Adding the auth:api middleware ensures any calls to the routes in that group must be authenticated.
    Route::get('/users','App\Http\Controllers\UserController@index');
    Route::get('users/{user}','App\Http\Controllers\UserController@show');
    Route::patch('users/{user}','App\Http\Controllers\UserController@update');
    Route::get('users/{user}/reservations','App\Http\Controllers\UserController@showReservations');
    Route::resource('/activities', 'App\Http\Controllers\ActivityController')->except(['index','show']);
});
