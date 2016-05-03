<?php

// REDUNDANT! How do I do this DRYish? O.o
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\History;

class HistoryPolicy
{
    use HandlesAuthorization;

    public function update_history(User $user, History $history){
        // Only root, doctor and nurse can edit histories
        if($user->hasRole('root') || $user->hasRole('admin') || $user->hasRole('nurse')){
            // And if the user is the creator of the history
            if($user->id == $history->user_id){
                return true;
            }
        }
        return false;
    }

    public function delete_history(User $user, History $history){
        // Only root, doctor and nurse can delete histories
        if($user->hasRole('root') || $user->hasRole('admin') || $user->hasRole('nurse')){
            // And if the user is the creator of the history
            if($user->id == $history->user_id){
                return true;
            }
        }
        return false;
    }
}
