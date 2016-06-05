<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'alpha'                => ':attribute debe contener solo letras.',
    'alpha_dash'           => ':attribute pude contener solo letras, numeros y guiones.',
    'alpha_num'            => ':attribute puede contener solo letras y números.',
    'array'                => ':attribute debe ser un array.',
    'before'               => ':attribute debe ser una fecha antes de :date.',
    'between'              => [
        'numeric' => ':attribute debe estar entre :min and :max.',
        'file'    => ':attribute debe estar entre :min and :max kilobytes.',
        'string'  => ':attribute debe tener entre :min and :max letras.',
        'array'   => ':attribute debe tener :min and :max articulos.',
    ],
    'boolean'              => ':attribute debe ser verdadero o falso.',
    'confirmed'            => 'Confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no coincide con el formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits digitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max digitos.',
    'distinct'             => ':attribute tiene un valor que ya fue guardado.',
    'email'                => ':attribute debe ser una dirección de email valida.',
    'exists'               => ':attribute elegido es invalido.',
    'filled'               => ':attribute campo es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute seleccionado es invalido.',
    'in_array'             => ':attribute no está incluido en :other.',
    'integer'              => ':attribute debe ser un entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => ':attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no puede ser mayor a :max.',
        'file'    => ':attribute no puede ser mayor a :max kilobytes.',
        'string'  => ':attribute no puede tener mas que :max letras.',
        'array'   => ':attribute no puede tener mas de :max artículos.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute no puede ser menor a :min.',
        'file'    => ':attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe tener al menos :min letras.',
        'array'   => ':attribute debe tener al menos :min artículos.',
    ],
    'not_in'               => ':attribute seleccionado es inválido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => ':attribute debe estar presente.',
    'regex'                => ':attribute formator es inválido.',
    'required'             => ':attribute es un campo obligatorio.',
    'required_if'          => ':attribute es un campo requerido si :other es :value.',
    'required_unless'      => ':attribute es un campo requerido a menos que :other está en :values.',
    'required_with'        => ':attribute es un campo requerido cuando :values está presente.',
    'required_with_all'    => ':attribute es un campo requerido cuando :values están presentes.',
    'required_without'     => ':attribute es un campo requerido cuando :values no está presente.',
    'required_without_all' => ':attribute es un campo requerido cuando ninguno de :values están presentes.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute debe tener :size.',
        'file'    => ':attribute debe ser de :size kilobytes.',
        'string'  => ':attribute debe tener :size letras.',
        'array'   => ':attribute debe tener :size artículos.',
    ],
    'string'               => ':attribute debe ser una cadena de caracteres.',
    'timezone'             => ':attribute debe ser una zona válida.',
    'unique'               => 'El valor de :attribute ya ha sido tomado.',
    'url'                  => 'El formato de :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
