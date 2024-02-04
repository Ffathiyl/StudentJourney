<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftaranRequest extends FormRequest
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
            'Mahasiswa_Id'=>['required'],
            'Kegiatan_Id'=>['required'],
            'Admin_Id'=>['nullable'],
            'Catatan'=>['required'],
            'Status'=>['required'],
        ];
    }
}
