<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'Pesanan';

    protected $fillable = [
    	//biodata klien
    	'nama_klien', 'noidentitas_klien', 'alamat_klien', 'email_klien', 'perusahaan_klien',
    	'jabatan_klien', 'notelp_klien', 'nowhatsapp_klien', 'instagram_klien',

    	//produksi
    	'agenda_produksi_dari','agenda_produksi_hingga','deskripsi_agenda_produksi',

    	//tanggal
    	'preview_pertama', 'jadwal_1', 'jadwal_2', 'serah_terimah',

    	//catatan lain
    	'catatan_lain',

    	//statuspesanan
    	'status_pesanan',

    	//unit produksi
    	'unit_produksi',

    	//penginput
    	'user_id', 'nama_penginput',

        //kirim email ke klien
        'isEmailed',

        //total harga
        'total_harga'
    ];

    public function User()
    {
    	return $this->belongsTo('App\User');
    }

    public function Produk()
    {
        return $this->belongsToMany('App\Model\Produk', 'produk_pesanan', 'pesanan_id', 'produk_id')->withTimestamps();
    }

    public function ListStaff()
    {
        return $this->belongsToMany('App\Model\ListStaff', 'liststaff_pesanan', 'pesanan_id', 'liststaff_id')->withPivot('keterangan_invitasi','status_invitasi')->withTimestamps();
    }
}
