<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class MapController extends Controller
{
    public function index()
	{
        $city = 'angers';
        $min_date = '2019-01-01';
        $max_date = '2021-03-01';

        $event = new Event;
        $events = $event->byCityAndDateBetween($city, $min_date, $max_date);
        \Log::info(var_export($events, true));
		return view('map')->with('events', $events);
	}
}
