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
}
