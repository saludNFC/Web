<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Control;
use App\User;

class ControlPolicy
{
    use HandlesAuthorization;

    public function update_control(User $user, Control $control){
        if($user->hasRole('root') || $user->hasRole('doctor') || $user->hasRole('nurse')){
            if($user->id == $control->user_id){
                return true;
            }
        }
        return false;
    }

    public function delete_control(User $user, Control $control){
        if($user->hasRole('root') || $user->hasRole('doctor') || $user->hasRole('nurse')){
            if($user->id == $control->user_id){
                return true;
            }
        }
        return false;
    }
}
