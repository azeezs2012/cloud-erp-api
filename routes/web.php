<?php

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

Route::get('/', function () {
    $domains = ['saleem.pas-cloud.online'];
            $tenant = Tenant::create($domains, [
                'plan' => 'free',
            ]);
            \Artisan::call('tenants:migrate', [
                '--tenants' => [$tenant->id]
            ]);
    return view('welcome');
});
