<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function update_user(User $user, User $u){
        return $user->hasRole('root') || $user->hasRole('admin');
    }

    // only the root and admin can edit the patient and see the edit button
    public function delete_user(User $user, User $u){
        return $user->hasRole('root') || $user->hasRole('admin');
    }
}
