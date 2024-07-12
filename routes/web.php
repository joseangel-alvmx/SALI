<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancosrawController;
Route::group(['middleware' => 'App\Http\Middleware\RedirectIfAuth'], function () {
    Auth::routes();
});

Route::group(['middleware' => ['auth','web']], function () {
    Route::get('/lineas', [App\Http\Controllers\LineaController::class, 'index']);
    Route::resource('/bancosraws', 'App\Http\Controllers\BancosrawController')->middleware(CheckUserRole::class.':admin');
    Route::resource('/estadoCuenta', 'App\Http\Controllers\BancosrawController')->middleware(CheckUserRole::class.':admin');
    Route::resource('/users', App\Http\Controllers\UserController::class)->middleware(CheckUserRole::class.':admin');
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    // Route::get('/', [App\Http\Controllers\LineaController::class, 'index']);
    Route::resource('/clientes', App\Http\Controllers\ClienteController::class);
    // Rutas de reportes
    Route::get('/report/lineas', [App\Http\Controllers\LineaReportController::class, 'index']);
    Route::get('/report/transaclog', [App\Http\Controllers\TransacLogReportController::class, 'index'])->middleware(CheckUserRole::class.':admin,super');
    Route::get('/report/registros', [App\Http\Controllers\RegistrosReportController::class, 'index'])->middleware(CheckUserRole::class.':admin,super');;
});
