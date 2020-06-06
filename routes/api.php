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

//business route
Route::namespace('Api\Business')->middleware('auth:api')->group(function(){
    Route::post('/businesses', 'BusinessController@create');
    Route::post('/businesses/{business}', 'BusinessController@update');
    Route::delete('/businesses/{business}', 'BusinessController@delete');
    Route::get('/businesses/{business}/disable', 'BusinessController@disable');
    Route::get('/businesses/{business}/enable', 'BusinessController@enable');
    Route::get('/businesses/admin', 'BusinessController@getActiveBusinesses');
    Route::get('/businesses/{id}', 'BusinessController@showSingle');
});
Route::namespace('Api\Business')->group(function(){
    Route::get('/businesses/active', 'BusinessController@getActiveBusinesses');
    Route::get('/businesses/search/{search}', 'BusinessController@search');
    Route::post('/review', 'BusinessController@addReview');
    Route::get('/businesses/{id}', 'BusinessController@showSingle');
});
    
//category routes
Route::namespace('Api\Category')->middleware('auth:api')->group(function(){
    Route::post('/categories', 'CategoryController@create');
    Route::get('/categories', 'CategoryController@index');
    Route::delete('/categories/{category}', 'CategoryController@delete');
});
Route::namespace('Api\Category')->group(function(){
    Route::post('/categories', 'CategoryController@create');
    Route::get('/categories', 'CategoryController@index');
    Route::delete('/categories/{category}', 'CategoryController@delete');
});

Route::namespace('Api')->middleware('auth:api')->group(function(){
    Route::post('/logout', 'LoginController@logout');
});

