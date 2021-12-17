<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaLimaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'jenis_rangka_atap' => 'nullable',
            'pl_rangka_atap' => 'nullable',
            'kondisi_rangka_atap' => 'nullable',
            'keterangan_rangka_atap' => 'nullable',
            'jenis_kemiringan_a' => 'nullable',
            'kondisi_kemiringan_a' => 'nullable',
            'keterangan_kemiringan_a' => 'nullable',
        ];
    }
}
