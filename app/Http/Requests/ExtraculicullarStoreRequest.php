<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtraculicullarStoreRequest extends FormRequest
{
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:extracurricullars,name',
            'icon' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Nama ekstrakurikuler wajib diisi.',
        'name.string' => 'Nama ekstrakurikuler harus berupa teks.',
        'name.unique' => 'Nama ekstrakurikuler sudah digunakan, silakan pilih nama lain.',
        'icon.required' => 'Ikon wajib diunggah.',
        'icon.image' => 'File yang diunggah harus berupa gambar.',
        'icon.mimes' => 'Format ikon harus berupa PNG, JPG, atau JPEG.',
        'icon.max' => 'Ukuran gambar maksimal adalah 2MB.', 

    ];
}

}
