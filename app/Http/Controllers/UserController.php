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

	public function signup(Request $request)
	
	{
		\Log::info("coucou !");
		if ($request->isMethod('post') 
			&& !is_null($request->input('firstname'))
			&& !is_null($request->input('lastname')) 
			&& !is_null($request->input('email')) 
			&& !is_null($request->input('password'))) 
		{

			$user = \App\Models\user::firstOrCreate(
				['email' => mb_strtolower($request->input('email'))], 
				[
					'firstname' => $request->input('firstname'),
					'lastname' => $request->input('lastname'),
					'email' => $request->input('email'),
					'password' => $request->input('password'),
					'public_id'=> uniqid(),
					'civility'=> "Mr"
				]
			);
			return redirect('/map')->with([
				'message'=> "Merci, vous êtes inscrit !"
			]);
		}
		return view('signup');
	}
	
	public function signin()
	{
		return view('signin');
	}
	 
}
	 

	 


