<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DB;
use Validator;
use App\Model\Pesanan;
use App\Model\Produk;
use App\Model\OrderProduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PesananRequest;

class PesananController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
    }
    private function input_request($pesanan, $request)
    {
            //biodata
            $pesanan->nama_klien = $request->get('nama_klien');
            $pesanan->noidentitas_klien = $request->get('noidentitas_klien');
            $pesanan->alamat_klien = $request->get('alamat_klien');
            $pesanan->email_klien = $request->get('email_klien');
            $pesanan->perusahaan_klien = $request->get('perusahaan_klien');
            $pesanan->jabatan_klien = $request->get('jabatan_klien');
            $pesanan->notelp_klien = $request->get('notelp_klien');
            $pesanan->nowhatsapp_klien = $request->get('nowhatsapp_klien');
            $pesanan->instagram_klien = $request->get('instagram_klien');
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
            //nama penginput
            $pesanan->user_id = Auth::id();
            $pesanan->nama_penginput = Auth::user()->name;
            $pesanan->save(); 
    }
    
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
    public function get_tambahpesanan_biodata(PesananRequest $request)
    {
        $validated = $request->validated();
        $this->input_request(New Pesanan,$request);
    	return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil ditambah');
    }
    public function detil_pesanan($id)
    {
        $view = [
            'pesanan' => Pesanan::find($id)->first(),
            'user'=> Auth::user(),
            'produk' => Produk::all()
        ];
        return view('admin.pesanan.lihatpesanan.lihat')->with(compact('view'));
    }
    public function ubah_pesanan($id)
    {
        $view = [
            'pesanan' => Pesanan::find($id)->first(),
            'user'=> Auth::user(),
            'produk' => Produk::all()
        ];
        return view('admin.pesanan.ubahpesanan.ubah')->with(compact('view'));
    }
    public function get_ubah_pesanan(Request $request, $id)
    {
        $this->validation_request($request);
        $this->input_request(Pesanan::find($id),$request);
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil diupdate');
    }
    public function hapus_pesanan($id)
    {
        Pesanan::find($id)->delete();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil dihapus');
    }
    public function kirim_email($id)
    {
        $email = Pesanan::find($id)->first()->email_klien;
        return $email;
    }
}
