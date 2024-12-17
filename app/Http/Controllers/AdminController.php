<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function indexPengguna(){
        return view("admin.indexPengguna");
    }
    public function showPengguna(Request $request){

    }
    public function editPengguna(Request $request){

    }
    public function destroyPengguna(Request $request){

    }



    public function indexDoctor(){
        return view("admin.indexDoctor");
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
