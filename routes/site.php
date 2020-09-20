<?php
use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index'])->name('site.front.home');
Route::post('/do/register', [App\Http\Controllers\Website\HomeController::class, 'doRegister'])->name('site.do.front.register');


Route::prefix('/site-rest/dns')->group(function () {
    Route::get('/get', [App\Http\Controllers\Website\DomainController::class, 'checkDnsZoneAvailability'])->name('site.rest.domain.fetch');
    Route::get('/register', [App\Http\Controllers\Website\DomainController::class, 'registerDnsZone'])->name('site.rest.domain.register');
});
