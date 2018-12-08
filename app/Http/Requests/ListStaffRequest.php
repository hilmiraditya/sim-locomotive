<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListStaffRequest extends FormRequest
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
            'nama_staff'      => 'required',
            'email_staff'     => 'unique:users,email|required',
            'jabatan_staff'  => 'required',
            'unit_staff'      => 'required',
            'no_telefon_staff' => 'numeric|required'
        ];
    }
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'jabatan_staff.required' => 'Jabatan harus diisi.',
            'nama_staff.required' => 'Nama tidak boleh kosong.',
            'email_staff.email' => 'Format alamat email tidak sesuai.',
            'email_staff.required' => 'Alamat email tidak boleh kosong.',
            'email_staff.unique' => 'Alamat email telah terdaftar.',
            'unit_staff.required' => 'Unit harus diisi.',
            'no_telefon_staff.required' => 'Nomor Handphone tidak boleh kosong.',
            'no_telefon_staff.numeric' => 'Nomor Handphone harus angka saja.',
        ];
    }
}
