<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'Produk';

    protected $fillabel = [
    	'nama_produk', 'harga_produk', 'kuantitas_produk', 'deskripsi_produk'
    ];

    public function Pesanan()
    {
    	return $this->belongsToMany('App\Model\Pesanan', 'produk_pesanan', 'produk_id', 'pesanan_id')->withTimestamps();
    }
}
