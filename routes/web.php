<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\FormDataController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::resource('form', FormController::class);
Route::resource('formdata', FormDataController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
