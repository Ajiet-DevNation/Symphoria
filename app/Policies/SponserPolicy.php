<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sponser;
use Illuminate\Auth\Access\HandlesAuthorization;

class SponserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sponser can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list sponsers');
    }

    /**
     * Determine whether the sponser can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sponser  $model
     * @return mixed
     */
    public function view(User $user, Sponser $model)
    {
        return $user->hasPermissionTo('view sponsers');
    }

    /**
     * Determine whether the sponser can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create sponsers');
    }

    /**
     * Determine whether the sponser can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sponser  $model
     * @return mixed
     */
    public function update(User $user, Sponser $model)
    {
        return $user->hasPermissionTo('update sponsers');
    }

    /**
     * Determine whether the sponser can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sponser  $model
     * @return mixed
     */
    public function delete(User $user, Sponser $model)
    {
        return $user->hasPermissionTo('delete sponsers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sponser  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete sponsers');
    }

    /**
     * Determine whether the sponser can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sponser  $model
     * @return mixed
     */
    public function restore(User $user, Sponser $model)
    {
        return false;
    }

    /**
     * Determine whether the sponser can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sponser  $model
     * @return mixed
     */
    public function forceDelete(User $user, Sponser $model)
    {
        return false;
    }
}
