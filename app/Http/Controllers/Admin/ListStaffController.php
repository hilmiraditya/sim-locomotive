<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Model\ListStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListStaffRequest;
use App\Http\Requests\UpdateListStaffRequest;

class ListStaffController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
    }
    private function input_request($staff, $request)
    {
    	DB::BeginTransaction();
    	try {
    		$staff->nama = $request->staff;
    		$staff->email = $request->email;
    		$staff->jabatan = $request->jabatan;
    		$staff->unit = $request->unit;
    		$staf->no_telefon = $request->no_telefon;
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
    		'staff' => ListStaff::all();
    	];
    	return view('admin.liststaff.liststaff', compact('view'));
    }
    public function tambahstaff()
    {
    	$view = [
    		'user' => Auth::user()
    	];
    	return view('admin.liststaff.tambahstaff', compact('view'));
    }
    public function get_tambahstaff(ListStaffRequest $request)
    {
    	$validated = $request->validated();
    	$this->input_request(new ListStaff, $request);
    	return redirect('Admin/ListStaff/DaftarStaff')->with('pesan_sukses', 'List Staff berhasil ditambah');
    }
    public function hapus_pesanan($id)
    {
    	ListStaff::find($id)->delete();
    	return redirect('Admin/ListStaff/DaftarStaff')->with('pesan_sukses', 'List Staff berhasil dihapus');
    }
    public function updatestaff($id)
    {
    	$view = [
    		'user' => Auth::user(),
    		'ListStaff' => ListStaff::find($id)
    	];
    	return view('admin.liststaff.updatestaff', compact('view'));
    }
    public function get_updatestaff(UpdateListStaffRequest $request, $id)
    {
    	$validated = $request->validated();
    	$this->input_request(ListStaff::find($id), $request);
    	return redirect('Admin/ListStaff/DaftarStaff')->with('pesan_sukses', 'List Staff berhasil diupdate');
    }
    public function detil_pekerjaan_staff($id){
    	$view = [
    		'user' => Auth::user();
    		'list_pekerjaan' => ListStaff::whereHas('ListStaff', function($q) use($id) {
    				$q->whereIn('id', $id);
    			})->get();
    	];
    	return redirect('Admin/ListStaff/DetilPekerjaan', compact('view'));
    }
    public function hapus_detil_pekerjaan_staff($id)
    {
    	$view = [
    		'user' => Auth::user();
    		'list_pekerjaan' => ListStaff::whereHas('Pekerjaan', function($q) use($id) {$q->whereIn('id', $id);})->delete();
    	];
    }
}
