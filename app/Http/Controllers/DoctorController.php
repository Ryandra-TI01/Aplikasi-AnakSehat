<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view("doctor.dashboard");
    }
    public function indexArticle()
    {
        return view("doctor.indexArticle");
    }
    public function showArticle(string $id)
    {
        return view("doctor.showArticle");
    }
    public function indexConsultation(){
        return view("doctor.indexConsultation");
    }
    public function showConsultation(string $id){
        return view("doctor.showConsultation");
    }
    public function profileDoctor(){
        return view("doctor.profileDoctor");
    }
}