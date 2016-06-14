<?php

namespace Api\Formatters;

class ContactTransformer extends Transformer{

    public function transform($contact){
        return [
            'identificador_usuario' => (int) $contact['user_id'],
            'identificador_paciente' => (int) $contact['patient_id'],
            'identificador_contacto' => (int) $contact['id'],
            'nombres' => $contact['name'],
            'apellidos' => $contact['lastname'],
            'relacion_parentesco' => $contact['relationship'],
            'telefono' => $contact['phone'],
        ];
    }
}
