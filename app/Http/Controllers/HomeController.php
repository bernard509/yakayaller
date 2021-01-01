<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
	{
		\Log::info("taratata");
		\Log::error("taratata");
		\Log::info($request->input('city'));
		//si la methode est post et si city est renseigné
		//alors je renvoie sur map avec la liste des evênements de la city
		if ($request->isMethod('post') && !is_null($request->input('city'))) {
			return view('map');
		
		}
		
		//sinon je renvoie sur home
          return view('home');
	}
	// //if (isset($request)) {
	// 	echo 'Cette variable existe, donc je peux l\'afficher.';
	// }
}