<?php

namespace Api\Formatters;

class ControlTransformer extends Transformer{

    public function transform($control){
        $array_a = [
            'identificador_usuario' => (int) $control['user_id'],
            'identificador_paciente' => (int) $control['patient_id'],
            'identificador_control' => (int) $control['id'],
            'tipo_control' => $control['control_type']
        ];
        if($control->control_type == 'Vacunacion'){
            return array_merge($array_a, array(
                'vacuna' => $control['vaccine'],
                'via_administracion' => $control['via'],
                'dosis' => $control['dosis']
            ));
        }
        else if($control->control_type == 'Crecimiento'){
            return array_merge($array_a, array(
                'peso' => $control['weight'],
                'altura' => $control['height']
            ));
        }
        else if($control->control_type == 'Triaje'){
            return array_merge($array_a, array(
                'temperatura' => $control['temperature'],
                'frecuencia_cardiaca' => $control['heart_rate'],
                'sistole' => $control['sistole'],
                'diastole' => $control['diastole']
            ));
        }
        else if($control->control_type == 'Ginecologico'){
            return array_merge($array_a, array(
                'ultima_menstruacion' => $control['last_menst'],
                'ultima_mamografia' => $control['last_mamo'],
                'vida_sexual' => (boolean) $control['sex_act'],
                'ultimo_papanicolau' => $control['last_papa']
            ));
        }
        else if($control->control_type == 'Geriatrico'){
            return array_merge($array_a, array(
                'tipo_valoracion' => $control['geriatric_type'],
                'descripcion' => $control['notes']
            ));
        }

    }
}
