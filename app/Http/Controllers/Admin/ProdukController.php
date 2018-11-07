<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
    	$view = [
           	'user' => Auth::user(),
           	'account' => User::where('email','!=', Auth::user()->email)->get()
    	];
    	return view('admin.produk.produk')->with(compact('view'));
    }
}
