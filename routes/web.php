<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WordPressController;

Route::post('/update-wp-project/{id}', [WordPressController::class, 'updateProjectFromUpdatePayload']);


// Route GET untuk mengambil data project dari WordPress
Route::get('/get-wp-project/{id}', [WordPressController::class, 'getProject']);


// Halaman Utama (Menampilkan daftar kartu)
Route::get('/', [WordPressController::class, 'index'])->name('home');

// Halaman Detail Project
Route::get('/api/get-wp-project/{id}', [WordPressController::class, 'getProject'])->name('projects.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
