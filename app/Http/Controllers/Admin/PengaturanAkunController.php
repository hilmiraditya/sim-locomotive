<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengaturanAkunRequest;

class PengaturanAkunController extends Controller
{
    public function update()
    {
    	$view = ['user' => Auth::user()];
    	return view('admin.pengaturanakun.pengaturanakun')->with(compact('view'));
    }
    public function updatedata(PengaturanAkunRequest $request)
    {
        $validated = $request->validated();
        $akun = User::find($request->get('id'));
        $akun->name = $request->get('name');
        if($request->get('password') != NULL){
        	$akun->password = bcrypt($request->get('password'));
        }
        $akun->save();
        return redirect('Admin/Home')->with('pesan_sukses', 'Akun berhasil diubah !');
    }    
}
