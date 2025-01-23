<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thing;

class ThingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Thing $thing)
    {
        return $user->id === $thing->master_id;
    }

    public function delete(User $user, Thing $thing)
    {
        return $user->id === $thing->master_id;
    }
}

