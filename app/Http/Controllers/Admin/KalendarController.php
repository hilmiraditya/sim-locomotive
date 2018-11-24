<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KalendarController extends Controller
{
    public function index()
    {
      	$view = [ 'user' => Auth::user()];
    	return view('admin.calendar')->with(compact('view'));
    }
}
