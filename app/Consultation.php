<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    // Implementing soft deletion
    use SoftDeletes;

    // Cast dates to Carbon instances
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // Mass assignment
    protected $fillable = [
        'patient_id', 'anamnesis', 'physical_exam', 'diagnosis', 'treatment', 'justification', 'created_at'
    ];

    public function setCreatedAtAttribute($date){
        Carbon::setLocale('es');
        if($date != null){
            $this->attributes['created_at'] = Carbon::createFromFormat('d-m-Y', $date);
        }
    }

    public function getCreatedAtAttribute($date){
        setlocale(LC_TIME, 'es_BO.utf8');
        if($date != null){
            Carbon::setLocale('es');
            return Carbon::parse($date)->formatLocalized('%d %B %Y');
        }
    }
    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
