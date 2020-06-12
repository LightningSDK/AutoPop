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
];
