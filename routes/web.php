<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuseumController;

Route::get('/museums', [MuseumController::class, 'index'])->name('museums.index');
Route::get('/museums/create', [MuseumController::class, 'create'])->name('museums.create');
Route::post('/museums', [MuseumController::class, 'store'])->name('museums.store');

Route::get('/museums/{id}/edit', [MuseumController::class, 'edit'])->name('museums.edit');
Route::put('/museums/{id}', [MuseumController::class, 'update'])->name('museums.update');

Route::delete('/museums/{id}', [MuseumController::class, 'destroy'])->name('museums.destroy');

Route::get('/', function () {
    return view('welcome');
});
