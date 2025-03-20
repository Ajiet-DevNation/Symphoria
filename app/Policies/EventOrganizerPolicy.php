<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EventOrganizer;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventOrganizerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the eventOrganizer can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list eventorganizers');
    }

    /**
     * Determine whether the eventOrganizer can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventOrganizer  $model
     * @return mixed
     */
    public function view(User $user, EventOrganizer $model)
    {
        return $user->hasPermissionTo('view eventorganizers');
    }

    /**
     * Determine whether the eventOrganizer can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create eventorganizers');
    }

    /**
     * Determine whether the eventOrganizer can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventOrganizer  $model
     * @return mixed
     */
    public function update(User $user, EventOrganizer $model)
    {
        return $user->hasPermissionTo('update eventorganizers');
    }

    /**
     * Determine whether the eventOrganizer can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventOrganizer  $model
     * @return mixed
     */
    public function delete(User $user, EventOrganizer $model)
    {
        return $user->hasPermissionTo('delete eventorganizers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventOrganizer  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete eventorganizers');
    }

    /**
     * Determine whether the eventOrganizer can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventOrganizer  $model
     * @return mixed
     */
    public function restore(User $user, EventOrganizer $model)
    {
        return false;
    }

    /**
     * Determine whether the eventOrganizer can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventOrganizer  $model
     * @return mixed
     */
    public function forceDelete(User $user, EventOrganizer $model)
    {
        return false;
    }
}
