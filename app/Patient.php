<?php

namespace App;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    // To implement soft deleting
    use SoftDeletes;

    // Columns available to be edited by users
    protected $fillable = [
        'ci', 'emision', 'nombre', 'apellido', 'sexo', 'fecha_nac', 'lugar_nac', 'grado_instruccion',
        'estado_civil', 'ocupacion', 'grupo_sanguineo',
    ];

    // Casting dates to Carbon instances
    protected $dates = ['fecha_nac', 'created_at', 'updated_at', 'deleted_at'];

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
        $this->attributes['fecha_nac'] = Carbon::createFromFormat('d-m-Y' ,$date);
    }

    public function getFechaNacAttribute($date){
        setlocale(LC_TIME, 'es_BO.utf8');
        Carbon::setLocale('es');
        return Carbon::parse($date)->formatLocalized('%d %B %Y');
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

    public function contact(){
        return $this->hasOne('App\Contact');
    }

    // HELPERS
    public function codHistoria(Patient $patient){
        Date::setLocale('es');
        if(str_contains($patient->apellido, ' ')){
            $words = explode(" ", $patient->apellido);
            $output = substr($words[0], 0, 1) . substr($words[1], 0, 1);
            $hc_cod = strtoupper($output);
        }
        else{
            $hc_cod = strtoupper(substr($patient->apellido, 0, 1));
        }

        $hc_cod .=  strtoupper(substr($patient->nombre, 0, 1)) . '-';

        $date = Date::createFromFormat('d M Y', $patient->fecha_nac);

        if($date->day < 10){
            $hc_cod .= '0';
        }

        $hc_cod .= $date->day;
        if($date->month < 10){
            $hc_cod .= '0';
        }
        $hc_cod .= $date->month . $date->year;
        return $hc_cod;
    }

    public function isWomanOldEnough(){
        Date::setLocale('es');
        $date = Date::createFromFormat('d M Y', $this->fecha_nac);
        return $this->sexo == 'Femenino' && $date->age >= 15;
    }

    public function isElder(){
        Date::setLocale('es');
        $date = Date::createFromFormat('d M Y', $this->fecha_nac);
        return $date->age >= 55;
    }
}
