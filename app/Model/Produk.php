<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'Produk';

    protected $fillabel = [
    	'nama_produk', 'harga_produk', 'kuantitas_produk', 'deskripsi_produk'
    ];

    public function OrderProduk()
    {
    	return $this->hasMany('App\Model\OrderProduk');
    }
}
