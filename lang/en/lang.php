<?php

return [
    'plugin' => [
        'name' => 'Fonts',
        'description' => 'Font Management for OctoberCMS',
        'menu_item' => 'Fonts',
    ],
    'permissions' => [
        'tab' => 'Fonts',
        'fonts_manage' => 'Manage Fonts',
    ],
    'backend' => [
        'settings' => [
            'general' => [
                'label' => 'General',
                'description' => 'Manage Fonts',
                'hint' => [
                  'label' => 'Import Google Fonts',
                  'comment' => 'You can import fonts directly from Google Fonts..',
                ],
            ],

            'fonts' => [
                'label' => 'Fonts',
                'description' => 'Manage Fonts',
                'prompt' => 'Add Font',

                'fields' => [
                    'font_name' => [
                        'label' => 'Font',
                    ],
                    'font_type' => [
                        'label' => 'Filetype',
                    ],
                    'font_file' => [
                        'label' => 'File',
                    ],
                    'font_face' => [
                        'label' => 'Font-Face',
                    ],

                    'tab_meta' => 'General',
                    'tab_code' => 'Code',
                ],

                'import' => [
                    'title' => 'Import Fonts',
                    'cancel' => 'Cancel',
                    'submit' => 'Continue',
                    'url' => [
                        'label' => 'URL',
                        'hint' => 'A URL to the Google Fonts API with the desired fonts.',
                        'placeholder' => 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap',
                    ]
                ]
            ],
        ]
    ]
];
