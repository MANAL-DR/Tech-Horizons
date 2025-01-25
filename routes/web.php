<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NumeroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('access', function () {
    return view('access');
});

Route::get('/', [NumeroController::class, 'publicNum'])->name('home');
Route::get('/numero/{id}',[NumeroController::class,'publicShow'])->name('publicShow');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/article/{id}',[ArticleController::class,'articleShow'])->name('article.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
