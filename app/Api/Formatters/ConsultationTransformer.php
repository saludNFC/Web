<?php

namespace Api\Formatters;

class ConsultationTransformer extends Transformer{

    public function transform($consultation){
        return [
            'identificador_usuario' => (int) $consultation['user_id'],
            'identificador_paciente' => (int) $consultation['patient_id'],
            'identificador_consulta' => (int) $consultation['id'],
            'anamnesis' => $consultation['anamnesis'],
            'examen_físico' => $consultation['physical_exam'],
            'diagnostico' => $consultation['diagnosis'],
            'tratamiento' => $consultation['treatment'],
            'justificacion' => $consultation['justification']
        ];
    }
}
