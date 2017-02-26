<?php

return [
    'parent'=> 'parent_id',
    'primary_key' => 'id',
    'generate_url'   => true,
    'childNode' => 'child',
    'body' => [
        'id',
        'title',
    ],
    'html' => [
        'label' => 'title',
        'href'  => 'id'
    ],
    'dropdown' => [
        'prefix' => '',
        'label' => 'title',
        'value' => 'id'
    ]
];
