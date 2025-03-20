<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EventRegistration;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventRegistrationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the eventRegistration can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list eventregistrations');
    }

    /**
     * Determine whether the eventRegistration can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRegistration  $model
     * @return mixed
     */
    public function view(User $user, EventRegistration $model)
    {
        return $user->hasPermissionTo('view eventregistrations');
    }

    /**
     * Determine whether the eventRegistration can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create eventregistrations');
    }

    /**
     * Determine whether the eventRegistration can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRegistration  $model
     * @return mixed
     */
    public function update(User $user, EventRegistration $model)
    {
        return $user->hasPermissionTo('update eventregistrations');
    }

    /**
     * Determine whether the eventRegistration can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRegistration  $model
     * @return mixed
     */
    public function delete(User $user, EventRegistration $model)
    {
        return $user->hasPermissionTo('delete eventregistrations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRegistration  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete eventregistrations');
    }

    /**
     * Determine whether the eventRegistration can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRegistration  $model
     * @return mixed
     */
    public function restore(User $user, EventRegistration $model)
    {
        return false;
    }

    /**
     * Determine whether the eventRegistration can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRegistration  $model
     * @return mixed
     */
    public function forceDelete(User $user, EventRegistration $model)
    {
        return false;
    }
}
