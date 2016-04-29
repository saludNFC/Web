<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the comments for the blog post.
     */

    // RELATIONSHIPS
    public function patients(){
        return $this->hasMany('App\Patient');
    }

    public function histories(){
        return $this->hasMany('App\History');
    }

    public function controls(){
        return $this->hasMany('App\Control');
    }

    public function consultations(){
        return $this->hasMany('App\Consultation');
    }
}
