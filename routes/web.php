<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonaticoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/campaign/{img}/{name}/{description}/{location}/{category}/{type}/{amount}', [DonaticoController::class, 'show']);
