<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Validate users with a higher role.
     *
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        if ($user->hasRole('ATOMSit')) {
            return true;
        }
        if ($user->hasRole('admin')) {
            return true;
        } else {
            return null;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if ($user->is($model)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('user_create')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        if ($user->is($model)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        if ($user->is($model)) {
            return true;
        } elseif ($user->can('user_delete')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
