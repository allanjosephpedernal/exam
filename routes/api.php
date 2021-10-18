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

// v1
Route::prefix('v1')->group(function (){
    // account
    Route::prefix('/account')->group(function (){
        Route::post('/invite', 'EmailVerificationController@invite')->name('v1.account.invite');
        Route::post('/create/{email}', 'EmailVerificationController@create')->name('v1.account.create');
    });
});