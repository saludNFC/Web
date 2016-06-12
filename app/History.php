<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    // Soft deletes
    use SoftDeletes;
    // Mass assignment
    protected $fillable = [
        'patient_id', 'history_type', 'grade', 'illness', 'type_personal', 'description', 'med', 'via', 'date_ini', 'created_at'
    ];

    // Carbon instances
    protected $dates = ['date_ini', 'created_at', 'updated_at', 'deleted_at'];

    public function setCreatedAtAttribute($date){
        Carbon::setLocale('es');
        if($date != null){
            $this->attributes['created_at'] = Carbon::createFromFormat('d-m-Y', $date);
        }
    }

    public function setDateIniAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['date_ini'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    public function getCreatedAtAttribute($date){
        setlocale(LC_TIME, 'es_BO.utf8');
        if($date != null){
            Carbon::setLocale('es');
            return Carbon::parse($date)->formatLocalized('%d %B %Y');
        }
    }

    public function getDateIniAttribute($date){
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
