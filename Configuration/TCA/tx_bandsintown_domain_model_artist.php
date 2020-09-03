<?php

$languageFile = 'LLL:EXT:bandsintown/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $languageFile . 'artist',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:bandsintown/Resources/Public/Icons/artist.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, name, slug, id, url, image_url, thumb_url, facebook_page_url, mbid, tracker_count'],
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
        'name' => [
            'exclude' => false,
            'label' => $languageFile . 'artist.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'slug' => [
            'exclude' => false,
            'label' => $languageFile . 'artist.slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['name'],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
            ]
        ],
        'id' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.id',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'readOnly' => true,
            ]
        ],
        'url' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'image_url' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.image_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'thumb_url' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.thumb_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'facebook_page_url' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.facebook_page_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'mbid' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.mbid',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'tracker_count' => [
            'exclude' => true,
            'label' => $languageFile . 'artist.tracker_count',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'readOnly' => true,
            ]
        ],

    ],
];
