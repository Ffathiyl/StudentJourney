<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKegiatanRequest extends FormRequest
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
            'Deskripsi' => ['required'],
            'Kapasitas' => ['required', 'max:13'],
            'Tanggal_Mulai' => ['required', 'date'],
            'Tanggal_Selesai' => ['required', 'date', 'after:Tanggal_Mulai'],
            'Status' => ['required'],
        ];
    }
    

    public function messages()
    {
        return [
            'Deskripsi.required' => 'Kolom Deskripsi wajib diisi.',
            'Kapasitas.required' => 'Kolom Kapasitas wajib diisi.',
            'Tanggal_Mulai.required' => 'Tanggal Mulai Kegiatan wajib diisi.',
            'Tanggal_Selesai.required' => 'Tanggal Selesai Kegiatan wajib diisi.',
            'Tanggal_Selesai.after_or_equal' => 'Tanggal Selesai harus setelah atau sama dengan Tanggal Mulai.',
        ];
    }
}
