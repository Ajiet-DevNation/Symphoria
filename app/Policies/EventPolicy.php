<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the event can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list events');
    }

    /**
     * Determine whether the event can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Event  $model
     * @return mixed
     */
    public function view(User $user, Event $model)
    {
        return $user->hasPermissionTo('view events');
    }

    /**
     * Determine whether the event can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create events');
    }

    /**
     * Determine whether the event can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Event  $model
     * @return mixed
     */
    public function update(User $user, Event $model)
    {
        return $user->hasPermissionTo('update events');
    }

    /**
     * Determine whether the event can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Event  $model
     * @return mixed
     */
    public function delete(User $user, Event $model)
    {
        return $user->hasPermissionTo('delete events');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Event  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete events');
    }

    /**
     * Determine whether the event can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Event  $model
     * @return mixed
     */
    public function restore(User $user, Event $model)
    {
        return false;
    }

    /**
     * Determine whether the event can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Event  $model
     * @return mixed
     */
    public function forceDelete(User $user, Event $model)
    {
        return false;
    }
}
