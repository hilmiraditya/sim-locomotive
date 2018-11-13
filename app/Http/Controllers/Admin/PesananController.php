<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Model\Pesanan;
use App\Model\Produk;
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
    public function tambahpesanan_biodata()
    {
        $view = [
            'user' => Auth::user(),
            'produk' => Produk::all()
        ];
    	return view('admin.pesanan.tambahpesanan.tambah')->with(compact('view'));
    }
}
