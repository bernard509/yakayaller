<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{


	// public function postInfos(Request $request)
	// {
	// 	return 'Le nom est ' . $request->input('nom'); 
	// }
	public function user()
	{
		return view('user');
	}

	public function signup()
	{
		return view('signup');
	}
	
	public function signin()
	{
		return view('signin');
	}
	 
}
	 

	 


