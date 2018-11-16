<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanAkunController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
    }
    public function update()
    {
    	$view = ['user' => Auth::user()];
    	return view('admin.pengaturanakun.pengaturanakun')->with(compact('view'));
    }
    public function updatedata(Request $request)
    {
        $validator  = $request->validate([
            'name'      => 'required',
        ]);
        $akun = User::find($request->get('id'));
        $akun->name = $request->get('name');
        if($request->get('password') != NULL){
        	$akun->password = bcrypt($request->get('password'));
        }
        $akun->save();
        return redirect('Admin/Home')->with('pesan_sukses', 'Akun berhasil diubah !');
    }    
}
