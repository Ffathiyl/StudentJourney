<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
            'NIM'=>['required'],
            'Nama'=>['required'],
            'RFID'=>['required'],
            'PIN'=>['required', 'max:6'],
            'Jenis_Kelamin'=>['required'],
            'Status'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'NIM.required' => 'Kolom NIM wajib diisi.',
            'Nama.required' => 'Kolom Nama wajib diisi.',
            'RFID.required' => 'Kolom RFID wajib diisi.',
            'PIN.required' => 'Kolom PIN wajib diisi.',
            'PIN.max' => 'Kolom PIN maksimal 6 karakter.',
            'Jenis_Kelamin.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'Status.required' => 'Kolom Status wajib diisi.',
        ];
    }
}
