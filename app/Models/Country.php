<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_name', 'season_start', 'season_end'];

    public $timestamps = false;

    public function countryHotels()
    {
        return $this->hasMany(Hotel::class, 'country_id', 'id');
    }
}
