<?php

namespace Api\Transformers;
// use Api\Transformers\Transformer;

class PatientTransformer extends Transformer{

    public function transform($patient){
        return [
            'historia_clinica' => $patient['historia'],
            'nombre' => $patient['nombre'],
            'apellido' => $patient['apellido'],
            'ci' => $patient['ci'],
            'emision' => $patient['emision'],
            'sexo' => $patient['sexo'],
            'fecha_nacimiento' => $patient['fecha_nac'],
            'lugar_nacimiento' => $patient['lugar_nac'],
            'grado_instruccion' => $patient['grado_instruccion'],
            'estado_civil' => $patient['estado_civil'],
            'ocupacion' => $patient['ocupacion'],
            'grupo_sanguineo' => $patient['grupo_sanguineo']
        ];
    }
}
