<?php

return [
    'plugin' => [
        'name' => 'Schriftarten',
        'description' => 'Schriftart-Verwaltung für OctoberCMS',
        'menu_item' => 'Schriftarten',
    ],
    'permissions' => [
        'tab' => 'Schriftarten',
        'fonts_manage' => 'Verwalten der Schriftarten',
    ],
    'backend' => [
        'settings' => [
            'general' => [
                'label' => 'Allgemein',
                'description' => 'Schriftarten verwalten',
                'hint' => [
                  'label' => 'Schriftarten direkt von Google Fonts importieren',
                  'comment' => 'Sie können Schriftarten bequem von Google Fonts importieren.',
                ],
            ],

            'fonts' => [
                'label' => 'Schriftarten',
                'description' => 'Schriftarten verwalten',
                'prompt' => 'Schriftart hinzufügen',

                'fields' => [
                    'font_name' => [
                        'label' => 'Schriftart',
                    ],
                    'font_type' => [
                        'label' => 'Dateityp',
                    ],
                    'font_file' => [
                        'label' => 'File',
                    ],
                    'font_face' => [
                        'label' => 'Font-Face',
                    ],

                    'tab_meta' => 'Allgemein',
                    'tab_code' => 'Code',
                ],

                'import' => [
                    'title' => 'Schriftarten importieren',
                    'cancel' => 'Abbrechen',
                    'submit' => 'Importieren',
                    'url' => [
                        'label' => 'URL',
                        'hint' => 'Eine URL zur Google Fonts API mit den gewünschten Schriftarten.',
                        'placeholder' => 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap',
                    ]
                ]
            ],
        ]
    ]
];
