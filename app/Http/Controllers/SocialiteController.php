<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Summary of googleLogin
     */
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $googleUser = Socialite::driver('google')->user();
        // dd($googleUser);
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => encrypt('password'),
            'google_avatar' => $googleUser->avatar,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);

        if (!$user->hasAnyRole(['pengguna', 'doctor', 'admin'])) {
            $user->assignRole('pengguna');
        }
     
        Auth::login($user);
        if (Auth::user()->hasRole('admin')) {
            return redirect()->intended(route('filament.admin.pages.dashboard', absolute: false));
        }else if(Auth::user()->hasRole('doctor')) {
            return redirect()->intended(route('doctor.dashboard', absolute: false));
        }else {
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }
}
