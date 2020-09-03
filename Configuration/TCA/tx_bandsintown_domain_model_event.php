<?php

$languageFile = 'LLL:EXT:bandsintown/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $languageFile . 'event',
        'label' => 'venue_name',
        'label_alt' => 'venue_city, artist',
        'label_alt_force' => 1,
        'hideTable' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:bandsintown/Resources/Public/Icons/event.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'slug, id, url, on_sale_datetime, datetime, title, description, lineup, venue_name, venue_city, venue_region, venue_country, venue_latitude, venue_longitude, offer_type, offer_url, offer_status, artist'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'slug' => [
            'exclude' => false,
            'label' => $languageFile . 'event.slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['venue_name', 'venue_city', 'id'],
                    'fieldSeparator' => '-',
                    'replacements' => [
                        '/' => '',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
            ]
        ],
        'id' => [
            'exclude' => true,
            'label' => $languageFile . 'event.id',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required',
                'readOnly' => true,
            ]
        ],
        'url' => [
            'exclude' => true,
            'label' => $languageFile . 'event.url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'readOnly' => true,
            ],
        ],
        'on_sale_datetime' => [
            'exclude' => true,
            'label' => $languageFile . 'event.on_sale_datetime',
            'config' => [
                'dbType' => 'datetime',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime',
                'default' => null,
                'readOnly' => true,
            ],
        ],
        'datetime' => [
            'exclude' => true,
            'label' => $languageFile . 'event.datetime',
            'config' => [
                'dbType' => 'datetime',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime,required',
                'default' => null,
                'readOnly' => true,
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => $languageFile . 'event.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => $languageFile . 'event.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'readOnly' => true,
            ]
        ],
        'lineup' => [
            'exclude' => true,
            'label' => $languageFile . 'event.lineup',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'readOnly' => true,
            ]
        ],
        'venue_name' => [
            'exclude' => true,
            'label' => $languageFile . 'event.venue_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'readOnly' => true,
            ],
        ],
        'venue_city' => [
            'exclude' => true,
            'label' => $languageFile . 'event.venue_city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'readOnly' => true,
            ],
        ],
        'venue_region' => [
            'exclude' => true,
            'label' => $languageFile . 'event.venue_region',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'venue_country' => [
            'exclude' => true,
            'label' => $languageFile . 'event.venue_country',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'readOnly' => true,
            ],
        ],
        'venue_latitude' => [
            'exclude' => true,
            'label' => $languageFile . 'event.venue_latitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'readOnly' => true,
            ],
        ],
        'venue_longitude' => [
            'exclude' => true,
            'label' => $languageFile . 'event.venue_longitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'readOnly' => true,
            ],
        ],
        'offer_type' => [
            'exclude' => true,
            'label' => $languageFile . 'event.offer_type',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'offer_url' => [
            'exclude' => true,
            'label' => $languageFile . 'event.offer_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'offer_status' => [
            'exclude' => true,
            'label' => $languageFile . 'event.offer_status',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'artist' => [
            'exclude' => true,
            'label' => $languageFile . 'event.artist',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_bandsintown_domain_model_artist',
                'minitems' => 0,
                'maxitems' => 1,
                'readOnly' => true,
            ],
        ],

    ],
];
