<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus memiliki format yang valid.',
            
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            
            'avatar.image' => 'Avatar harus berupa file gambar.',
            'avatar.mimes' => 'Avatar hanya boleh berupa file dengan format png, jpg, atau jpeg.',
            'avatar.max' => 'Ukuran gambar maksimal adalah 2MB.', 

        ];
    }
}
