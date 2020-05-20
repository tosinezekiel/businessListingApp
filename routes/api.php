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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->group(function(){
    Route::post('/login', 'LoginController@login');
});
Route::namespace('Api')->middleware('auth:api')->group(function(){
    Route::get('/user', 'UserController@userdetails');
    
});
Route::namespace('Api\Business')->group(function(){
    Route::get('/businesses', 'BusinessController@index');
});

//business route
Route::namespace('Api\Business')->middleware('auth:api')->group(function(){
    Route::post('/businesses', 'BusinessController@create');
    Route::get('/businesses/{business}', 'BusinessController@show');
    Route::post('/businesses/{business}', 'BusinessController@update');
    Route::delete('/businesses/{business}', 'BusinessController@delete');
    Route::get('/businesses/{business}/disable', 'BusinessController@disable');
});

//category routes
Route::namespace('Api\Category')->middleware('auth:api')->group(function(){
    Route::post('/categories', 'CategoryController@create');
});
