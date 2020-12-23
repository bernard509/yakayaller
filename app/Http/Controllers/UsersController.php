<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getInfos()
    {
		return view('infos');
	}

	public function postInfos(Request $request)
	{
		return 'Le nom est ' . $request->input('nom'); 
	}

}

