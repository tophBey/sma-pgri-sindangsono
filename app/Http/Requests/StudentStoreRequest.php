<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'student_photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',

            'family_card' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'pip_card' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'birth_certificate' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'school_certificate' => 'required|image|mimes:png,jpg,jpeg|max:2048',

            'shcool_name' => 'required|string',
            'graduation_year' => 'required|digits:4|integer',
            'address' => 'required|string',

        ];
    }

    public function messages()
{
    return [
        // Validation messages for uploaded images
        'student_photo.required' => 'Foto siswa wajib diunggah.',
        'student_photo.image' => 'Foto siswa harus berupa file gambar.',
        'student_photo.mimes' => 'Foto siswa harus memiliki format png, jpg, atau jpeg.',
        'student_photo.max' => 'Ukuran gambar maksimal adalah 2MB.', 


        'family_card.required' => 'Kartu keluarga wajib diunggah.',
        'family_card.image' => 'Kartu keluarga harus berupa file gambar.',
        'family_card.mimes' => 'Kartu keluarga harus memiliki format png, jpg, atau jpeg.',
        'family_card.max' => 'Ukuran gambar maksimal adalah 2MB.', 


        'pip_card.image' => 'Kartu PIP harus berupa file gambar.',
        'pip_card.mimes' => 'Kartu PIP harus memiliki format png, jpg, atau jpeg.',
        'pip_card.max' => 'Ukuran gambar maksimal adalah 2MB.', 


        'birth_certificate.required' => 'Akta kelahiran wajib diunggah.',
        'birth_certificate.image' => 'Akta kelahiran harus berupa file gambar.',
        'birth_certificate.mimes' => 'Akta kelahiran harus memiliki format png, jpg, atau jpeg.',
        'birth_certificate.max' => 'Ukuran gambar maksimal adalah 2MB.', 



        'school_certificate.required' => 'Surat keterangan Lulus atau izajah wajib diunggah.',
        'school_certificate.image' => 'Surat keterangan Lulus atau izajah harus berupa file gambar.',
        'school_certificate.mimes' => 'Surat keterangan Lulus atau izajah harus memiliki format png, jpg, atau jpeg.',
        'school_certificate.max' => 'Ukuran gambar maksimal adalah 2MB.', 


        // Validation messages for school information
        'shcool_name.required' => 'Nama sekolah wajib diisi.',
        'shcool_name.string' => 'Nama sekolah harus berupa teks.',
        'graduation_year.required' => 'Tahun kelulusan wajib diisi.',
        'graduation_year.digits' => 'Tahun kelulusan harus terdiri dari 4 angka.',
        'graduation_year.integer' => 'Tahun kelulusan harus berupa angka.',
        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
    ];
}
}
