<?php

return [
    'modExtra' => [
        'file' => 'modextra',
        'description' => 'modExtra snippet to list items',
        'properties' => [
            'tpl' => [
                'type' => 'textfield',
                'value' => 'tpl.modExtra.item',
            ],
            'sortby' => [
                'type' => 'textfield',
                'value' => 'name',
            ],
            'sortdir' => [
                'type' => 'list',
                'options' => [
                    ['text' => 'ASC', 'value' => 'ASC'],
                    ['text' => 'DESC', 'value' => 'DESC'],
                ],
                'value' => 'ASC',
            ],
            'limit' => [
                'type' => 'numberfield',
                'value' => 10,
            ],
            'outputSeparator' => [
                'type' => 'textfield',
                'value' => "\n",
            ],
            'toPlaceholder' => [
                'type' => 'combo-boolean',
                'value' => false,
            ],
        ],
    ],
];