<?php

$fields = [
    [
        'name' => 'usuario.nome',
        'description' => 'Nome',
        'type' => 'varchar'
    ],
    [
        'name' => 'usuario.email',
        'description' => 'E-mail',
        'type' => 'varchar'
    ],
    [
        'name' => 'usuario.status',
        'description' => 'Status',
        'type' => 'list'
    ],
    [
        'name'=> 'usuario.days',
        'description' => 'Dias',
        'type' => 'int'
    ],
    [
        'name' => 'usuario.lang',
        'description' => 'Language',
        'type' => 'list'
    ],
    [
        'name' => 'usuario.country',
        'description' => 'País',
        'type' => 'list'
    ]
];

echo json_encode($fields);
