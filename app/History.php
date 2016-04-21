<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    // Soft deletes
    use SoftDeletes;

    // Carbon instances
    protected $dates = ['date_ini', 'date_end', 'deleted_at'];

    // Mass assignment
    protected $fillable = [
        'patient_id', 'history_type', 'grade', 'illness', 'type_personal', 'description', 'med', 'date_ini', 'date_end'
    ];

    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
