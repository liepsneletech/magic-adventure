<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'desc', 'image', 'price', 'country_id', 'hotel_id'];

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
