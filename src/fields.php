<?php

add_action('acf/settings/show_admin', '__return_false');

add_filter('acf/format_value', function ($value, $post_id, $field) {
    return empty($value) ? null : $value;
}, 100, 3);

add_action('acf/init', function () {

    $page_screen = [ 'param' => 'post_type', 'operator' => '==', 'value' => 'page' ];
    $homepage_screen = [ 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ];

    acf_add_local_field_group([
        'key' => 'group-image-grid',
        'title' => 'Image Grid',
        'fields' => [
            [
                'key' => 'image_grid',
                'label' => 'Image Grid',
                'name' => 'image_grid',
                'type' => 'repeater',
                'collapsed' => 'heading',
                'layout' => 'block',
                'button_label' => 'Add Image',
                'sub_fields' => [
                    [
                        'key' => 'image_grid_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image'
                    ],
                    [
                        'key' => 'image_grid_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text'
                    ],
                    [
                        'key' => 'image_grid_hyperlink',
                        'label' => 'Hyperlink',
                        'name' => 'hyperlink',
                        'type' => 'text'
                    ]
                ],
            ],
        ],
        'location' => [[$page_screen, $homepage_screen]]
    ]);

    acf_add_local_field_group([
        'key' => 'group-quote',
        'title' => 'Quote',
        'fields' => [
            [
                'key' => 'quote',
                'name' => 'quote',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'quote_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image'
                    ],
                    [
                        'key' => 'quote_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea'
                    ],
                    [
                        'key' => 'quote_author',
                        'label' => 'Author',
                        'name' => 'author',
                        'type' => 'text'
                    ],
                ]
            ]
        ],
        'location' => [[$page_screen, $homepage_screen]]
    ]);

});