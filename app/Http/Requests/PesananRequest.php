<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesananRequest extends FormRequest
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
            'nama_klien'      => 'required',
            'noidentitas_klien'      => 'required',
            'alamat_klien'      => 'required',
            'email_klien'      => 'email',
            'notelp_klien'      => 'required',
            'nowhatsapp_klien'      => 'required',
            'preview_pertama'       => 'date',
            'jadwal_1'      => 'date',
            'jadwal_2'      => 'date',
            'serah_terimah'     => 'date',
            'unit_produksi' =>  'required',
            'total_harga'   => 'integer'
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
            'nama_klien.required' => 'Nama tidak boleh kosong.',
            'noidentitas_klien.required' => 'Nomor Identitas tidak boleh kosong.',
            'alamat_klien.required' => 'Alamat tidak boleh kosong.',  
            'email_klien.email' => 'Format email tidak sesuai.',   
            'notelp_klien.required' => 'Nomor Telp tidak boleh kosong.',
            'nowhatsapp_klien.required' => 'Nomor Telp tidak boleh kosong.',
            'preview_pertama.date' => 'Input Preview pertama tidak sesuai atribut tanggal.',
            'jadwal_1.date' => 'Input jadwal revisi 1 tidak sesuai atribut tanggal.',         
            'jadwal_2.date' => 'Input jadwal revisi 2 tidak sesuai atribut tanggal.',  
            'serah_terimah.date' => 'Input jadwal serah terima tidak sesuai atribut tanggal.',
            'unit_produksi.required' => 'Harap memilih unit produksi.',
            'total_harga.integer' => 'Input harga hanya menggunakan angka saja.'
        ];
    }
}
