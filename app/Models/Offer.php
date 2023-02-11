<?php

namespace App\Models;

use Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    const SORT = [
        'asc_price' => 'Pigiausios viršuje',
        'dsc_price' => 'Brangiausios viršuje',
    ];

    protected $fillable = ['title', 'travel_start', 'travel_end', 'price', 'country_id', 'hotel_id'];

    public $timestamps = false;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
