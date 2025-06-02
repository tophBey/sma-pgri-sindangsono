<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shcool_name' => 'required|string',
            'graduation_year' => 'required|digits:4|integer',
            'address' => 'required|string'
            
        ];
    }

    public function messages(): array
{
    return [
        'shcool_name.required' => 'Nama sekolah wajib diisi.',
        'shcool_name.string' => 'Nama sekolah harus berupa teks.',

        'graduation_year.required' => 'Tahun kelulusan wajib diisi.',
        'graduation_year.digits' => 'Tahun kelulusan harus terdiri dari 4 digit.',
        'graduation_year.integer' => 'Tahun kelulusan harus berupa angka.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
    ];
}
}
