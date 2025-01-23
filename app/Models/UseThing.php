<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseThing extends Model
{
    /** @use HasFactory<\Database\Factories\UseThingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'place_id',
        'amount',
        'thing_id',  // Добавьте эту строку
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
