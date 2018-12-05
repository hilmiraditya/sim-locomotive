<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListStaff extends Model
{
    protected $table = 'liststaff';

    protected $fillable = [
    	'nama', 'email', 'jabatan', 'unit',
    	'no_telefon'
    ];
}
