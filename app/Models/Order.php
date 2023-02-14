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
        0 => 'Nepatvirtintas',
        1 => 'Patvirtintas',
        2 => 'Atšauktas',
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
