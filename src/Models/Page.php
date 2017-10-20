<?php

namespace WP4Laravel\Models;

use WP4Laravel\Helpers\PageurlTrait;

/*
 * Model for WP pages
 */
class Page extends Post
{
    //	The UrlTrait has a method to find a page based on the full url.
    use PageurlTrait;

    /**
     * What is the WP post type for this model?
     * @var string
     */
    protected $postType = 'page';


    public static function current($slug)
    {
        return static::url($slug);
    }
}
