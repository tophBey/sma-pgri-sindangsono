<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustodianRequest extends FormRequest
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
            'custodian_job' => 'required|string',
            'custodian_income' => 'required',
            'phone' => 'required',
            'address' => 'required|string'
        ];
    }


    public function messages(): array
{
    return [
        'name.required' => 'Nama wajib diisi.',
        'name.string' => 'Nama harus berupa teks.',
        
        'custodian_job.required' => 'Pekerjaan wali wajib diisi.',
        'custodian_job.string' => 'Pekerjaan wali harus berupa teks.',

        'custodian_income.required' => 'Penghasilan wali wajib diisi.',

        'phone.required' => 'Nomor telepon wajib diisi.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
    ];
}
}
