<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukRequest extends FormRequest
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
            'nama_produk'      => 'required',
            'harga_produk'      => 'numeric',
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
            'nama_produk.required' => 'Nama tidak boleh kosong.',
            'harga_produk.numeric' => 'Harga yang diinput hanya berbentuk angka saja.',
        ];
    }
}
