<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route untuk admin
route::get('dashboard-admin',[AdminController::class,'index'])->name("dashboard.admin");
route::get('admin/pengguna',[AdminController::class,'indexPengguna']);
route::get('admin/doctor',[AdminController::class,'indexDoctor']);
route::get('admin/pengguna/{id}',[AdminController::class,'showPengguna']);
route::get('admin/doctor/{id}',[AdminController::class,'showDoctor']);
route::get('admin/profile',[AdminController::class,'adminProfile']);


// route untuk doctor
route::get('dashboard-doctor',[DoctorController ::class,'index']);
route::get('doctor/article',[DoctorController ::class,'indexArticle']);
route::get('doctor/article/{id}',[DoctorController ::class,'showArticle']);
route::get('doctor/consultation',[DoctorController ::class,'indexConsultation']);
route::get('doctor/consultation/{id}',[DoctorController ::class,'showConsultation']);
route::get('doctor/profile',[DoctorController ::class,'profileDoctor']);
route::post('doctor/response/{id}',[DoctorController ::class,'sendResponse']);


// role untuk user
route::get('home',[UserController ::class,'home']);
route::get('profile-anak',[UserController ::class,'profileAnak']);
route::get('doctor-anak',[UserController ::class,'doctor']);
route::get('doctor-detail/{id}',[UserController ::class,'detailDoctor']);
route::get('article',[UserController ::class,'article']);
route::get('profile-pengguna',[UserController ::class,'profilePengguna']);
route::get('article/{id}',[UserController ::class,'detailArticle']);
route::get('consultation',[UserController ::class,'seeResponse']);
route::post('consultation/send',[UserController ::class,'sendConsultation']);
route::get('child/{id}',[UserController ::class,'detailChild']);
route::post('child/{id}',[UserController ::class,'simpanPerkembangan']);

require __DIR__.'/auth.php';
