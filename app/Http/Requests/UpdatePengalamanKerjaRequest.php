<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengalamanKerjaRequest extends FormRequest
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
            'nama'=>'required|string|min:8',
            'jabatan'=>'required',
            'tahun_masuk'=>'required|integer|digits:4|min:1900|max:2040',
            'tahun_keluar'=>'required|integer|digits:4|min:1900|max:2040'
        ];
    }
}
