<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Model\Pesanan;
use App\Model\Produk;
use App\Model\OrderProduk;

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
    public function get_tambahpesanan_biodata(Request $request)
    {
        $validator  = $request->validate([
            'nama_klien'      => 'required',
            'noidentitas_klien'      => 'required',
            'alamat_klien'      => 'required',
            'email_klien'      => 'email',
            'notelp_klien'      => 'required',
            'nowhatsapp_klien'      => 'required',
            'preview_pertama'		=> 'date',
            'jadwal_1'		=> 'date',
           	'jadwal_2'		=> 'date',
           	'serah_terimah'		=> 'date',
           	'unit_produksi'	=>	'required',
           	'total_harga'	=> 'integer'
        ]);

        $pesanan = New Pesanan;
        //biodata
        $pesanan->nama_klien = $request->get('nama_klien');
        $pesanan->noidentitas_klien = $request->get('noidentitas_klien');
        $pesanan->alamat_klien = $request->get('alamat_klien');
        $pesanan->email_klien = $request->get('email_klien');
        $pesanan->perusahaan_klien = $request->get('perusahaan_klien');
        $pesanan->jabatan_klien = $request->get('jabatan_klien');
        $pesanan->notelp_klien = $request->get('notelp_klien');
        $pesanan->nowhatsapp_klien = $request->get('nowhatsapp_klien');
        $pesanan->instagram_klien = $request->get('facebook_klien');
        $pesanan->twitter_klien = $request->get('twitter_klien');

        //agenda produksi
        $pesanan->deskripsi_agenda_produksi = $request->get('deskripsi_agenda_produksi');

        //jadwal revisi dan serah terima
        $pesanan->preview_pertama = $request->get('preview_pertama');
        $pesanan->jadwal_1 = $request->get('jadwal_1');
        $pesanan->jadwal_2 = $request->get('jadwal_2');
        $pesanan->serah_terimah = $request->get('serah_terimah');

        //catatan lain
        $pesanan->catatan_lain = $request->get('catatan_lain');

        //unit produksi
        $pesanan->unit_produksi = $request->get('unit_produksi');

        //total harga
        $pesanan->total_harga = $request->get('total_harga');
        $pesanan->user_id = Auth::id();

        //nama penginput
        $pesanan->nama_penginput = Auth::user()->name;

        $pesanan->save();

        return 'berhasil hehe';
    	//return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil ditambah');
    }
}
