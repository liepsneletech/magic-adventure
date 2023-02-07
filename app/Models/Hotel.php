<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'desc', 'image', 'country_id'];

    public $timestamps = false;

    public function hotelCountry()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
