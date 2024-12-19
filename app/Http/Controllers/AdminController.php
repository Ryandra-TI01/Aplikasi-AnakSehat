<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

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
        $indexPengguna = User::all();

        return view("admin.indexPengguna", [
            "indexPengguna" => $indexPengguna
        ]);
    }
    public function showPengguna(Request $request){

    }
    public function editPengguna(Request $request){

    }
    public function destroyPengguna(Request $request){

    }



    public function indexDoctor(){
        // Menggambil semua data Dokter
        $indexDokter = Doctor::all();

        return view("admin.indexDoctor", [
            "indexDokter" => $indexDokter
        ]);
    }
    public function showDoctor(Request $request){
        return view("admin.showDoctor");

    }
    public function destroyDoctor(Request $request){

    }

    public function adminProfile(){
        return view("admin.adminProfile");
    }

}
