<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestasionStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo_prestasion' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages(): array
{
    return [
        'photo_prestasion.required' => 'Foto prestasi wajib diunggah.',
        'photo_prestasion.image' => 'Foto prestasi harus berupa file gambar.',
        'photo_prestasion.mimes' => 'Foto prestasi hanya diperbolehkan dalam format PNG, JPG, atau JPEG.',
        'photo_prestasion.max' => 'Ukuran gambar maksimal adalah 2MB.', 

        
        'title.required' => 'Judul prestasi wajib diisi.',
        'title.string' => 'Judul prestasi harus berupa teks.',
        
        'description.required' => 'Deskripsi prestasi wajib diisi.',
        
        'category_id.required' => 'Kategori prestasi wajib dipilih.',
        'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        
        'date.required' => 'Tanggal prestasi wajib diisi.',
        'date.date_format' => 'Format tanggal tidak valid. Gunakan format Y-m-d (contoh: 2025-05-16).',
    ];
}
}
