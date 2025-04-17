<?php

// use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AdherentController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('app');
});



Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription');


//Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription');

Route::post('/inscription', [App\Http\Controllers\InscriptionController::class, 'store'])->name('inscription.store');

// Route pour le formulaire de contact
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

// Routes pour l'authentification admin
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Routes protégées pour l'administration
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Routes pour la gestion des adhérents
    Route::get('/admin/adherents', [AdherentController::class, 'index'])->name('adherents.index');
    Route::get('/admin/adherents/{adherent}/edit', [AdherentController::class, 'edit'])->name('adherents.edit');
    Route::put('/admin/adherents/{adherent}', [AdherentController::class, 'update'])->name('adherents.update');
    Route::delete('/admin/adherents/{adherent}', [AdherentController::class, 'destroy'])->name('adherents.destroy');
});
