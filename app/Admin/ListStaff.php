<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ListStaff extends Model
{
    protected $table = 'List_Staff';

    protected $fillable = [
        'nama', 'email', 'jabatan', 'unit', 'tanggal', 'alamat', 'instagram', 'no_telefon'
    ];
}
