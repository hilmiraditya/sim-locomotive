<?php

namespace App\Http\Controllers\Staff;

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
    	return view('staff.home');
    }
}
