<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanAkunController extends Controller
{
    public function update()
    {
    	$view = ['user' => Auth::user()];
    	return view('admin.pengaturanakun')->with(compact('view'));
    }
    public function updatedata(Request $request)
    {
        $validator  = $request->validate([
            'name'      => 'required',
        ]);
        $idoi = $request->get('id');
        dd($idoi);
        $akun = User::find($idoi)->get();
        dd($akun);
        $akun->name = $request->get('name');
        $akun->email = $request->get('email');
        if($request->get('password') != NULL){
        	$akun->password = bcrypt($request->get('password'));
        }
        $akun->save();
        return redirect('Admin/Home')->with('pesan_sukses', 'Akun berhasil diubah !');
    }    
}
