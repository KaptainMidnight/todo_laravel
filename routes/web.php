<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
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

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
    Route::post('/signup', [SignUpController::class, 'registration'])->name('registration');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/task/{task}', [HomeController::class, 'destroy'])->name('task.delete');
    Route::post('/task', [HomeController::class, 'create'])->name('task.create');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});
