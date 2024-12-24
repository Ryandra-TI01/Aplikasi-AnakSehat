<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Comment\Doc;

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

// route untuk doctor
Route::prefix('doctor')->group(function() {
    route::get('dashboard-doctor',[DoctorController ::class,'index'])->name('dashboard-dokter'); // nama blm diganti
    route::get('article',[DoctorController ::class,'indexArticle']); // belum
    route::get('article/create', [DoctorController::class, 'createArticle'])->name('createDoctor'); // belum
    route::post('article/create', [DoctorController::class, 'storeArticle'])->name('storeDoctor'); // belum
    route::get('article/{id}',[DoctorController ::class,'showArticle'])->name('showArtikel'); // belum
    route::get('article/{id}/edit',[DoctorController ::class,'editArticle'])->name('editArtikel'); // belum
    route::put('article/{id}',[DoctorController ::class,'updateArticle'])->name('updateArtikel'); // belum
    route::delete('article/{id}/delete',[DoctorController ::class,'destroyArticle'])->name('deleteArtikel'); // belum
    route::get('consultation',[DoctorController ::class,'indexConsultation']); // belum
    route::get('consultation/{id}',[DoctorController ::class,'showConsultation']); // belum
    route::post('response/{id}',[DoctorController ::class,'sendResponse']); // belum
    route::get('profile',[DoctorController ::class,'profileDoctor']); // belum
});

// role untuk user
route::get('home',[UserController ::class,'home']); // belum
route::get('profile-anak',[UserController ::class,'profileAnak']); // belum
route::get('profile-pengguna',[UserController ::class,'profilePengguna']); // belum
route::get('doctor-anak',[UserController ::class,'doctor']); // belum
route::get('doctor-detail/{id}',[UserController ::class,'detailDoctor']); // belum
route::get('article',[UserController ::class,'article']); // belum
route::get('article/{id}',[UserController ::class,'detailArticle'])
    ->name('detailArtikel'); // belum
route::get('consultation',[UserController ::class,'seeResponse']); // belum
route::post('consultation/send',[UserController ::class,'sendConsultation']); // belum
route::get('child/{id}',[UserController ::class,'detailChild']); // belum
route::post('child/{id}',[UserController ::class,'simpanPerkembangan']); // belum

require __DIR__.'/auth.php';
