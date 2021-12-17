<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaTigaRequest extends FormRequest
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
            'jarak_depan' => 'nullable',
            'jarak_belakang' => 'nullable',
            'jarak_kiri' => 'nullable',
            'jarak_kanan' => 'nullable',
            'keterangan_jarak' => 'nullable',
            'tinggi_ll' => 'nullable',
            'keterangan_ll' => 'nullable',
            'tinggi_bangunan' => 'nullable',
            'keterangan_tb' => 'nullable',
            'status_pagar' => 'nullable',
            'pl_pagar' => 'nullable',
            'kondisi_pagar' => 'nullable',
            'keterangan_pagar' => 'nullable',
        ];
    }
}
