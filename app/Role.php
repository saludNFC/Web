<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    // RELATIONSHIPS
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }

    // HELPERS
    public function darPermisoDe(Permission $permission){
        return $this->permissions()->sync($permission);
    }
}
