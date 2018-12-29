<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListStaff extends Model
{
    protected $table = 'liststaff';

    protected $fillable = [
    	'nama', 'email', 'jabatan', 'unit', 'no_telefon'
    ];

    public function Pesanan()
    {
        return $this->belongsToMany('App\Model\Pesanan', 'liststaff_pesanan', 'liststaff_id', 'pesanan_id')->withPivot('keterangan_invitasi')->withTimestamps();
    }
}
