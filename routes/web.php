<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureChildOwnership;
use Illuminate\Support\Facades\Route;
use PhpParser\Comment\Doc;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:web')->group(function () {
    // role untuk user
    route::get('home',[UserController ::class,'home'])->name('dashboard');
    route::get('profile-anak',[UserController ::class,'profileAnak'])->name('profileAnak');
    Route::post('store-child', [UserController::class, 'storeChild'])->name('store-child');
    route::get('doctor-anak',[UserController ::class,'doctor']);
    route::get('doctor-detail/{id}',[UserController ::class,'detailDoctor']);
    route::get('article',[UserController ::class,'article'])->name("artikel");
    route::get('article/{id}',[UserController ::class,'detailArticle']);
    route::get('consultation',[UserController ::class,'seeResponse']);
    route::post('consultation/send',[UserController ::class,'sendConsultation']);
    route::get('child/{id}',[UserController ::class,'detailChild'])->middleware(middleware: [EnsureChildOwnership::class]);
    route::post('child/{id}',[UserController ::class,'simpanPerkembangan'])->name('simpanPerkembangan')->middleware([EnsureChildOwnership::class]);
});

Route::middleware('auth:doctor')->group(function () {
    // route untuk doctor
    route::get('dashboard-doctor',[DoctorController ::class,'index'])->name('dashboard.doctor');
    route::get('doctor/article',[DoctorController ::class,'indexArticle'])->name('indexArtikel');
    route::get('doctor/article/{id}',[DoctorController ::class,'showArticle'])->name('showArtikel');
    route::get('doctor/create/article',[DoctorController ::class,'createArticle'])->name('createArtikel');
    route::post('doctor/create/article',[DoctorController ::class,'storeArticle'])->name('storeArtikel');
    route::get('doctor/article/{id}/edit', [DoctorController::class, 'editArticle'])->name('editArtikel');
    route::put('doctor/article/{id}', [DoctorController::class, 'updateArticle'])->name('updateArtikel');
    route::delete('doctor/article/{id}/delete', [DoctorController::class, 'destroyArticle'])->name('deleteArtikel');
    route::get('doctor/consultation',[DoctorController ::class,'indexConsultation'])->name("indexKonsul");
    route::get('doctor/consultation/{id}',[DoctorController ::class,'showConsultation'])->name("showKonsul");
    route::post('doctor/response/{consultation_id}',[DoctorController ::class,'sendResponse'])->name('sendResponse');
    route::put('doctor/response/{consultation_id}/update',[DoctorController ::class,'updateResponse'])->name('updateResponse');
    route::delete('doctor/response/{id}/delete',[DoctorController ::class,'destroyResponse'])->name('deleteRespon');// route untuk doctor
});

// route untuk admin
Route::middleware('auth:admin')->prefix('admin')->group(function() {
    route::get('dashboard-admin',[AdminController::class,'index'])->name("dashboard.admin");
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
    route::get('article/{id}',[UserController ::class,'detailArticle'])->name('detailArtikel');
});

require __DIR__.'/admin-auth.php';
require __DIR__.'/doctor-auth.php';
require __DIR__.'/auth.php';
