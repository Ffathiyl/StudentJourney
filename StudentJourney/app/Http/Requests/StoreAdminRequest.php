<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Nama'=>['required'],
            'Nohp'=>['required','unique:admins'],
            'Kelamin'=>['required'],
            'Username'=>['required','unique:admins'],
            'Password'=>['required'],
            'Role'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'Nama.required' => 'Kolom Nama wajib diisi.',
            'Nohp.required' => 'Kolom Nomor Handphone wajib diisi.',
            'Nohp.max' => 'Nomor handphone Maksimal terdiri dari 13 digit.',
            'Nohp.unique' => 'Nomor Handphone sudah digunakan.',
            'Kelamin.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'Username.required' => 'Kolom Username wajib diisi.',
            'Username.unique' => 'Username sudah digunakan.',
            'Password.required' => 'Kolom Password wajib diisi.',
            'Role.required' => 'Kolom Role wajib diisi.',
        ];
    }
}
