<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($place) {
            \DB::table('use_things')->where('place_id', $place->id)->update(['place_id' => null]);
        });
    }
}
