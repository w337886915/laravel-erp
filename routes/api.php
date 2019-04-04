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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('corss')->any('/login/login',function(Request $request){
    return response(111);
});
Route::group(['middleware'=>'corss'],function($app){
    Route::any('/login/login','Api\\Admin\\LoginController@Login');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:api'], function(){
    Route::get('/user', function( Request $request ){
        return $request->user();
    });
});
