<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Comment\Doc;

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
Route::prefix('admin')->group(function() {
    route::get('dashboard-admin',[AdminController::class,'index'])->name("dashboard-admin"); // nama blm diganti
    route::get('pengguna',[AdminController::class,'indexPengguna'])->name('indexPengguna');
    route::get('pengguna/{id}',[AdminController::class,'showPengguna'])->name('showPengguna');
    route::get('pengguna/{id}/edit', [AdminController::class, 'editPengguna'])->name('editPengguna');
    route::put('pengguna/{id}', [AdminController::class, 'updatePengguna'])->name('updatePengguna');
    Route::delete('pengguna/{id}/delete', [AdminController::class, 'destroyPengguna'])->name('deletePengguna');
    route::get('doctor',[AdminController::class,'indexDoctor'])->name('indexDokter');
    route::get('doctor/{id}',[AdminController::class,'showDoctor'])->name('showDokter');
    route::get('doctor/{id}/edit', [AdminController::class, 'editDoctor'])->name('editDokter');
    route::put('doctor/{id}', [AdminController::class, 'updateDoctor'])->name('updateDokter');
    route::delete('doctor/{id}/delete', [AdminController::class, 'destroyDoctor'])->name('deleteDokter');
    route::get('profile',[AdminController::class, 'adminProfile'])->name('profile-admin'); // belum
    route::get('profile',[AdminController::class, 'editAdmin'])->name('editAdmin'); // belum
    route::get('profile',[AdminController::class, 'updateAdmin'])->name('updateAdmin'); // belum
});

require __DIR__.'/doctor-auth.php';

require __DIR__.'/auth.php';
