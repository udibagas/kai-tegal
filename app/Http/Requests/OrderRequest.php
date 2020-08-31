<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomor' => 'required|max:255',
            'tanggal_masuk' => 'required|date',
            'sarana_id' => 'required',
            'jenis_sarana_id' => 'required',
            'dipo_id' => 'required',
            'jalur_id' => 'required',
            'jenis_pekerjaan_id' => 'required',
        ];
    }
}
