<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentStoreRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // 'pending','submited','complete'
    public function rules(): array
    {
        return [
            'fullname' => 'required|string',
            'nik' => 'required|string',
            'gender' => 'required|in:Laki-laki,Wanita',
            'nisn' => 'required|string',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date',
            'religion' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',

            'father_name' => 'required|string',
            'father_job' => 'required|string',
            'mother_name' => 'required|string',
            'mother_job' => 'required|string',
            'parent_income' => 'required',
            'parent_phone' => 'required',
            'parent_address' => 'required|string',

            'custodian_name' => 'required|string',
            'custodian_job' => 'required|string',
            'custodian_income' => 'required',
            'custodian_phone' => 'required',
            'custodian_address' => 'required',

            'email' => 'required|email',
            'password' => 'required|min:8|confirmed|',
        ];
    }

    public function messages()
    {
        return [
            // Validation messages for personal information
            'fullname.required' => 'Nama lengkap wajib diisi.',
            'fullname.string' => 'Nama lengkap harus berupa teks.',
            'nik.required' => 'NIK wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Jenis kelamin harus berupa Laki-laki atau Wanita.',
            'nisn.required' => 'NISN wajib diisi.',
            'place_of_birth.required' => 'Tempat lahir wajib diisi.',
            'place_of_birth.string' => 'Tempat lahir harus berupa teks.',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',
            'religion.required' => 'Agama wajib diisi.',
            'religion.string' => 'Agama harus berupa teks.',

            // Validation messages for parents' information
            'father_name.required' => 'Nama ayah wajib diisi.',
            'father_name.string' => 'Nama ayah harus berupa teks.',
            'father_job.required' => 'Pekerjaan ayah wajib diisi.',
            'father_job.string' => 'Pekerjaan ayah harus berupa teks.',
            'mother_name.required' => 'Nama ibu wajib diisi.',
            'mother_name.string' => 'Nama ibu harus berupa teks.',
            'mother_job.required' => 'Pekerjaan ibu wajib diisi.',
            'mother_job.string' => 'Pekerjaan ibu harus berupa teks.',
            'parent_income.required' => 'Penghasilan orang tua wajib diisi.',
            'parent_phone.required' => 'Nomor telepon orang tua wajib diisi.',
            'parent_address.required' => 'Alamat orang tua wajib diisi.',
            'parent_address.string' => 'Alamat orang tua harus berupa teks.',

            // Validation messages for custodian's information
            'custodian_name.required' => 'Nama wali wajib diisi.',
            'custodian_name.string' => 'Nama wali harus berupa teks.',
            'custodian_job.required' => 'Pekerjaan wali wajib diisi.',
            'custodian_job.string' => 'Pekerjaan wali harus berupa teks.',
            'custodian_income.required' => 'Penghasilan wali wajib diisi.',
            'custodian_phone.required' => 'Nomor telepon wali wajib diisi.',
            'custodian_address.required' => 'Alamat wali wajib diisi.',

            // Validation messages for account information
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa format email yang valid.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ];
    }

}
