<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'banner_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string',
            'subtitle' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'banner_image.required' => 'Gambar banner wajib diunggah.',
            'banner_image.image' => 'File yang diunggah harus berupa gambar.',
            'banner_image.mimes' => 'Format gambar yang diperbolehkan adalah PNG, JPG, atau JPEG.',
            'banner_image.max' => 'Ukuran gambar maksimal adalah 2MB.', 
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'subtitle.required' => 'Subjudul wajib diisi.',
            'subtitle.string' => 'Subjudul harus berupa teks.',
        ];
    }
}
