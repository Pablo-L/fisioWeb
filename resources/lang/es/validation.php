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

    'accepted' => 'El :attribute debe de estar aceptado.',
    'active_url' => ':attribute no es una URL válida',
    'after' => ':attribute debe de ser una fecha después de :date.',
    'after_or_equal' => 'La :attribute debe de ser una fecha igual o después de :date.',
    'alpha' => 'El :attribute sólo puede contener letras.',
    'alpha_dash' => 'El :attribute sólo puede contener letras, números, barras y guiones bajos.',
    'alpha_num' => 'El :attribute sólo puede contener letras y números.',
    'array' => 'El :attribute debe de ser un array.',
    'before' => 'La :attribute debe de ser una fecha anterior a :date.',
    'before_or_equal' => 'La :attribute debe de ser una fecha igual o anterior a :date.',
    'between' => [
        'numeric' => 'El :attribute debe de estar entre :min y :max.',
        'file' => 'El :attribute debe de pesar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe de tener entre :min y :max letras.',
        'array' => 'El :attribute debe de contener entre :min y :max objetos.',
    ],
    'boolean' => 'El :attribute debe de ser verdadero o falso.',
    'confirmed' => 'Las :attribute no coinciden.',
    'date' => 'La fecha :attribute no es válida.',
    'date_equals' => 'La fecha :attribute debe de ser una fecha cómo :date.',
    'date_format' => 'El :attribute no cumple el formato establecido :format.',
    'different' => 'El :attribute y :other deben de ser diferentes.',
    'digits' => 'El :attribute debe de tener :digits digitos.',
    'digits_between' => 'El :attribute debe de tener entre :min y :max digitos.',
    'dimensions' => 'La :attribute tiene un tamaño de imagen inválido',
    'distinct' => 'El campo de :attribute tiene un valor duplicado.',
    'email' => 'El :attribute tiene que ser una dirección de correo electrónico válida.',
    'ends_with' => 'El :attribute debe de terminar con uno de los siguientes valores: :values.',
    'exists' => 'El :attribute seleccionado es inválido',
    'file' => ':attribute debe de ser un fichero',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'El :attribute debe de ser más grande que :value.',
        'file' => 'El :attribute debe de pesar más de :value kilobytes.',
        'string' => 'El :attribute debe de tener más de :value caractéres.',
        'array' => 'El :attribute debe de tener más de :value objetos.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe de tener al menos el mismo valor que :value.',
        'file' => 'El :attribute debe de pesar al menos  :value kilobytes.',
        'string' => 'El :attribute debe de tener al menos :value letras.',
        'array' => 'El :attribute debe de tener al menos :value objetos.',
    ],
    'image' => ':attribute debe de ser una imagen.',
    'in' => 'El :attribute seleccionado es inválido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe de ser un número.',
    'ip' => 'El :attribute debe de ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe de ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe de ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe de ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe de ser menos de :value.',
        'file' => 'El :attribute debe de pesar menos de kilobytes.',
        'string' => 'El :attribute debe de ser más corto de :value caractéres.',
        'array' => 'TEl :attribute debe de contener menos de :value objetos.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe de ser como máximo de :value.',
        'file' => 'El :attribute debe de pesar como máximo :value kilobytes.',
        'string' => 'El :attribute debe de ser de largo como máximo :value caractéres.',
        'array' => 'El :attribute debe de contener como máximo :value objetos.',
    ],
    'max' => [
        'numeric' => 'El :attribute no debe de ser más grande que :max.',
        'file' => 'El :attribute no debe de ser más grande :max kilobytes.',
        'string' => 'El :attribute no debe de ser más largo que :max caractéres.',
        'array' => 'El :attribute no debe de contener más de :max objetos.',
    ],
    'mimes' => 'El :attribute debe de ser un archivo del tipo: :values.',
    'mimetypes' => 'El :attribute debe de ser un archivo del tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute debe de ser como mínimo :min.',
        'file' => 'El :attribute debe de pesar como mínimo :min kilobytes.',
        'string' => 'El :attribute debe de tener de largo como mínimo :min caractéres.',
        'array' => 'El :attribute debe de contener como mínimo :min objetos.',
    ],
    'multiple_of' => 'El :attribute debe de ser un múltiplo de :value',
    'not_in' => 'El :attribute seleccionado es inválido.',
    'not_regex' => 'El formato de :attribute es inválido.',
    'numeric' => ':attribute debe de ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo de :attribute no puede estar vacío.',
    'regex' => 'El formato de :attribute es inválido.',
    'required' => 'El campo de :attribute es obligatorio.',
    'required_if' => 'El campo de :attribute es obligatorio cuándo :other es :value.',
    'required_unless' => 'El campo de :attribute es obligatorio a no ser que :other sea :values.',
    'required_with' => 'El campo de :attribute es obligatorio cuándo :values está.',
    'required_with_all' => 'El campo de :attribute es obligatorio cuándo :values están.',
    'required_without' => 'El campo de :attribute es obligatorio cuándo :values no está.',
    'required_without_all' => 'El campo de :attribute es obligatorio cuándo ninguno de los siguientes: :values, está.',
    'same' => 'El :attribute y :other deben de coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe de ser :size.',
        'file' => 'El :attribute debe de pesar :size kilobytes.',
        'string' => 'El :attribute debe de tener :size caractéres.',
        'array' => 'El :attribute debe de contener :size objetos.',
    ],
    'starts_with' => 'El :attribute debe de comenzar con uno de los siguientes valores: :values.',
    'string' => 'El :attribute debe de ser una cadena de texto.',
    'timezone' => ':attribute debe de ser una zona horaria válida.',
    'unique' => 'El :attribute no está disponible.',
    'uploaded' => 'El :attribute no se ha podido cargar en el servidor.',
    'url' => 'El :attribute formato es inválido.',
    'uuid' => 'El :attribute debe de ser una UUID válida.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
