<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account/login',[LoginController::class,'index'])->name('account.login');
Route::get('/account/register', [LoginController::class, 'register' ]) ->name('account.register');
Route::post('/account/processRegister', [LoginController::class, 'processRegister'])->name('account.processRegister');
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
// Route::get('/account/dashboard',[LoginController::class,'dashboard'])->name('account.dashboard');
Route::get('/account/dashboard', action: [DashboardController:: class, 'index' ])->name('account.dashboard');
// The route just points to the controller. It doesn't know about the layout.
Route::get('/account/dashboard', action: [DashboardController:: class, 'index' ])->name('');
