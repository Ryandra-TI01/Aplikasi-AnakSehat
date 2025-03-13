<?php

namespace App\Actions\Auth;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('filament.admin.pages.dashboard');
        } elseif ($user->hasRole('doctor')) {
            return redirect()->route('filament.doctor.pages.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
