<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Patient;

class PatientPolicy
{
    use HandlesAuthorization;

    // Only the users with root or admin roles can create patients;
    // public function create(User $user){
        // return ($user->hasRole('root') || $user->hasRole('admin'));
    //     return true;
    // }

    // only the root and admin can edit the patient and see the edit button
    public function update_patient(User $user, Patient $patient){
        return ($user->hasRole('root') || $user->hasRole('admin'));
    }

    // only the root and admin can edit the patient and see the edit button
    public function delete_patient(User $user, Patient $patient){
        return ($user->hasRole('root') || $user->hasRole('admin'));
    }
}
