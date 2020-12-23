<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class MapController extends Controller
{
    public function index()
    {
        $city = 'toulouse';
        $min_date = '2019-01-01';
        // $max_date = '2021-03-01';
        $max_date = '2021-01-01';

        $event = new Event;
        $events = $event->byCityAndDateBetween($city, $min_date, $max_date);

        $markers = [];
        foreach ($events as $e)
        {
            $marker = [
                'title' => $e->title,
                'lat' => $e->latitude,
                'lng' => $e->longitude,
                'url' => $e->link,
                'icon' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                'icon_size' => [20, 32],
                'icon_anchor' => [0, 32]
            ];
            array_push($markers, $marker);
        }
        //\Log::info(var_export($events, true));
        return view('map')->with(['events'=> $events, 'markers' => $markers]);
    }
}