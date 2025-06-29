<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'student_photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'fullname' => 'required|string',
            'nik' => 'required',
            'nisn' => 'required',
            'religion' => 'required|string',
            'gender' => 'required',
            'address' => 'required|string',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'student_photo.image' => 'Foto siswa harus berupa gambar.',
        'student_photo.mimes' => 'Foto siswa harus berformat png, jpg, atau jpeg.',
        
        'fullname.required' => 'Nama lengkap wajib diisi.',
        'fullname.string' => 'Nama lengkap harus berupa teks.',

        'nik.required' => 'NIK wajib diisi.',

        'nisn.required' => 'NISN wajib diisi.',

        'gender.required' => 'Jenis kelamin wajib dipilih.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',

        'place_of_birth.required' => 'Tempat lahir wajib diisi.',
        'place_of_birth.string' => 'Tempat lahir harus berupa teks.',

        'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
        'date_of_birth.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',

        'phone.required' => 'Nomor telepon wajib diisi.',

        'religion.required' => 'Agama wajib diisi.',
        'religion.string' => 'Agama harus berupa teks.'
    ];
}

}
