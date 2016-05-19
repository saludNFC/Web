<?php

namespace Api\Formatters;

class UserTransformer extends Transformer{

    public function transform($user){
        return [
            'identificador_usuario' => (int) $user['id'],
            'nombre' => $user['name'],
            'email' => $user['email'],
            // 'password' => $user['password'], SOLO QUERIA VER COMO MOSTRABA ESTO EN JSON :3
            'matricula_profesional' => $user['pro_registration'],
            'especialidad' => $user['specialty']
        ];
    }
}
