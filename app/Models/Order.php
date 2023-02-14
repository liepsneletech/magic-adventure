<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'hotel_id',
    ];

    const STATUS = [
        'Nepatvirtintas' => 0,
        'Patvirtintas' => 1,
        'Atšauktas' => 2,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
