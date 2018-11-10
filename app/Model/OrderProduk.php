<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduk extends Model
{
    protected $table = 'Produk';

    protected $fillable = [
    	'nama_produk', 'harga_produk', 'kuantitas_produk', 'deskripsi_produk',
    	'produk_id'
    ];

    public function Produk()
    {
    	return $this->belongsTo('App\Model\Produk');
    }
}
