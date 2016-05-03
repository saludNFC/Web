<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Consultation;

class ConsultationPolicy
{
    use HandlesAuthorization;

    public function update_consultation(User $user, Consultation $consultation){
        if($user->hasRole('root') || $user->hasRole('doctor')){
            if($user->id == $consultation->user_id){
                return true;
            }
        }
        return false;
    }

    public function delete_consultation(User $user, Consultation $consultation){
        if($user->hasRole('root') || $user->hasRole('doctor')){
            if($user->id == $consultation->user_id){
                return true;
            }
        }
        return false;
    }
}
