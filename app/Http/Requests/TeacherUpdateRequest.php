<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherUpdateRequest extends FormRequest
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
            'degrees_id' => 'required|exists:degrees,id',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'degrees_id.required' => 'Gelar wajib dipilih.',
            'degrees_id.exists' => 'Gelar yang dipilih tidak valid.',
            'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format foto harus berupa PNG, JPG, atau JPEG.',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.', 

        ];
    }
}
