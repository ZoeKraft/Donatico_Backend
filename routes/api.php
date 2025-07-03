<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DonaticoController;
use App\Http\Controllers\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/donations/allDonations', [DonaticoController::class, 'all']);
Route::get('/v1/users/allUsers', [RegisterController::class, 'allUsers']);
Route::post('/login', [RegisterController::class, 'login']);