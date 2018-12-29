<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DB;
use Validator;
use Mail;
use Redirect;
use Carbon\Carbon;

use App\Model\Pesanan;
use App\Model\Produk;
use App\Model\ListStaff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PesananRequest;
use App\Http\Requests\InviteListStaffRequest;

class PesananController extends Controller
{
    private function input_request($pesanan, $request)
    {
        DB::BeginTransaction();
        try {
            $pesanan->nama_klien = $request->get('nama_klien');
            $pesanan->noidentitas_klien = $request->get('noidentitas_klien');
            $pesanan->alamat_klien = $request->get('alamat_klien');
            $pesanan->email_klien = $request->get('email_klien');
            $pesanan->perusahaan_klien = $request->get('perusahaan_klien');
            $pesanan->jabatan_klien = $request->get('jabatan_klien');
            $pesanan->notelp_klien = $request->get('notelp_klien');
            $pesanan->nowhatsapp_klien = $request->get('nowhatsapp_klien');
            $pesanan->instagram_klien = $request->get('instagram_klien');
            $pesanan->agenda_produksi_dari = $request->get('agenda_produksi_dari');
            $pesanan->agenda_produksi_hingga = $request->get('agenda_produksi_hingga');      
            $pesanan->deskripsi_agenda_produksi = $request->get('deskripsi_agenda_produksi'); 
            $pesanan->preview_pertama = $request->get('preview_pertama');
            $pesanan->jadwal_1 = $request->get('jadwal_1');
            $pesanan->jadwal_2 = $request->get('jadwal_2');
            $pesanan->serah_terimah = $request->get('serah_terimah');
            $pesanan->catatan_lain = $request->get('catatan_lain');
            $pesanan->unit_produksi = $request->get('unit_produksi');
            $pesanan->total_harga = $request->get('total_harga');
            $pesanan->user_id = Auth::id();
            $pesanan->nama_penginput = Auth::user()->name;
            $pesanan->save();
            $pesanan->Produk()->attach($request->get('produk_id'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
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
        $this->input_request(New Pesanan, $request);
    	return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil ditambah');
    }
    public function detil_pesanan($id)
    {
        $view = [
            'pesanan' => Pesanan::find($id),
            'user'=> Auth::user(),
            'orderproduk' => Pesanan::find($id)->Produk()->get(),
            'liststaff' => Pesanan::find($id)->ListStaff()->get(),
            'staff' => ListStaff::all()
        ];
        return view('admin.pesanan.lihatpesanan.lihat')->with(compact('view'));
    }
    public function ubah_pesanan($id)
    {
        $view = [
            'pesanan' => Pesanan::find($id),
            'user'=> Auth::user(),
            'orderproduk' => Pesanan::find($id)->Produk()->get()
        ];
        return view('admin.pesanan.ubahpesanan.ubahpesanan')->with(compact('view'));
    }
    public function get_ubah_pesanan(PesananRequest $request,$id)
    {
        $validated = $request->validated();
        $this->input_request(Pesanan::find($id), $request);
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil diupdate');
    }
    public function hapus_pesanan($id)
    {
        Pesanan::find($id)->Produk()->delete();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Pesanan berhasil dihapus');
    }
    public function kirim_email_pesanan($id)
    {
        $pesanan = Pesanan::find($id); 
        $data = array(
            'pesanan'=> $pesanan,
            'waktu' =>  Carbon::now(),
            'orderproduk' => Pesanan::find($id)->Produk()->get()
        );
        Mail::send('admin.pesanan.email.email', compact('data'),function($message)use($data)
        {
            $message->to($data['pesanan']->email_klien, $data['pesanan']->nama_klien);
            $message->subject('Surat Persetujuan Produksi');
            $message->from('locomotivewedding@gmail.com', 'Locomotive Wedding');
        });
        $pesanan->isEmailed = 1;
        $pesanan->save();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', "Invoice pesanan atas nama ".$data['pesanan']->nama_klien." berhasil dikirim ke ".$data['pesanan']->email_klien);
    }
    public function tambah_staff(InviteListStaffRequest $request, $id)
    {
        $validated = $request->validated();
        for($a=0;$a<sizeof($request->get('id_staff'));$a++){
            Pesanan::find($id)->ListStaff()->attach($request->get('id_staff')[$a],['keterangan_invitasi'=>$request->get('keterangan_invitasi')[$a]]);
        }
        return Redirect::back()->with('pesan_sukses', 'Staff berhasil diundang ke dalam agenda produksi');
    }
    public function batalkan_staff($id_pesanan, $id_staff)
    {
        Pesanan::find($id_pesanan)->ListStaff()->wherePivot('liststaff_id', '=', $id_staff)->detach();
        return Redirect::back()->with('pesan_sukses', 'Staff berhasil dibatalkan ke dalam agenda produksi');
    }
    public function ubah_status_pesanan(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        // status pesanan : 0 = dibatalkan, 1 = sedang berjalan
        $pesanan->status_pesanan = $request->get('status_pesanan');
        $pesanan->save();
        return redirect('Admin/Pesanan/DaftarPesanan')->with('pesan_sukses', 'Status pesanan atas nama '.$pesanan->nama_penginput.' berhasil diubah');   
    }
}
