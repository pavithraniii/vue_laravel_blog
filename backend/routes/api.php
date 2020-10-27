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
//insert
Route::post('/addblog',[
    'uses'=>'App\Http\Controllers\BlogController@postblog'
]);
//getitems
Route::get('/getblogs',[
    'uses'=>'App\Http\Controllers\BlogController@getblogs'
]);
//get data when id give
Route::get('/getblog/{id}',[
    'uses'=>'App\Http\Controllers\BlogController@getblog'
]);

//update
Route::put('/editblog/{id}',[
    'uses'=>'App\Http\Controllers\BlogController@editblog'
]);
//delete
Route::delete('/deleteblog/{id}',[
    'uses'=>'App\Http\Controllers\BlogController@deleteblog'
]);