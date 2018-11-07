<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'Model';

    protected $fillabel = [
    	'nama_produk', 'harga_produk', 'kuantitas', 'deskripsi'
    ];
}
