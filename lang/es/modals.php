<?php

return [
    'kit' => [
        'destroy' => [
            'title' => '¿Eliminar este conjunto de hojas de trabajo?',
            'text' => '<p>Se eliminarán todas las hojas de trabajo existentes y sus ejemplos relacionados.</p>',
            'submit' => 'Eliminar conjunto',
        ],
        'update' => [
            'title' => '¿Guardar cambios y crear nuevas hojas de trabajo?',
            'text' => '<p>Se eliminarán todas las hojas de trabajo existentes y sus ejemplos relacionados, y se crearán nuevas hojas de trabajo con nuevos ejemplos según la especificación.</p><p>Se generarán nuevas direcciones URL para las hojas de trabajo: las direcciones URL anteriores dejarán de funcionar.</p>',
            'submit' => 'Editar conjunto',
        ],
    ],
    'sheet' => [
        'check' => [
            'title' => '¿Has revisado todos los resultados?',
            'text' => '<p>La hoja de trabajo se enviará al profesor para su evaluación. Una vez enviada, no se podrá modificar.</p>',
            'submit' => 'Enviar a revisión',
        ],
    ]
];
