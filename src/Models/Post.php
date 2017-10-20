<?php

namespace WP4Laravel\Models;

use WP4Laravel\Helpers\Wpautop;

use WP4Laravel\Helpers\PreviewTrait;
use WP4Laravel\Helpers\ViewTrait;
use WP4Laravel\Plugins\Yoast\YoastTrait;

class Post extends \Corcel\Model\Post
{
    use ViewTrait, YoastTrait, PreviewTrait;

    protected $postType = 'post';

    public function getContentAttribute()
    {
        $content = parent::getContentAttribute();

        return Wpautop::format($content);
    }


    public static function current($slug)
    {
        return static::published()
                ->slug($slug)
                ->firstOrFail();
    }
}
