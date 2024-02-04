<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKegiatanRequest extends FormRequest
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
            'Kapasitas' => ['required'],
            'Tanggal_Mulai' => ['required', 'date'],
            'Tanggal_Selesai' => ['required', 'date', 'after_or_equal:Tanggal_Mulai'],
            'Status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'Kapasitas.numeric' => 'Kolom Kapasitas harus berupa angka.',
            'Tanggal_Selesai.after_or_equal' => 'Tanggal Selesai harus setelah atau sama dengan Tanggal Mulai.',
        ];
    }
}
