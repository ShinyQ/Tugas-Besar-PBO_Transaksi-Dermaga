<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ItemController;
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
    Route::get('/statistic', [\App\Http\Controllers\StatisticController::class, 'statistic']);

    Route::group(['middleware' => 'admin'], function (){
        Route::resource('/register', RegisterController::class);
        Route::resource('/ship', ShipController::class);
        Route::resource('/container', ContainerController::class);
        Route::resource('/item', ItemController::class);
        Route::resource('/transaction', TransactionController::class);

        Route::get('/user/transaction/{id}', [TransactionController::class, 'getUserTransaction']);
        Route::get('/user/transaction/{id}/item', [TransactionController::class, 'getUserTransactionItem']);
    });
});
