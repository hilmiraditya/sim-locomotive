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
            'agenda_produksi_dari' => 'date|required',
            'agenda_produksi_hingga' => 'date|required|greater_than_field:agenda_produksi_dari',
            'deskripsi_agenda_produksi' => 'required',
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
            'agenda_produksi_dari.date' => 'Tanggal awal agenda produksi harus berbentuk tanggal',
            'agenda_produksi_dari.required' => 'Tanggal awal agenda produksi harus diisi',
            'agenda_produksi_hingga.date' => 'Tanggal akhir agenda produksi harus berbentuk tanggal',
            'agenda_produksi_hingga.greater_than_field' => 'Salah input pada tanggal akhir agenda produksi',
            'agenda_produksi_hingga.required' => 'Tanggal akhir agenda produksi harus diisi',
            'deskripsi_agenda_produksi.required' => 'Deskripsi agenda produksi tidak boleh kosong',
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
