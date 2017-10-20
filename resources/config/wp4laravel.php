<?php

return [

    /*
    |--------------------------------------------------------------------------
    |   Database settings
    |--------------------------------------------------------------------------
    |
    |   Define the database connection to use by WP4Laravel.
    |   If you don't have any other normal Laravel models, just use the default connection
    |   If you do, create a new mysql connection, rename it and set it below
    |
    */
    'db_connection' => env('DB_CONNECTION', 'mysql')
    'db_prefix' => env('DB_PREFIX', 'wp_'),

    /*
    |--------------------------------------------------------------------------
    |   Register your post types
    |--------------------------------------------------------------------------
    |
    |   When you register your post types, you can connect your own models
    |   Don't forget to connect a routename to your post name
    |   This is for the preview function of Wordpress and automatic url generation
    |
    */
    'post_types' => [
        'page' => [
            'model' => \WP4Laravel\Models\Page::class,
            'route' => 'page.show',
        ],

        'post' => [
            'post' => \WP4Laravel\Models\Post::class,
            'route' => 'post.show',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Registered Shortcodes
    |--------------------------------------------------------------------------
    |
    | With WP4Laravel you can register as many shortcodes you want, but that's
    | usually made in runtime. Here it's the place to set all your custom
    | shortcodes to make WP4Laravel registering all of them automatically. Just
    | create your own shortcode class implementing `Corcel\Shortcode` interface.
    |
    */
    'shortcodes' => [
//        'foo' => App\Shortcodes\FooShortcode::class,
    ],


];
