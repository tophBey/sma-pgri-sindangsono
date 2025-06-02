<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'title' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'photo_activity' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'Judul kegiatan wajib diisi.',
        'title.string' => 'Judul kegiatan harus berupa teks.',

        'location.required' => 'Lokasi kegiatan wajib diisi.',
        'location.string' => 'Lokasi kegiatan harus berupa teks.',

        'description.required' => 'Deskripsi kegiatan wajib diisi.',
        'description.string' => 'Deskripsi kegiatan harus berupa teks.',

        'photo_activity.image' => 'File yang diunggah harus berupa gambar.',
        'photo_activity.mimes' => 'Foto kegiatan harus berupa file dengan format png, jpg, atau jpeg.',
        'photo_activity.max' => 'Ukuran gambar maksimal adalah 2MB.', 

    ];
}
}
