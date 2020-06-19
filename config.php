<?php

return [
    'package' => [
        'module' => 'AutoPop',
        'version' => '1.0',
    ],
    'compiler' => [
        'js' => [
            // Module Name
            'lightningsdk/autopop' => [
                // Source file => Dest file
                'AutoPop.js' => 'site.min.js',
            ]
        ],
    ],
    'modules' => [
        'page-init' => [
            lightningsdk\autopop\Loaders\AutoPop::class,
        ],
        'autopop' => [
            'exclude' => [
                '^/?admin/'
            ],
            'popup' => [
                'delay' => 30,
                'url' => '/autopop',
                'norepeat' => true,
            ],
        ],
    ],
    'routes' => [
        'static' => [
            'autopop' => lightningsdk\autopop\Pages\AutoPop::class
        ]
    ]
];
