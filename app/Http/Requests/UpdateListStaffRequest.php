<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'nama'      => 'required',
            'email'     => 'required',
            'jabatan'  => 'required',
            'unit'      => 'required',
            'no_telefon' => 'numeric|required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Alamat email tidak boleh kosong.',
            'unit.required' => 'Unit harus diisi.',
            'no_telefon.required' => 'Nomor Handphone tidak boleh kosong.',
            'no_telefon.numeric' => 'Nomor Handphone harus angka saja.',
        ];
    }
}
