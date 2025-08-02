<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', action: [WelcomeController:: class, 'index' ])->name('account.welcome  ');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/register', [LoginController::class, 'register' ]) ->name('account.register');
Route::post('/account/processRegister', [LoginController::class, 'processRegister'])->name('account.processRegister');
// Route::get('/account/welcome',[LoginController::class,'welcome'])->name('account.welcome');
// Route::get('/account/welcome', action: [WelcomeController:: class, 'index' ])->name('account.welcome  ');
// The route just points to the controller. It doesn't know about the layout.

// Route::get('/account/dashboard', action: [WelcomeController:: class, 'index' ])->name('account.welcome  ');
Route::get('account/Adopt', function () {
    return view('Adopt');
})->name('Adopt');

Route::get('account/Hospital', function () {
    return view('Hospital');
})->name('Hospital');

Route::get('account/Shelter', function () {
    return view('Shelter');
})->name('Shelter');

Route::get('account/Community', function () {
    return view('Community');
})->name('Community');

// Route::get('account/Community', function () {
//     return view('Community');
// });


Route::get('account/Contact', function () {
    return view('Contact');
})->name('Contact');

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::get('/Signup', function () {
    return view('Signup');
})->name('Signup');

Route::get('/GenAccount', function () {
    return view('GenAccount');
})->middleware(['auth'])->name('GenAccount');

Route::get('/account/dashboard', function () {
    return view('Genaccount');
})->name('GenAccount')->middleware(['auth']);

// web.php
// Route::post('/pets/store', [PetController::class, 'store'])->name('pets.store');

// PetController.php
// public function store(Request $request) {
//     $validated = $request->validate([
//         'type' => 'required',
//         'breed' => 'required',
//         'age' => 'nullable|numeric',
//         'gender' => 'nullable',
//         'weight' => 'nullable|numeric',
//         'vaccinated' => 'nullable',
//         'notes' => 'nullable',
//         'image' => 'nullable|image|max:2048'
//     ]);

    // Save logic here

