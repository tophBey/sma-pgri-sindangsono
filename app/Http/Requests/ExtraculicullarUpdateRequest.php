<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtraculicullarUpdateRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
              'name' => 'required|string|unique:extracurricullars,name,' . $this->extracurricullar->id,
              'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.unique' => 'Nama sudah tersedia',
            'name.string' => 'Nama harus berupa teks.',
            'icon.image' => 'File ikon harus berupa gambar.',
            'icon.mimes' => 'Format ikon harus berupa PNG, JPG, atau JPEG.',
            'icon.max' => 'Ukuran gambar maksimal adalah 2MB.', 

        ];
    }
}
