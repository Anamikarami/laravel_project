<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController; 


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [MenuController::class, 'index'])->name('index');
    Route::get('/profile/user', [MenuController::class, 'profile'])->name('profile');

   // Route::get('/profile/get/user', [MenuController::class, 'get_user'])->name('getuser');
});

require __DIR__.'/auth.php';
