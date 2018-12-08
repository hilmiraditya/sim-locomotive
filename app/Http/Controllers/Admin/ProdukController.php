<?php

namespace App\Http\Controllers\Admin;

use Auth;
use PDF;
use Carbon\Carbon;

use App\Model\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

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
    public function updatedata(UpdateProdukRequest $request)
    {
        $validated = $request->validated();        
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
    public function createdata(ProdukRequest $request)
    {
        $validated = $request->validated();
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
    	$data = ['produk' => Produk::all()];
        //return view('admin.produk.invoice')->with($data);
    	$pdf = PDF::loadView('admin.produk.invoice', $data);
		return $pdf->download('Produk'.Carbon::now().'.pdf');
    }
}
