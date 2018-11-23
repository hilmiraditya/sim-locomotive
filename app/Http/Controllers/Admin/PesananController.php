<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DB;
use Validator;
use Mail;
use Carbon\Carbon;

use App\Model\Pesanan;
use App\Model\Produk;
use App\Model\OrderProduk as OrderProduk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PesananRequest;

class PesananController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
    }
    private function input_request($pesanan, $request, $pesanan_id)
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

            //pesanan id
            $pesanan->pesanan_id = $pesanan_id;
            $pesanan->save();
    }
    public function order_produk_input($request_pesananproduk, $pesanan_id)
    {
            $pesananproduk = explode("-",$request_pesananproduk);
            $produk = Produk::all();

            foreach($produk as $produk)
            {
                for($a=0;$a<sizeof($pesananproduk);$a++)
                {
                    if($pesananproduk[$a] == $produk->id)
                    {
                        $order = New OrderProduk;
                        $order->nama_produk = $produk->nama_produk;
                        $order->harga_produk = $produk->harga_produk;
                        $order->kuantitas_produk = $produk->kuantitas_produk;
                        $order->deskripsi_produk = $produk->deskripsi_produk;
                        $order->produk_id = $produk->id;
                        $order->pesanan_id = $pesanan_id;
                        $order->save();
                    }
                }
            }
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
        $pesanan_id = rand(1,10000);
        $this->input_request(New Pesanan, $request, $pesanan_id);
        $this->order_produk_input($request->get('pilihanpesananproduk'), $pesanan_id);
    	return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil ditambah');
    }
    public function detil_pesanan($id)
    {
        $pesanan = Pesanan::find($id)->first();
        $view = [
            'pesanan' => Pesanan::find($id)->first(),
            'user'=> Auth::user(),
            'produk' => Produk::all(),
            'orderproduk' => OrderProduk::where('pesanan_id', $pesanan->pesanan_id)->get()
        ];
        return view('admin.pesanan.lihatpesanan.lihat')->with(compact('view'));
    }
    public function ubah_pesanan($id)
    {
        $pesanan = Pesanan::find($id)->first();
        $view = [
            'pesanan' => Pesanan::find($id)->first(),
            'user'=> Auth::user(),
            'produk' => Produk::all(),
            'orderproduk' => OrderProduk::where('pesanan_id', $pesanan->pesanan_id)->get()
        ];
        return view('admin.pesanan.ubahpesanan.ubahpesanan')->with(compact('view'));
    }
    public function get_ubah_pesanan(PesananRequest $request,$id)
    {
        $validated = $request->validated();
        $this->input_request(Pesanan::find($id),$request, Pesanan::find($id)->first()->pesanan_id);
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil diupdate');
    }
    public function hapus_pesanan($id)
    {
        Pesanan::find($id)->delete();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil dihapus');
    }
    public function kirim_email_pesanan($id)
    {
        $pesanan = Pesanan::where('id', $id)->first(); 
        $data = array(
            'pesanan'=> $pesanan,
            'waktu' =>  Carbon::now(),
            'orderproduk' => OrderProduk::where('pesanan_id', $pesanan->pesanan_id)->get()
        );
        Mail::send('admin.pesanan.email.email', compact('data'),function ($message)use($data)
        {
            $message->to($pesanan->email_klien, $pesanan->nama_klien);
            $message->subject('Surat Persetujuan Produksi');
            $message->from('locomotivewedding@gmail.com', 'Locomotive Wedding');
        });
        $pesanan->isEmailed = 1;
        $pesanan->save();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', "Invoice pesanan atas nama ".$data['pesanan']->nama_klien." berhasil dikirim ke ".$data['pesanan']->email_klien);
    }
    public function ubah_status_pesanan(Request $request, $id)
    {
        $pesanan = Pesanan::find($id)->first();
        // status pesanan : 0 = dibatalkan, 1 = sedang berjalan, 2 = sudah selesai
        $pesanan->status_pesanan = $request->get('status_pesanan');
        $pesanan->save();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Status pesanan atas nama '.$pesanan->nama_penginput.' berhasil diubah');   
    }
}
