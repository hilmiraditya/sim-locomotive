<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Redirect;
use URL;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkunRequest;
use App\Http\Requests\UpdateAkunRequest;

class AkunController extends Controller
{
    public function index()
    {
    	$view = [
           	'user' => Auth::user(),
           	'account' => User::where('email','!=', Auth::user()->email)->get()
    	];
    	return view('admin.akun.akun')->with(compact('view'));
    }
    public function create()
    {
        $view = ['user' => Auth::user()];
        return view('admin.akun.tambahakun')->with(compact('view'));
    }
    public function createdata(AkunRequest $request)
    {
        $validated = $request->validated();
        $akun = new User;
        $akun->name = $request->get('name');
        $akun->email = $request->get('email');
        $akun->password = bcrypt($request->get('password'));
        if($request->get('role') == 'Admin') $akun->admin = 1;
        else $akun->admin = 0;
        $akun->save();
        return redirect('Admin/Akun/LihatAkun')->with('pesan_sukses', 'Akun berhasil dibuat');
    }
    public function update($id)
    {
        $view = [
            'user' => Auth::user(),
            'edit' => User::find($id)
        ];
        return view('admin.akun.updateakun')->with(compact('view'));
    }
    public function updatedata(UpdateAkunRequest $request)
    {
        $validated = $request->validated();       
        $akun = User::find($request->get('id'));
        $akun->name = $request->get('name');
        if($request->get('password') != NULL){
        	$akun->password = bcrypt($request->get('password'));
        }
        if($request->get('role') != NULL){
            if($request->get('role') == 'Admin') $akun->admin = 1;
            else $akun->admin = 0;
        }
        $akun->save();
        return redirect('Admin/Akun/LihatAkun')
            ->with('pesan_sukses', 'Akun berhasil diubah !');
    }
    public function delete($id)
    {
    	User::find($id)->delete();
        return Redirect::back()->with('pesan_sukses', 'Akun berhasil dihapus !');
    }
}
