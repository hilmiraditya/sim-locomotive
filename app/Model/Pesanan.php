<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'Pesanan';

    protected $fillable = [
    	//biodata klien
    	'nama_klien', 'noktp_klien', 'alamat_klien', 'email_klien', 'perusahaan_klien',
    	'jabatan_klien', 'notelp_klien', 'nowhatsapp_klien', 'instagram_klien', 'facebook_klien', 'twitter_klien',
    	'foto_klien',

    	//produksi
    	'tanggal_produksi','deskripsi_agenda_produksi',

    	//tanggal
    	'preview_pertama', 'jadwal_1', 'jadwal_2', 'serah_terimah',

    	//catatan lain
    	'catatan_lain',

    	//statuspesanan
    	'status_pesanan',

    	//unit produksi
    	'unit_produksi',

    	//penginput
    	'user_id', 'nama_penginput'
    ];

    public function User()
    {
    	return $this->belongsTo('App\User');
    }
    
    public function OrderProduk()
    {
        return $this->hasMany('App\Model\OrderProduk');
    }
}
