<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    // Soft deletes
    use SoftDeletes;

    // Carbon instances
    protected $dates = ['date_ini', 'deleted_at'];

    public function setDateIniAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['date_ini'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    public function getDateIniAttribute($date){
        return new Carbon($date);
    }

    // Mass assignment
    protected $fillable = [
        'patient_id', 'history_type', 'grade', 'illness', 'type_personal', 'description', 'med', 'via', 'date_ini'
    ];

    // Relationships
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
