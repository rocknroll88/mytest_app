<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes([
    'verify' => true
]);


Route::group(['middleware' => ['role:user', 'auth']], function () {
    Route::get('/user', [App\Http\Controllers\HomeController::class, 'client'])->name('client.index');
    Route::post('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create.index');
});

Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/proposal/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show.index');
});
