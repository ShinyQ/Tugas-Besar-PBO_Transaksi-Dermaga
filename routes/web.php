<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

Route::group(['prefix' => 'user'], function (){
    Route::post('/login', [UserController::class, 'login'])->middleware('guest');
    Route::get('/login', [UserController::class, 'login_view'])->middleware('guest');
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::group(['prefix' => '/', 'middleware' => 'user'], function (){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/register', AdminController::class);
});