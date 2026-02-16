<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});



Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription');


//Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription');

Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Protected admin routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/adherents', [AdminController::class, 'index'])->name('adherents.index');
        Route::get('/adherents/{adherent}', [AdminController::class, 'show'])->name('adherents.show');
        Route::get('/adherents/{adherent}/edit', [AdminController::class, 'edit'])->name('adherents.edit');
        Route::put('/adherents/{adherent}', [AdminController::class, 'update'])->name('adherents.update');
        Route::delete('/adherents/{adherent}', [AdminController::class, 'destroy'])->name('adherents.destroy');
    });
});
