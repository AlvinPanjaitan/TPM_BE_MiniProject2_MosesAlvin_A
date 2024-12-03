<?php

use App\Http\Controllers\MuseumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');

    Route::get('/museums', [MuseumController::class, 'index'])->name('museums.index');
    Route::get('/museums/create', [MuseumController::class, 'create'])->name('museums.create');
    Route::post('/museums', [MuseumController::class, 'store'])->name('museums.store');
    Route::get('/museums/{museum}/edit', [MuseumController::class, 'edit'])->name('museums.edit');
    Route::put('/museums/{museum}', [MuseumController::class, 'update'])->name('museums.update');
    Route::delete('/museums/{museum}', [MuseumController::class, 'destroy'])->name('museums.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
