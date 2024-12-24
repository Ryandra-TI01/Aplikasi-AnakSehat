<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Auth;
use Hash;
use Illuminate\Http\Request;

class DoctorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.doctor-login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('doctor')->attempt($credentials)) {
            return redirect()->route('doctor.dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
    public function showRegisterForm()
    {
        return view('auth.doctor-register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:8|confirmed',
            'phone_number'=>'required|string|max:15'
        ]);

        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        return redirect()->route('doctor.login');
    }
}
