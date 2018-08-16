<?php

add_action('rest_api_init', function () {

    $keys = [
        'focuskw',
        'title',
        'metadesc',
        'linkdex',
        'metakeywords',
        'meta-robots-noindex',
        'meta-robots-nofollow',
        'meta-robots-adv',
        'canonical',
        'redirect',
        'opengraph-title',
        'opengraph-description',
        'opengraph-image',
        'twitter-title',
        'twitter-description',
        'twitter-image',
    ];

    foreach (get_post_types(['show_in_rest' => true], 'object') as $type) {
        register_rest_field($type->name, 'yoast_wpseo', [
            'get_callback' => function ($object, $name, $request) use ($keys) {
                $return = [];
                foreach ($keys as $key) {
                    $return[str_replace('-', '_', $key)] = get_post_meta($object['id'], "_yoast_wpseo_{$key}", true);
                }
                return $return;
           }
        ]);
    }

});

add_action('rest_api_init', function () {
    register_rest_route('gatsby/v1', '/config', [
        'methods' => 'GET',
        'callback' => function ($data) {

            $data = [
                'id' => 1, // gatsby hack
                'name' => get_option('blogname'),
                'description' => get_option('blogdescription'),
                'per_page' => get_option('posts_per_page'),
                'front_page' => get_option('page_on_front'),
                'posts_page' => get_option('page_for_posts')
            ];

            $data = array_map(function ($item) {
                if (empty($item)) {
                    return null;
                }
                return is_numeric($item) ? (int)$item : $item;
            }, $data);

            return $data;
        },
    ]);
});
