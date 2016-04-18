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
        'patient_id', 'control_type', 'note', 'value'
    ];

    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
