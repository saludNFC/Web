<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    // RELATIONSHIPS
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
