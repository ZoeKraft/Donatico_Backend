<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonaticoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/campaign/{img}/{name}/{description}/{location}/{category}/{type}/{amount}', [DonaticoController::class, 'show']);


Route::get('/categories/{name}', [DonaticoController::class, 'show']);


Route::get('/types/{name}', [DonaticoController::class, 'show']);

Route::get('/notifications/{name}/{description}', [DonaticoController::class, 'show']);

Route::get('/profile/{img}', [DonaticoController::class, 'show']);

Route::get('/details/{campaign}/{user}', [DonaticoController::class, 'show']);

