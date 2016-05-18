<?php

namespace Api\Formatters;

class HistoryTransformer extends Transformer{

    public function transform($history){
        $array_a = [
            'identificador_usuario' => (int) $history['user_id'],
            'identificador_antecedente' => (int) $history['id'],
            'identificador_paciente' => (int) $history['patient_id'],
            'tipo_antecedente' => $history['history_type']
        ];
        if($history->history_type == 'Personal'){
            return array_merge($array_a, array(
                'tipo_personal' => $history['type_personal'],
                'descripcion' => $history['description']
            ));
        }
        else if($history->history_type == 'Familiar'){
            return array_merge($array_a, array(
                'grado_parentesco' => $history['grade'],
                'enfermedad' => $history['illness']
            ));
        }
        else if($history->history_type == 'Medicamentos'){
            return array_merge($array_a, array(
                'medicamento' => $history['med'],
                'via_administracion' => $history['via'],
                'fecha_inicio' => $history['date_ini']
            ));
        }

    }
}
