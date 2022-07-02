<?php

namespace App\Policies;

use App\Models\System;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
    }

    public function view(User $user, System $config)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, System $config)
    {
        return $user->is_super_admin;
    }

    public function delete(User $user, System $config)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $config
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, System $config)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $config
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, System $config)
    {
        //
    }
}
