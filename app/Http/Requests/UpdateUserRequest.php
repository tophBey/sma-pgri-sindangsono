<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $admin = $this->route('user'); // Ambil ID user dari route atau request

        return [
            'name' => 'required|string',
            'email' => 'email|required|unique:users,email,'. $this->user()->id,
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'password' => 'nullable|min:8'
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Nama wajib diisi.',
        'name.string' => 'Nama harus berupa teks.',

        'email.email' => 'Format email tidak valid.',
        'email.required' => 'Email wajib diisi.',
        'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.',

        'password.min' => 'Password Minimal 8 karakter',

        'avatar.image' => 'Avatar harus berupa gambar.',
        'avatar.mimes' => 'Avatar hanya boleh berformat png, jpg, atau jpeg.',
        'avatar.max' => 'Ukuran gambar maksimal adalah 2MB.', 


    ];
}
}
