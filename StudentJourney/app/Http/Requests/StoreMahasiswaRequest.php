<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
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
            'NIM' => ['required', 'unique:mahasiswas'],
            'Nama' => ['required', 'unique:mahasiswas'],
            'RFID' => ['required', 'unique:mahasiswas'],
            'PIN' => ['required', 'max:6'],
            'Jenis_Kelamin' => ['required'],
            'Jam_Plus' => ['required'],
            'Jam_Minus' => ['required'],
            'Soft_Skill' => ['required'],
            'Status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'NIM.required' => 'Kolom NIM wajib diisi.',
            'NIM.unique' => 'NIM sudah digunakan, pilih NIM lain.',
            'Nama.required' => 'Kolom Nama wajib diisi.',
            'Nama.unique' => 'Nama sudah digunakan, pilih Nama lain.',
            'RFID.required' => 'Kolom RFID wajib diisi.',
            'RFID.unique' => 'RFID sudah digunakan, pilih RFID lain.',
            'PIN.required' => 'Kolom PIN wajib diisi.',
            'PIN.max' => 'Kolom PIN maksimal 6 karakter.',
            'Jenis_Kelamin.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'Jam_Plus.required' => 'Kolom Jam Plus wajib diisi.',
            'Jam_Minus.required' => 'Kolom Jam Minus wajib diisi.',
            'Soft_Skill.required' => 'Kolom Soft Skill wajib diisi.',
            'Status.required' => 'Kolom Status wajib diisi.',
        ];
    }
}
