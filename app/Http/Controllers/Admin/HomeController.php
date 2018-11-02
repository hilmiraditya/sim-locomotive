<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $view = ['user' => Auth::user()];
    	return view('admin.home')->with(compact('view'));
    }
}
