<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Redirect;
use App\Model\ListStaff;
use App\Model\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListStaffRequest;
use App\Http\Requests\UpdateListStaffRequest;

class ListStaffController extends Controller
{
    private function input_request($staff, $request)
    {
    	DB::BeginTransaction();
    	try {
    		$staff->nama = $request->nama_staff;
    		$staff->email = $request->email_staff;
    		$staff->jabatan = $request->jabatan_staff;
    		$staff->unit = $request->unit_staff;
    		$staff->no_telefon = $request->no_telefon_staff;
    		$staff->save();
    		DB::commit();
    	} catch (Exception $e){
    		DB::rollback();
    	}
    }
    public function index()
    {
    	$view = [
    		'user' => Auth::user(),
    		'staff' => ListStaff::all(),
    	];
    	return view('admin.liststaff.staff', compact('view'));
    }
    public function tambahstaff(ListStaffRequest $request)
    {
    	$validated = $request->validated();
    	$this->input_request(new ListStaff, $request);
        return redirect::back()->with('pesan_sukses', 'List Staff berhasil ditambah');
	}
	// public function tambahstaff_ajax(ListStaffRequest $request)
	// {
	// 	$validated = $request->validated();
	// 	$validator = Validator::make ( Input::all (), $rules );
	// 	if ($validator->fails ())
	// 		return Response::json ( array (
						
	// 				'errors' => $validator->getMessageBag ()->toArray ()
	// 		) );
	// 		else {
	// 			$data = new Data ();
	// 			$data->name = $request->name;
	// 			$data->save ();
	// 			return response ()->json ( $data );
	// 		}
	// 	return response()->json($this->input_request(new ListStaff, $request))->with('pesan_sukses', 'List Staff berhasil ditambah');
	// }
    public function hapus_pesanan($id)
    {
    	ListStaff::find($id)->delete();
    	return redirect::back()->with('pesan_sukses', 'List Staff berhasil dihapus');
    }
    public function updatestaff($id)
    {
    	$view = [
    		'user' => Auth::user(),
    		'ListStaff' => ListStaff::find($id)
    	];
    	//return view('admin.liststaff.updatestaff', compact('view'));
    }
    public function get_updatestaff(UpdateListStaffRequest $request, $id)
    {
    	$validated = $request->validated();
    	$this->input_request(ListStaff::find($id), $request);
    	//return redirect('Admin/ListStaff/DaftarStaff')->with('pesan_sukses', 'List Staff berhasil diupdate');
    }
    public function detil_pekerjaan_staff($id){
    	$view = [
    		'user' => Auth::user(),
    		//'list_pekerjaan' => ListStaff::whereHas('ListStaff', function($q) use($id) {$q->whereIn('id', $id);})->get();
    	];
    	//return redirect('Admin/ListStaff/DetilPekerjaan', compact('view'));
    }
    public function hapus_detil_pekerjaan_staff($id)
    {
    	$view = [
    		'user' => Auth::user(),
    		'list_pekerjaan' => ListStaff::where(Auth::id())->whereHas('Pekerjaan', function($q) use($id) {$q->whereIn('id', $id);})->delete()
    	];
    	//return redirect('Admin/ListStaff/DetilPekerjaan', compact('view'))->with('pesan_sukses', 'Pekerjaan pada tanggal '$ListStaff::where(Auth::id())' untuk client '.$ListStaff::where(Auth::id()->nama).);
    	///UDAH NGANTUK LANJUT BESOK DAH//
    }
}
