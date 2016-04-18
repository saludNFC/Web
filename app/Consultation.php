<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    // Implementing soft deletion
    use SoftDeletes;

    // Cast dates to Carbon instances
    protected $dates = ['deleted_at'];

    // Mass assignment
    protected $fillable = [
        'patient_id', 'anamnesis', 'physical_exam', 'diagnosis', 'treatment', 'justification'
    ];

    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
