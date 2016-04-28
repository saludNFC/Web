<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
    // Soft deletion
    use SoftDeletes;

    // Carbon!
    protected $dates = ['deleted_at'];

    // Mass assignment
    protected $fillable = [
        'patient_id', 'control_type', 'vaccine', 'via', 'dosis', 'weight', 'height', 'temperature', 'heart_rate', 'sistole', 'diastole', 'geriatric_type', 'notes'
    ];

    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
