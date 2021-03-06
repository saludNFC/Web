<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
    // Soft deletion
    use SoftDeletes;

    // Carbon!
    protected $dates = ['last_menst', 'last_mamo', 'last_papa', 'created_at', 'deleted_at'];

    // Mass assignment
    protected $fillable = [
        'patient_id', 'control_type', 'vaccine', 'via', 'dosis', 'weight', 'height', 'temperature', 'heart_rate',
        'sistole', 'diastole', 'last_menst', 'last_mamo', 'last_papa', 'geriatric_type', 'notes', 'created_at'
    ];

    // MUTATORS
    public function setLastMenstAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['last_menst'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    public function setLastMamoAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['last_mamo'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    public function setLastPapaAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['last_papa'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    public function setCreatedAtAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['created_at'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    // ACCESSORS
    public function getLastMenstAttribute($date){
        // return $date;
        setlocale(LC_TIME, 'es_BO.utf8');
        if($date != null){
            Carbon::setLocale('es');
            return Carbon::parse($date)->formatLocalized('%d %B %Y');
        }
    }

    public function getLastMamoAttribute($date){
        setlocale(LC_TIME, 'es_BO.utf8');
        Carbon::setLocale('es');
        return Carbon::parse($date)->formatLocalized('%d %B %Y');
    }

    public function getLastPapaAttribute($date){
        setlocale(LC_TIME, 'es_BO.utf8');
        Carbon::setLocale('es');
        return Carbon::parse($date)->formatLocalized('%d %B %Y');
    }

    public function getCreatedAtAttribute($date){
        setlocale(LC_TIME, 'es_BO.utf8');
        Carbon::setLocale('es');
        return Carbon::parse($date)->formatLocalized('%d %B %Y');
    }

    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
