<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:web')->group(function () {
    // role untuk user
    route::get('home',[UserController ::class,'home'])->name('dashboard');
    route::get('profile-anak',[UserController ::class,'profileAnak']);
    Route::post('store-child', [UserController::class, 'storeChild'])->name('store-child');
    route::get('doctor-anak',[UserController ::class,'doctor']);
    route::get('doctor-detail/{id}',[UserController ::class,'detailDoctor']);
    route::get('article',[UserController ::class,'article']);
    route::get('article/{id}',[UserController ::class,'detailArticle']);
    route::get('consultation',[UserController ::class,'seeResponse']);
    route::post('consultation/send',[UserController ::class,'sendConsultation']);
    route::get('child/{id}',[UserController ::class,'detailChild']);
    route::post('child/{id}',[UserController ::class,'simpanPerkembangan']);
});

Route::middleware('auth:doctor')->group(function () {
    // route untuk doctor
    route::get('dashboard-doctor',[DoctorController ::class,'index'])->name('dashboard.doctor');
    route::get('doctor/article',[DoctorController ::class,'indexArticle']);
    route::get('doctor/article/{id}',[DoctorController ::class,'showArticle']);
    route::get('doctor/consultation',[DoctorController ::class,'indexConsultation']);
    route::get('doctor/consultation/{id}',[DoctorController ::class,'showConsultation']);
    route::get('doctor/profile',[DoctorController ::class,'profileDoctor']);
    route::post('doctor/response/{id}',[DoctorController ::class,'sendResponse']);// route untuk doctor
});



// route untuk admin
route::get('dashboard-admin',[AdminController::class,'index'])->name("dashboard.admin");
route::get('admin/pengguna',[AdminController::class,'indexPengguna']);
route::get('admin/doctor',[AdminController::class,'indexDoctor']);
route::get('admin/pengguna/{id}',[AdminController::class,'showPengguna']);
route::get('admin/doctor/{id}',[AdminController::class,'showDoctor']);
route::get('admin/profile',[AdminController::class,'adminProfile']);


require __DIR__.'/doctor-auth.php';
require __DIR__.'/auth.php';
