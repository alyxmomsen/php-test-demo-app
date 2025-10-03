<?php

namespace settings\main;

$pages = [
    'home' => [
        'variates' => [
            '',
            'home',
            'main',
        ],
        'url' => './views/pages/home.page.php',
    ],
    'other' => [
        'variates' => [
            '/other',
            '/second'
        ],
        'url' => './views/pages/other.page.php',
    ],
    'mode' => [
        'default',
        'admin',
    ]
];
