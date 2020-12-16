<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['country_id', 'address','complement','zipcode','city','city_district','department','region','longitude','latitude'];
}
