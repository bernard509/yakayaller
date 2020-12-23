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
    public function byCityAndDateBetween($city, $min_date, $max_date) {
        $events = Event::join('address', 'address.id', '=', 'event.address_id')
            ->join('category', 'category.id', '=', 'event.category_id')
            ->where('start_date', '>=', $min_date)
            ->where('start_date', '<', $max_date)
            ->where('city', 'like', '%'.$city.'%')
            ->orderBy('start_date')
            //->take(2)
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
}

