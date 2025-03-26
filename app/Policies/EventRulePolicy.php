<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EventRule;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventRulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the eventRule can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list eventrules');
    }

    /**
     * Determine whether the eventRule can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRule  $model
     * @return mixed
     */
    public function view(User $user, EventRule $model)
    {
        return $user->hasPermissionTo('view eventrules');
    }

    /**
     * Determine whether the eventRule can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create eventrules');
    }

    /**
     * Determine whether the eventRule can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRule  $model
     * @return mixed
     */
    public function update(User $user, EventRule $model)
    {
        return $user->hasPermissionTo('update eventrules');
    }

    /**
     * Determine whether the eventRule can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRule  $model
     * @return mixed
     */
    public function delete(User $user, EventRule $model)
    {
        return $user->hasPermissionTo('delete eventrules');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRule  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete eventrules');
    }

    /**
     * Determine whether the eventRule can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRule  $model
     * @return mixed
     */
    public function restore(User $user, EventRule $model)
    {
        return false;
    }

    /**
     * Determine whether the eventRule can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EventRule  $model
     * @return mixed
     */
    public function forceDelete(User $user, EventRule $model)
    {
        return false;
    }
}
