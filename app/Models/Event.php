<?php
// https://openclassrooms.com/fr/courses/1811341-decouvrez-le-framework-php-laravel-ancienne-version/1929791-query-builder
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

    public function byCityAndDateBetween($city, $min_date, $max_date) {
        $events = Event::join('address', 'address.id', '=', 'event.address_id')
            ->join('category', 'category.id', '=', 'event.category_id')
            //->whereBetween('start_date', array($min_date, $max_date))
            ->where('start_date', '>=', $min_date)
            //->addWhere("start_date < $max_date")
            //->addWhere("address.city like '%$city%'")
            //->orderBy('start_date desc')
            ->take(2)
            ->get();

        return $events;
    }

    public function adresse()
	{
		return $this->belongsTo('App\Address');
    }

    public function category()
	{
		return $this->belongsTo('App\Category');
    }
    
    // foreach (Event::all() as $event) {
    //     echo $event->title;
    // }
    // $event = Event::where('number', 'FR 900')->first();
    // $freshEvent = $event->fresh();
    
    // $event = Event::where('number', 'FR 900')->first();
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
