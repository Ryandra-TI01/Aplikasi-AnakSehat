<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/callback', 'handleGoogleCallback')->name('auth.callback');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified','CheckDoctorRole','role:doctor'])
    ->name('doctor.')
    ->prefix('doctor')
    ->group(function () {
    Route::get('/TEST', function () {
        return 'INI DOCTOR';
    })->name('dashboard');
});


Route::middleware(['web', 'auth', 'role:admin'])
    ->prefix('admin');
Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('/TEST', function () {
        return 'INI ADMIN';
    });
 });


require __DIR__.'/auth.php';