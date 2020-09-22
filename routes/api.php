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

Route::prefix('/site-rest/dns')->group(function () {
    Route::get('/get', [App\Http\Controllers\Website\DomainController::class, 'checkDnsZoneAvailability'])->name('api.rest.domain.fetch');
    // Route::get('/register', [App\Http\Controllers\Website\DomainController::class, 'registerDnsZone'])->name('api.rest.domain.register');
});
