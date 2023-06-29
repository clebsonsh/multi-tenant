<?php

use Illuminate\Support\Facades\Route;
use Spatie\Multitenancy\Models\Tenant;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::domain('app.tenant.test')->group(function () {
    Route::get('/', function () {
        Tenant::all()->dd();
    });
});

Route::domain('{tenant}.tenant.test')->middleware('tenant')->group(function () {
    Route::get('/', function () {
        dd(app('currentTenant')->name);
    });
});
