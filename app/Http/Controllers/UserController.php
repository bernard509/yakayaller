<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller{

	public function user(Request $request)
	{
		$user = Auth::user();
		if ($request->isMethod('post') 
			&& !is_null($request->input('civility'))
			&& !is_null($request->input('firstname'))
			&& !is_null($request->input('lastname'))
			&& !is_null($request->input('email')))
		{
			$user = DB::table('user')
              ->where('email', $request->input('email'))
              ->update(
				[
					'civility'=> $request->input('civility'),
					'firstname' => $request->input('firstname'),
					'lastname' => $request->input('lastname'),
					'email' => mb_strtolower($request->input('email')),
					'phone' => $request->input('phone')
				]);
			return redirect('/map')->with([
				'message'=> "votre profil a été mis à jour !"
			]);
		}
		return view('user')->with([
			'civility'=> $user->civility,
			'firstname' => $user->firstname,
			'lastname' => $user->lastname,
			'phone' => $user->phone,
			'email' => $user->email
		]);
	}

	public function signup(Request $request)
	{
		if ($request->isMethod('post')
			&& !is_null($request->input('civility'))
			&& !is_null($request->input('firstname'))
			&& !is_null($request->input('lastname')) 
			&& !is_null($request->input('email')) 
			&& !is_null($request->input('password'))) 
		{

			$user = \App\Models\User::firstOrCreate(
				['email' => mb_strtolower($request->input('email'))], 
				[
					'civility'=> $request->input('civility'),
					'firstname' => $request->input('firstname'),
					'lastname' => $request->input('lastname'),
					'email' => $request->input('email'),
					'password' => Hash::make($request->input('password')),
					'public_id'=> uniqid()
				]
			);
			return redirect('/map')->with([
				'message'=> "Merci, vous êtes inscrit !"
			]);
		}
		return view('signup')->with([
			'civility'=> $request->input('civility'),
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname'),
			'email' => $request->input('email'),
			'password' => $request->input('password'),
			'message' => "Il manque des informations"
		]);
	}
	
	public function signin(Request $request)
	{
		if ($request->isMethod('post')
			&& !is_null($request->input('email'))
			&& !is_null($request->input('password')))
		{
			$credentials = $request->only('email', 'password');

			if (Auth::attempt($credentials)) {
				$request->session()->regenerate();
	
				return redirect('/map')->with([
					'message'=> "Vous êtes connecté !"
				]);
			}
			else {
				return view('signin')->with([
					'message'=> "Identifiants invalides"
				]);
			}
		}
		elseif ($request->isMethod('get')) {
			return view('signin');
		}
		else {
			return view('signin')->with([
				'message'=> "Identifiants invalides"
			]);
		}
	}
	 
}
	 

	 


