<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Bandsintown',
    'description' => 'Embed artist and event data from bandsintown on your TYPO3 website.',
    'category' => 'plugin',
    'author' => 'Christian Fries',
    'author_email' => 'hello@christian-fries.ch',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
