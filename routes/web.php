<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/account/login',[LoginController::class,'index'])->name('account.login');
Route::get('/account/register', [LoginController::class, 'register' ]) ->name('account.register');
Route::post('/account/processRegister', [LoginController::class, 'processRegister'])->name('account.processRegister');
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
// Route::get('/account/dashboard',[LoginController::class,'dashboard'])->name('account.dashboard');
Route::get('/account/welcome', action: [DashboardController:: class, 'index' ])->name('account.welcomea  ');
// The route just points to the controller. It doesn't know about the layout.
// Route::get('/account/dashboard', action: [DashboardController:: class, 'index' ])->name('');
Route::get('account/Adopt', function () {
    return view('Adopt');
})->name('Adopt');

Route::get('account/Hospital', function () {
    return view('Hospital');
})->name('Hospital');

Route::get('account/Shelter', function () {
    return view('Shelter');
})->name('Shelter');

// Route::get('account/Community', function () {
//     return view('Community');
// })->name('Community');

Route::get('/account/Community', function () {
    return view('Community');
});


Route::get('account/Contact', function () {
    return view('Contact');
})->name('Contact');

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
