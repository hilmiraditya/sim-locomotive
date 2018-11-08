<?php

namespace App\Http\Controllers\Admin;

use Auth;
use PDF;

use App\Model\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
    	$view = [
           	'user' => Auth::user(),
           	'produk' => Produk::all()
    	];
    	return view('admin.produk.produk')->with(compact('view'));
    }
    public function update($id)
    {
    	$view = [
           	'user' => Auth::user(),
           	'produk' => Produk::find($id)->first()
    	];
    	return view('admin.produk.updateproduk')->with(compact('view'));    	
    }
    public function updatedata(Request $request)
    {
        $validator  = $request->validate([
            'nama_produk'      => 'required',
            'harga_produk'		=> 'numeric',
        ]);
        $produk = Produk::find($request->get('id'));
        $produk->nama_produk = $request->get('nama_produk');
        $produk->harga_produk = $request->get('harga_produk');
        if(!$request->get('kuantitas_produk')){
        	$produk->kuantitas_produk = $request->get('kuantitas_produk');
    	}
        $produk->deskripsi_produk = $request->get('deskripsi_produk');
        $produk->save();
        return redirect('Admin/Produk/LihatProduk')->with('pesan_sukses', 'Produk berhasil diubah !');
    }
    public function create()
    {
    	$view = ['user' => Auth::user()];
    	return view('admin.produk.tambahproduk')->with(compact('view'));
    }
    public function createdata(Request $request)
    {
        $validator  = $request->validate([
            'nama_produk'      => 'required',
            'harga_produk'		=> 'numeric',
            'kuantitas_produk'	=> 'numeric'
        ]);
        $produk = new Produk;
        $produk->nama_produk = $request->get('nama_produk');
        $produk->harga_produk = $request->get('harga_produk');
        $produk->kuantitas_produk = $request->get('kuantitas_produk');
        $produk->deskripsi_produk = $request->get('deskripsi_produk');
        $produk->save();
        return redirect('Admin/Produk/LihatProduk')->with('pesan_sukses', 'Produk berhasil ditambah !');
    }
    public function delete($id)
    {
    	Produk::find($id)->delete();
        return redirect('Admin/Produk/LihatProduk')->with('pesan_sukses', 'Produk berhasil dihapus !');
    }
    public function exportPDF()
    {
    	$data = ['jancok' => 'percobaan'];
    	$pdf = PDF::loadView('admin.produk.invoice', $data);
		return $pdf->download('invoice.pdf');
    }
}
