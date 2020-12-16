<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['uid','title','space_time_info','start_date','end_date','address_id','category_id','description','link','image','image_thumb','tags'];

    // protected $attributes = [
    //     'delayed' => false,
    // ];

    // use App\Models\Event;
    // foreach (Event::all() as $event) {
    //     echo $event->title;
    // }

    // $events = self::where('start_date' > '2020-12-01')
    //            ->orderBy('title')
    //            ->take(10)
    //            ->get();

    // $flight = Flight::where('number', 'FR 900')->first();
    // $freshFlight = $flight->fresh();
    
    // $flight = Flight::where('number', 'FR 900')->first();
    // $flight->number = 'FR 456';
    // $flight->refresh();    
    // $flight->number; // "FR 900"

    // $flights = Flight::where('destination', 'Paris')->get();
    // $flights = $flights->reject(function ($flight) {
    //     return $flight->cancelled;
    // });

    // use App\Models\Flight;
    // Flight::chunk(200, function ($flights) {
    //     foreach ($flights as $flight) {
    //     //
    //     }
    // });

    // use App\Models\Flight;
    // // Retrieve a model by its primary key...
    // $flight = Flight::find(1);
    // // Retrieve the first model matching the query constraints...
    // $flight = Flight::where('active', 1)->first();
    // // Alternative to retrieving the first model matching the query constraints...
    // $flight = Flight::firstWhere('active', 1);
}
