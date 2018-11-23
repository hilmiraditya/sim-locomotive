<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Model\Pesanan;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $view = [
        	'user' => Auth::user(),
        	'batal' => Pesanan::where('status_pesanan', 0)->count(),
        	'pengerjaan' => Pesanan::where('status_pesanan', 1)->count(),
        	'selesai' => Pesanan::where('status_pesanan', 2)->count(),
        	'pesanan' => Pesanan::count()
        ];
    	return view('admin.home')->with(compact('view'));
    }
}
