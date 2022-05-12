<?php

namespace App\Policies;

use App\Models\User;
use App\Models\site;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\site  $site
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, site $site)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\site  $site
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, site $site)
    {
        //
    }

    public function delete(User $user, site $site)
    {
        return $user->is_super_admin || $user->id === $site->user_id;
    }

    public function restore(User $user, site $site)
    {
    }

    public function forceDelete(User $user, site $site)
    {
    }
}
