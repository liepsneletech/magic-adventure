<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'desc', 'image', 'country_id'];

    public $timestamps = false;

    public function hotelCountry()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
