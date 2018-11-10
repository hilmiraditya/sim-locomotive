<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Model\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function index()
    {
        $view = [
            'user' => Auth::user(),
            'pesanan' => Pesanan::all()
        ];
        return view('admin.pesanan.daftarpesanan')->with(compact('view'));
    }
}
