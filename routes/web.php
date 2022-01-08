<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/login/{errcode?}', [Controllers\UserController::class, 'login'])->name('site.login');
Route::post('/login', [Controllers\UserController::class, 'autenticate'])->name('site.autenticate');
Route::get('/logout', [Controllers\UserController::class, 'logout'])->name('site.logout');

Route::resource('contact', Controllers\ContactController::class);