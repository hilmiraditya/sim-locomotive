<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkunRequest extends FormRequest
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
            'name'      => 'required',
            'email'     => 'unique:users,email|required',
            'password'  => 'required',
            'role'      => 'required',
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
            'name.required' => 'Nama tidak boleh kosong.',
            'email.email' => 'Format alamat email tidak sesuai.',
            'email.required' => 'Alamat email tidak boleh kosong.',
            'email.unique' => 'Alamat email telah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'role.required' => 'Pemilihan Hak Akses tidak boleh kosong.',
        ];
    }
}
