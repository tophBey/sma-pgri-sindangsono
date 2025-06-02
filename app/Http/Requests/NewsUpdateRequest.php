<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'Judul wajib diisi.',
        'title.string' => 'Judul harus berupa teks.',
        
        'thumbnail.image' => 'Thumbnail harus berupa file gambar.',
        'thumbnail.mimes' => 'Thumbnail hanya boleh berformat PNG, JPG, atau JPEG.',
        'thumbnail.max' => 'Ukuran thumbnail maksimal adalah 2MB.', 

        
        'description.required' => 'Deskripsi wajib diisi.',
        'description.string' => 'Deskripsi harus berupa teks.',
        
        'category_id.required' => 'Kategori wajib dipilih.',
        'category_id.exists' => 'Kategori yang dipilih tidak valid.',
    ];
}
}
