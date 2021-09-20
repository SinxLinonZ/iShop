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

Route::get('/', function () { return redirect('/login'); });

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'loginRedierct'])->name('loginRedierct');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('adminHome');
Route::get('/client', [App\Http\Controllers\HomeController::class, 'clientHome'])->name('clientHome');
