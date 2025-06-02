<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParentRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'father_name' => 'required|string',
            'father_job' => 'required|string',
            'mother_name' => 'required|string',
            'mother_job' => 'required|string',
            'parent_income' => 'required',
            'phone' => 'required',
            'address' => 'required|string',

        ];
    }

    public function messages(): array
{
    return [
        'father_name.required' => 'Nama ayah wajib diisi.',
        'father_name.string' => 'Nama ayah harus berupa teks.',

        'father_job.required' => 'Pekerjaan ayah wajib diisi.',
        'father_job.string' => 'Pekerjaan ayah harus berupa teks.',

        'mother_name.required' => 'Nama ibu wajib diisi.',
        'mother_name.string' => 'Nama ibu harus berupa teks.',

        'mother_job.required' => 'Pekerjaan ibu wajib diisi.',
        'mother_job.string' => 'Pekerjaan ibu harus berupa teks.',

        'parent_income.required' => 'Penghasilan orang tua wajib diisi.',

        'phone.required' => 'Nomor telepon wajib diisi.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
    ];
}
}
