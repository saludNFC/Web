<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    // Mass assignment
    protected $fillable = [
        'patient_id', 'name', 'lastname', 'relationship', 'phone'
    ];

    // Carbon instances
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
