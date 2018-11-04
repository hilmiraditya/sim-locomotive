<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanAkunController extends Controller
{
    public function update()
    {
    	$view = ['user' => Auth::user()];
    	return view('staff.pengaturanakun')->with(compact('view'));
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
        return redirect('Staff/Home')->with('pesan_sukses', 'Akun berhasil diubah !');
    }
}
