<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EventType;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the eventType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list eventtypes');
    }

    /**
     * Determine whether the eventType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventType  $model
     * @return mixed
     */
    public function view(User $user, EventType $model)
    {
        return $user->hasPermissionTo('view eventtypes');
    }

    /**
     * Determine whether the eventType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create eventtypes');
    }

    /**
     * Determine whether the eventType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventType  $model
     * @return mixed
     */
    public function update(User $user, EventType $model)
    {
        return $user->hasPermissionTo('update eventtypes');
    }

    /**
     * Determine whether the eventType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventType  $model
     * @return mixed
     */
    public function delete(User $user, EventType $model)
    {
        return $user->hasPermissionTo('delete eventtypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete eventtypes');
    }

    /**
     * Determine whether the eventType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventType  $model
     * @return mixed
     */
    public function restore(User $user, EventType $model)
    {
        return false;
    }

    /**
     * Determine whether the eventType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventType  $model
     * @return mixed
     */
    public function forceDelete(User $user, EventType $model)
    {
        return false;
    }
}
