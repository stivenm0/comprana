<?php

namespace App\Policies;

use App\Models\User;

class ResourcePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function author(User $user, Object $resource)  {
        return $user->id === $resource->user_id ? true : abort(404);
     } 


}
