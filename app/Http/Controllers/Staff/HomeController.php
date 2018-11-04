<?php

namespace App\Http\Controllers\Staff;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function __construct()
	{
		//$this->middleware('staff');
	}
    
    public function index()
    {
        $view = ['user' => Auth::user()];
    	return view('staff.home')->with(compact('view'));
    }
}
