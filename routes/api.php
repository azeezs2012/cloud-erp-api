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

Route::middleware('tenancy')->group(function () {
    Route::get('/pas/account_types','AccountController@getAccountTypes');
    Route::get('/pas', function(){
        return "Welcome to pas-cloud Tenant Api";
    });
});

Route::get('/', function(){
    return "Welcome to pas-cloud Central Api";
});

