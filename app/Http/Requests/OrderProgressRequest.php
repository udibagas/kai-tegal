<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderProgressRequest extends FormRequest
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
            'order_id' => 'required',
            'jenis_detail_pekerjaan' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'order_id' => 'Nomor Order',
            'jenis_detail_pekerjaan' => 'Jenis detail pekerjaan'
        ];
    }
}
