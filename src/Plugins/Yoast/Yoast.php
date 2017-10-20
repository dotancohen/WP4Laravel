<?php

namespace WP4Laravel\Plugins\Yoast;

use WP4Laravel\Models\Post;

class Yoast
{
    protected $model;
    protected $attributes = [];


    public function __construct(Post $model)
    {
        $this->model = $model;

        if (method_exists($model, "toYoastArray")) {
            $this->attributes = $model->toYoastArray();
        }
    }


    public function all()
    {
        return collect($this->attributes);
    }


    public function __get($attr)
    {
        if (array_key_exists($attr, $this->attributes)) {
            return $this->attributes[$attr];
        }

        return null;
    }
}
