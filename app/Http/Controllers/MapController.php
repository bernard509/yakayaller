<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class MapController extends Controller
{
    public function index(Request $request)
    {
        // valeur par défaut si je n'arrive pas via le formulaire de recherche
        $city = 'angers';
        $min_date = '2021-01-01';
        $max_date = '2021-04-01';
        $default_latitude = 47.473861;
        $default_longitude = -0.559159;

        // \Log::info($request->input('city'));
        // si on arrive via le formulaire et que la ville est renseignée
        if ($request->isMethod('post') && !is_null($request->input('city'))) {
            $city = $request->input('city');
        }

        // initialisation de l'objet Event
        $event = new Event;
        // appel de la méthode byCityAndDateBetween pour récupérer tous les évenements
        // de la ville demandée dont la date se situe entre min_date et max_date
        // et stockage des événements trouvés dans la variable $events
        $events = $event->byCityAndDateBetween($city, $min_date, $max_date);

        // initialisation des marqueurs de la carte dans une variable $markers de type tableau
        $markers = [];
        // pour chaque événement
        foreach ($events as $e)
        {
            // initialisation de la variable $marker de type tableau associatif à afficher sur la carte avec les infos de l'événement
            // (titre, latitude, longitude, lien page web, url image icône, taille image icône, position image icône)
            $marker = [
                'title' => $e->title,
                'lat' => $e->latitude,
                'lng' => $e->longitude,
                'url' => $e->link,
                'icon' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                'icon_size' => [20, 32],
                'icon_anchor' => [0, 32]
            ];
            // ajout en fin du tableau $markers de la variable $marker de type tableau associatif
            array_push($markers, $marker);
        }
        // je défini les latitudes et longitude par défaut du centre de la carte
        // avec celles du dernier événement traité dans la boucle
        if(isset($e)){
            $default_latitude = $e->latitude;
            $default_longitude = $e->longitude;
        }
        //\Log::info(var_export($events, true));

        // Renvoi de la vue map avec le tableau $event des événements et le tableau $markers des marqueurs à afficher sur la carte
        return view('map')->with([
            'events'=> $events,
            'markers' => $markers,
            'default_latitude' => $default_latitude,
            'default_longitude' => $default_longitude
            ]);

	}
	
    }
    
		


