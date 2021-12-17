<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaEmpatRequest extends FormRequest
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
            'parkir_kendaraan_unit' => 'nullable',
            'parkir_kendaraan_pl' => 'nullable',
            'parkir_kendaraan_kondisi' => 'nullable',
            'parkir_kendaraan_keterangan' => 'nullable',
            'drainase_unit' => 'nullable',
            'drainase_kondisi' => 'nullable',
            'drainase_keterangan' => 'nullable',
            'sampah_unit' => 'nullable',
            'sampah_pl' => 'nullable',
            'sampah_kondisi' => 'nullable',
            'sampah_keterangan' => 'nullable',
        ];
    }
}
