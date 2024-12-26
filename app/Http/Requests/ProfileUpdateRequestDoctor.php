<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequestDoctor extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone_number'=>'required|string|max:20',
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(Doctor::class)->ignore($this->user()->id),
            ],
            'certificate' => [
                'nullable', // Tidak wajib diisi
                'file', // Harus berupa file
                'mimes:jpg,jpeg,png,pdf', // Format yang diizinkan
                'max:2048', // Ukuran maksimal (dalam KB)
            ],
        ];
    }
}
