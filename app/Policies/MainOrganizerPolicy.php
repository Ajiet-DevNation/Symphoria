<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MainOrganizer;
use Illuminate\Auth\Access\HandlesAuthorization;

class MainOrganizerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the mainOrganizer can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list mainorganizers');
    }

    /**
     * Determine whether the mainOrganizer can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MainOrganizer  $model
     * @return mixed
     */
    public function view(User $user, MainOrganizer $model)
    {
        return $user->hasPermissionTo('view mainorganizers');
    }

    /**
     * Determine whether the mainOrganizer can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create mainorganizers');
    }

    /**
     * Determine whether the mainOrganizer can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MainOrganizer  $model
     * @return mixed
     */
    public function update(User $user, MainOrganizer $model)
    {
        return $user->hasPermissionTo('update mainorganizers');
    }

    /**
     * Determine whether the mainOrganizer can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MainOrganizer  $model
     * @return mixed
     */
    public function delete(User $user, MainOrganizer $model)
    {
        return $user->hasPermissionTo('delete mainorganizers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MainOrganizer  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete mainorganizers');
    }

    /**
     * Determine whether the mainOrganizer can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MainOrganizer  $model
     * @return mixed
     */
    public function restore(User $user, MainOrganizer $model)
    {
        return false;
    }

    /**
     * Determine whether the mainOrganizer can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MainOrganizer  $model
     * @return mixed
     */
    public function forceDelete(User $user, MainOrganizer $model)
    {
        return false;
    }
}
