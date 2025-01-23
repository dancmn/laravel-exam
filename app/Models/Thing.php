<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    /** @use HasFactory<\Database\Factories\ThingFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($thing) {
            \DB::table('use_things')->insert([
                'thing_id' => $thing->id,
                'place_id' => null,
                'user_id' => null,
                'amount' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        static::deleted(function ($thing) {
            \DB::table('use_things')->where('thing_id', $thing->id)->delete();
        });
    }

    public function master(){
        return $this->belongsTo(User::class, 'master_id');
    }

    public function useThings(){
        return $this->hasMany(UseThing::class, 'thing_id');
    }

    public function places(){
        return $this->belongsToMany(Place::class, 'use_things', 'thing_id', 'place_id')->withPivot('user_id', 'amount');
    }
}
