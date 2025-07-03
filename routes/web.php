<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DonaticoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return 'Login';
})->name('login');


//donatico
Route::get('/campaign/list', [DonaticoController::class, 'show'])->name('campaign.show');
Route::post('/campaign', [DonaticoController::class, 'store'])->name('campaign.store');
Route::get('/campaign/create', [DonaticoController::class, 'create'])->name('campaign.create');
Route::get('/{donation}/edit', [DonaticoController::class, 'edit'])->name('campaign.edit');
Route::put('/{donation}', [DonaticoController::class, 'update'])->name('campaign.update');
Route::delete('/campaign/delete/{donation}', [DonaticoController::class, 'destroy'])->name('campaign.destroy');


//register
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::get('/users', [RegisterController::class, 'index'])->name('users.index');
Route::resource('users', RegisterController::class);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');