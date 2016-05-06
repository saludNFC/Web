<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    // To implement soft deleting
    use SoftDeletes;

    // Columns available to be edited by users
    protected $fillable = [
        'historia', 'ci', 'nombre', 'apellido', 'sexo', 'fecha_nac', 'lugar_nac', 'grupo_sanguineo'
    ];

    // Casting dates to Carbon instances
    protected $dates = ['fecha_nac', 'deleted_at'];

    // MUTATORS
    // To change fecha_nac attribute format to day_month_year before storing to database
    public function setFechaNacAttribute($date){
        Carbon::setLocale('es');
        $this->attributes['fecha_nac'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    // RELATIONSHIPS
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function history(){
        return $this->hasMany('App\History');
    }

    public function control(){
        return $this->hasMany('App\Control');
    }

    public function consultation(){
        return $this->hasMany('App\Consultation');
    }

    // HELPERS
    public function isWomanOldEnough(){
        return $this->sexo == 'Femenino' && $this->fecha_nac->age >= 15;
    }

    public function isElder(){
        return $this->fecha_nac->age >= 55;
    }
}
