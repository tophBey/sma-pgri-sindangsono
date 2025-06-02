<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDegressRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:degrees,name,'. $this->degree->id,
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Nama gelar wajib diisi.',
        'name.string' => 'Nama gelar harus berupa teks.',
        'name.unique' => 'Nama gelar sudah digunakan, silakan pilih nama lain.'
    ];
}
}
