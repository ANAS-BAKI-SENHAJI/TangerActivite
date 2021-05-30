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

//This will route every web request to a single entry point, which will be the entry for our Vue application.
Route::get('/{any}', function(){
        return view('landing');
})->where('any', '.*');
