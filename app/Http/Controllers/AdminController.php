<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        // jumlah semua data
        $totalPengguna = User::count();
        $totalDokter = Doctor::count();
        $totalArtikel = Article::count();
        $totalKonsultasi = Consultation::count();

        return view("admin.dashboard", [
            "totalPengguna" => $totalPengguna,
            "totalDokter" => $totalDokter,
            "totalArtikel" => $totalArtikel,
            "totalKonsultasi" => $totalKonsultasi
        ]);
    }

    public function indexPengguna(){
        // Menggambil semua data User
        $pengguna = User::with("child")->get();

        return view("admin.indexPengguna", [
            "pengguna" => $pengguna
        ]);
    }

    public function showPengguna($id){
        // mengambil data user beserta anak dan childhealth
        $pengguna = User::with(["child.childHealthData"])->findOrFail($id);

        foreach ($pengguna->child as $anak) {
            // Hitung umur di controller
            $anak->umur = $anak->tanggal_lahir ? Carbon::parse($anak->tanggal_lahir)->age : null;

            // format tanggal lahir
            $anak->formatTL = $anak->tanggal_lahir ? Carbon::parse($anak->tanggal_lahir)
                ->format("d F Y") : "";

            // Status Gizi terakhir
            $anak->status_terakhir = $anak->childHealthData->isNotEmpty() ? $anak->childHealthData->last()
                ->status_gizi : null;
        }

        return view("admin.showPengguna", [
            "pengguna" => $pengguna 
        ]);
    }

    public function editPengguna($id){
        // mengambil data user beserta anak dan childhealth
        $pengguna = User::with(["child.childHealthData"])->findOrFail($id);

        foreach ($pengguna->child as $anak) {
            // Hitung umur di controller
            $anak->umur = $anak->tanggal_lahir ? Carbon::parse($anak->tanggal_lahir)->age : null;

            // format tanggal lahir
            $anak->formatTL = $anak->tanggal_lahir ? Carbon::parse($anak->tanggal_lahir)
                ->format("d F Y") : "";

            // Status Gizi terakhir
            $anak->status_terakhir = $anak->childHealthData->isNotEmpty() ? $anak->childHealthData->last()
                ->status_gizi : null;
        }

        return view("admin.showPengguna", [
            "pengguna" => $pengguna 
        ]);
    }

    public function updatePengguna(Request $request, $id) {
        // mengambil data user sesuai id
        $pengguna = User::find($id);

        // validasi data
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone_number" => "nullable|numeric",
        ]);

        // update data
        $pengguna->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
        ]);

        // kembali ke halamana data pengguna
        return redirect("admin/pengguna")->with("message", "User update successfully!");
    }

    public function destroyPengguna($id){
        // mencari data user sesuai id
        $pengguna = User::find($id);

        // menghapus data user
        $pengguna->delete();

        // kembali ke halaman data pengguna
        return redirect("admin/pengguna")->with("message", "User delete successfully!");
    }


    public function indexDoctor(){
        // Menggambil semua data Dokter
        $indexDokter = Doctor::all();

        // Menambahkan atribut warna dan ikon berdasarkan status
        foreach ($indexDokter as $dokter) {
            if ($dokter->status === 'Sudah Terverifikasi') {
                $dokter->bgColor = '#6200EE'; // Biru untuk verified
                $dokter->icon = 'check'; // Ikon centang
            } elseif ($dokter->status === 'rejected') {
                $dokter->bgColor = '#E53935'; // Merah untuk rejected
                $dokter->icon = 'close'; // Ikon X
            } else {
                $dokter->bgColor = '#BDBDBD'; // Abu-abu untuk status lainnya
                $dokter->icon = 'exclamation'; // Ikon tanda tanya
            }
        }

        return view("admin.indexDoctor", [
            "iDokter" => $indexDokter
        ]);
    }

    public function showDoctor($id){
        // Menggambil data dokter serta artikelnya
        $doctor = Doctor::with("article")->findOrFail($id);

        foreach ($doctor->article as $article) {
            $article->format_tanggal = $article->date ? Carbon::parse($article->date)
                ->format("d F Y") : "";
        }

        return view("admin.showDoctor", [
            "dokter" => $doctor
        ]);

    }

    public function editDoctor($id) {
        // Menggambil data dokter
        $doctor = Doctor::with("article")->findOrFail($id);

        foreach ($doctor->article as $article) {
            $article->format_tanggal = $article->date ? Carbon::parse($article->date)
                ->format("d F Y") : "";
        }

        return view("admin.showDoctor", [
            "dokter" => $doctor
        ]);
    }

    public function updateDoctor(Request $request, $id) {
        // mengambil data dokter sesuai id
        $doctor = Doctor::find($id);

        // validasi data
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone_number" => "nullable|numeric",
            "status" => "required"
        ]);

        // update data
        $doctor->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "status" => $request->status
        ]);
        
        return redirect("admin/doctor")->with('message', 'Doctor update successfully');
    }

    public function destroyDoctor($id){
        // mencari data dokter sesuai id
        $doctor = Doctor::find($id);

        // menghapus data user
        $doctor->delete();

        return redirect("admin/doctor")->with('message', 'Doctor delete successfully');
    }

    public function adminProfile(){
        // Menggambil data Admin
        $admin = Auth::guard('admin')->user();

        return view("admin.adminProfile", [
            "admin" => $admin
        ]);
    }

    public function editAdmin() {
        // Menggambil data Admin
        $admin = Auth::guard('admin')->user();

        return view("admin.adminProfile", [
            "admin" => $admin
        ]);
    }

    public function updateAdmin(Request $request, $id) {
        return redirect("admin/profile")->with('message', 'Admin update successfully');
    }

}
