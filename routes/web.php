<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Middleware\IsAuthenticatedMiddleware;

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

Route::get('/', [Controllers\ContactController::class, 'index'])->name('site.index');
Route::get('/login', [Controllers\UserController::class, 'login'])->name('site.login');
Route::post('/login', [Controllers\UserController::class, 'authenticate'])->name('site.authenticate');
Route::get('/logout', [Controllers\UserController::class, 'logout'])->name('site.logout');

Route::middleware(IsAuthenticatedMiddleware::class)
    ->resource('contact', Controllers\ContactController::class);