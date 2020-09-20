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

Route::domain('{account}.' . env('APP_DOMAIN'))->middleware([
    'subdomain.route.handler',
])->name('blog.')->group(function () {
    Route::get('/', [App\Http\Controllers\Blog\HomeController::class, 'index'])->name('front.home');
    Route::get('/blog/view/{slug}', [App\Http\Controllers\Blog\HomeController::class, 'read'])->name('front.view');
});

