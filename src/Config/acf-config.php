<?php

/**
 * This provides an example config for Advanced Custom Fields. It should be
 * edited if the project requires the use of ACF.
 */

return [
    [
        'key' => 'test_post_group',
        'title' => 'test post group',
        'fields' => [
            [
                'key' => 'test_post_field_1',
                'label' => 'The Label',
                'name' => 'the_name',
                'type' => 'text'
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ]
            ]
        ]
    ],
    [
        'key' => 'test_page_group',
        'title' => 'test page group',
        'fields' => [
            [
                'key' => 'test_page_field_1',
                'label' => 'The Label',
                'name' => 'the_name',
                'type' => 'text'
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ]
            ]
        ]
    ]
];
