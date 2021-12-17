<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaEnamRequest extends FormRequest
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
            'kondisi_air' => 'nullable',
            'keterangan_air' => 'nullable',
            'kondisi_air_hujan' => 'nullable',
            'keterangan_air_hujan' => 'nullable',
            'kondisi_air_kotor' => 'nullable',
            'keterangan_air_kotor' => 'nullable',
            'kondisi_pembuangan' => 'nullable',
            'keterangan_pembuangan' => 'nullable',
            'pl_septictank' => 'nullable',
            'kondisi_septictank' => 'nullable',
            'keterangan_septictank' => 'nullable',
            'pln_listrik' => 'nullable',
            'generator_listrik' => 'nullable',
            'kondisi_listrik' => 'nullable',
            'keterangan_listrik' => 'nullable',
            'jenis_udara' => 'nullable',
            'kondisi_udara' => 'nullable',
            'keterangan_udara' => 'nullable',
        ];
    }
}
