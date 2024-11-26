<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuseumController;

Route::get('/museums', [MuseumController::class, 'index'])->name('museums.index');

Route::get('/museums/create', [MuseumController::class, 'create'])->name('museums.create');

Route::post('/museums', [MuseumController::class, 'store'])->name('museums.store');

Route::get('/', function () {
    return view('welcome');
});
