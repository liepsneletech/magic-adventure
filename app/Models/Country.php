<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_name', 'season_start', 'season_end'];

    public $timestamps = false;

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
