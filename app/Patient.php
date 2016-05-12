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
    public function setNombreAttribute($name){
        $this->attributes['nombre'] = ucfirst($name);
    }

    public function setApellidoAttribute($apellido){
        $this->attributes['apellido'] = ucwords($apellido);
    }

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
    public function codHistoria(Patient $patient){
        if(str_contains($patient->apellido, ' ')){
            $words = explode(" ", $patient->apellido);
            $output = substr($words[0], 0, 1) . substr($words[1], 0, 1);
            $hc_cod = strtoupper($output);
        }
        else{
            $hc_cod = strtoupper(substr($patient->apellido, 0, 1));
        }

        $hc_cod .=  strtoupper(substr($patient->nombre, 0, 1)) . '-';
        if($patient->fecha_nac->day < 10){
            $hc_cod .= '0';
        }

        $hc_cod .= $patient->fecha_nac->day;
        if($patient->fecha_nac->month < 10){
            $hc_cod .= '0';
        }
        $hc_cod .= $patient->fecha_nac->month . $patient->fecha_nac->year;
        return $hc_cod;
    }
    
    public function isWomanOldEnough(){
        return $this->sexo == 'Femenino' && $this->fecha_nac->age >= 15;
    }

    public function isElder(){
        return $this->fecha_nac->age >= 55;
    }
}
