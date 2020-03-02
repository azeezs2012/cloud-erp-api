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

Route::middleware('tenancy')->
    group(function () {
    Route::get('/pas/account_types','ListControllers\AccountController@getAccountTypes');

    Route::get('/pas/branch','ListControllers\BranchController@getBranches');

    Route::get('/pas/user','ListControllers\UserController@getUsers');
    Route::post('/pas/user','ListControllers\UserController@createUser');

    Route::get('/pas', function(){
        return "Welcome to pas-cloud Tenant Api";
    });
});




Route::post('/tenant', 'TenantController@createTenant');
Route::get('/tenant', 'TenantController@getTenants');
Route::get('/tenant_by_id/{id}', 'TenantController@getTenantById');
Route::get('/tenant_by_domain/{domain}', 'TenantController@getTenantByDomain');
Route::delete('/tenant/{id}', 'TenantController@deleteTenant');
Route::put('/tenant/{id}', 'TenantController@updateTenant');
Route::get('/tenant_migrate', 'TenantController@migrateAllTenants');
Route::get('/tenant_migrate/{id}', 'TenantController@migrateTenant');





