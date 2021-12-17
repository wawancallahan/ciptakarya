<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiptaKaryaTujuhRequest extends FormRequest
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
            'luas_lahan_terbuka' => 'required',
            'lt_proyeksi' => 'required',
            'luas_tapak_basement' => 'required',
            'luas_seluruh_ruang_terbuka' => 'required',
            'luas_seluruh_lantai' => 'required',
            'luas_lahan_tanah_perpetakan' => 'required',
            'luas_lantai_dasar' => 'required',
        ];
    }
}
