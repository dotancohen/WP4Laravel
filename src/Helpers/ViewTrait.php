<?php

namespace WP4Laravel\Helpers;

use View;
use Corcel\Model\Option;

trait ViewTrait
{
    /**
     * Get the path to the blade view based on
     * the selected template in the Wordpress admin
     * @return string
     */

    public function getViewAttribute()
    {
        $options = collect([
            $this->post_type.'.'.$this->slug,
            $this->post_type.'.show',
            'post.show',
        ]);

        //  If homepage
        if ($this->post_type == 'page' && $this->ID == Option::get('page_on_front')) {
            $options->prepend('page.home');
        }

        //  TODO: Get the view for a post types' archive page

        //	Check if the meta data where the
        //	defined template is saved
        //	if not, use the default template
        if ($this->meta->_wp_page_template) {
            $options->prepend($this->post_type.".".$this->meta->_wp_page_template);
        }

        foreach ($options as $item) {
            if (View::exists($item)) {
                return $item;
            }
        }

        return null;
    }
}
