<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/About', function () {
    return view('About');
})->name('About');

Route::get('/Services', function () {
    return view('Services');
})->name('Services');

Route::get('/Portfolio', function () {
    return view('Portfolio');
})->name('Portfolio');

Route::get('/Team', function () {
    return view('Team');
})->name('Team');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
