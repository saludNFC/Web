<?php

namespace Api\Formatters;

class PatientTransformer extends Transformer{

    public function transform($patient){
        return [
            'identificador_usuario' => $patient['user_id'],
            'identificador_paciente' => $patient['id'],
            'historia_clinica' => $patient['historia'],
            'ci' => $patient['ci'],
            'emision' => $patient['emision'],
            'nombre' => $patient['nombre'],
            'apellido' => $patient['apellido'],
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
