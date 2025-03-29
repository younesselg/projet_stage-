<?php

use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});



Route::get('/inscription', function () {
    return view('inscription');
});


Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription');

Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');
