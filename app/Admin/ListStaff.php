<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ListStaff extends Model
{
    protected $table = 'liststaff';

    protected $fillable = [
        'nama', 'email', 'jabatan', 'unit', 'tanggal', 'alamat', 'instagram', 'no_telefon'
    ];

    public function Pesanan()
    {
    	return $this->belongsToMany('App\Model\Pesanan', 'liststaff_pesanan', 'liststaff_id', 'pesanan_id');
    }
}
