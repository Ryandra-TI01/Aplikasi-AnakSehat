<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileUpdateRequestDoctor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profileDoctor.edit-doctor', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequestDoctor $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('doctor.profile.edit')->with('status', 'profile-updated');
    // }
    public function update(ProfileUpdateRequestDoctor $request): RedirectResponse
{
    $user = $request->user();

    // Validasi input
    $data = $request->validated();

    // Handle file upload jika ada
    if ($request->hasFile('certificate')) {
        if ($user->certificate) {
            Storage::delete($user->certificate);
        }
        $data['certificate'] = $request->file('certificate')->store('certificates');
    }

    // Update email dan reset verifikasi jika email diubah
    if ($user->isDirty('email')) {
        $data['email_verified_at'] = null;
    }

    // Update data user
    $user->update($data);

    return Redirect::route('doctor.profile.edit')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
