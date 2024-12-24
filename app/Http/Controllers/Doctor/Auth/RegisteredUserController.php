<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.doctor-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number'=>'required|string|max:20',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Doctor::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $doctor = Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number'=>$request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($doctor));

        Auth::guard('doctor')->login($doctor);

        return redirect(route('dashboard.doctor', absolute: false));
    }
}
