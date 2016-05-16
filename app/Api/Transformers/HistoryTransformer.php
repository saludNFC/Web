<?php

namespace Api\Transformers;
// use Api\Transformers\Transformer;

class HistoryTransformer extends Transformer{


    public function transform($history){
        return [
            'id_paciente' => $history['patient_id'],
            'id_usuario' => $history['user_id'],
            'tipo_antecedente' => $history['history_type'],

            // Familiar
            'grado_parentesco' => $history['grade'],
            'enfermedad' => $history['illness'],

            // Personal
            'tipo_personal' => $history['type_personal'],
            'descripcion' => $history['description'],

            // Medicamentos
            'medicamento' => $history['med'],
            'via_administracion' => $history['via'],
            'fecha_inicio' => $history['date_ini']
        ];
    }
}
