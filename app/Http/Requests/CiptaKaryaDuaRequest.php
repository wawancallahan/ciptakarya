<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaDuaRequest extends FormRequest
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
            'skb' => 'nullable',
            'dokumen_teknis' => 'nullable',
            'gambar_ded' => 'nullable',
            'imb' => 'nullable',
            'slf' => 'nullable',
            'spakb' => 'nullable',
            'pbb' => 'nullable',
            'jenis_surat_tanah' => 'nullable',
            'nomor_surat_tanah' => 'nullable',
            'file_surat_kepemilikan_bangunan' => [
                'nullable',
                'file'
            ],
            'file_gambar_ded' => [
                'nullable',
                'file'
            ],
            'file_imb' => [
                'nullable',
                'file'
            ]
        ];
    }
}
