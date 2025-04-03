<?php

// use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});



Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription');


//Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription');

Route::post('/inscription', [App\Http\Controllers\InscriptionController::class, 'store'])->name('inscription.store');
