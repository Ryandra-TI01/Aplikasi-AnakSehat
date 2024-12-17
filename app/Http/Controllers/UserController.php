<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view("user.home");
    }
    public function profileAnak(){
        return view("user.profileAnak");
    }
    public function doctor(){
        return view("user.doctor");
    }
    public function article(){
        return view("user.article");
    }
    public function profilePengguna(){
        return view("user.profilePengguna");
    }
    public function detailArticle($id){
        return view("user.detailArticle");
    }
}
