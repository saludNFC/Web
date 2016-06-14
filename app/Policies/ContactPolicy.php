<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Contact;
use App\User;

class ContactPolicy
{
    use HandlesAuthorization;

    public function store_contact(User $user, Contact $contact){
        if($user->hasRole('root') || $user->hasRole('admin')){
            return true;
        }
        return false;
    }

    public function update_contact(User $user, Contact $contact){
        if($user->hasRole('root') || $user->hasRole('admin')){
            return true;
        }
        return false;
    }

    public function delete_control(User $user, Contact $contact){
        if($user->hasRole('root') || $user->hasRole('admin')){
            return true;
        }
        return false;
    }
}
