<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory, Searchable;

    const SORT = [
        'asc_price' => 'Pigiausios viršuje',
        'dsc_price' => 'Brangiausios viršuje',
    ];

    protected $fillable = ['title', 'travel_start', 'travel_end', 'price', 'country_id', 'hotel_id'];

    public $timestamps = false;

    public function toSearchableArray()
    {
        return [
            'hotel_id' => $this->hotel_id,
        ];
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
