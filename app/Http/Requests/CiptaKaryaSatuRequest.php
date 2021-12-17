<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaSatuRequest extends FormRequest
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
            'nama_bangunan' => 'required',
            'jenis_bangunan' => 'required',
            'alamat' => 'nullable',
            'no_telepon' => 'nullable',
            'tahun_bangun' => 'nullable',
            'lat_long' => 'nullable',
            'koordinat_dms' => 'nullable',
            'koordinat_utm' => 'nullable',
            'foto_bangunan' => [
                'nullable',
                'file'
            ]
        ];
    }
}
