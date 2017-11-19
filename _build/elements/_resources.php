<?php

return [
    'web' => [
        'index' => [
            'pagetitle' => 'Home',
            'template' => 1,
            'hidemenu' => false,
        ],
        'service' => [
            'pagetitle' => 'Service',
            'template' => 0,
            'hidemenu' => true,
            'published' => false,
            'resources' => [
                '404' => [
                    'pagetitle' => '404',
                    'template' => 1,
                    'hidemenu' => true,
                    'uri' => '404',
                    'uri_override' => true,
                ],
                'sitemap.xml' => [
                    'pagetitle' => 'Sitemap',
                    'template' => 0,
                    'hidemenu' => true,
                    'uri' => 'sitemap.xml',
                    'uri_override' => true,
                ],
            ],
        ],
    ],
];