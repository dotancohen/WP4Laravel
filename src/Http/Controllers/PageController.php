<?php

namespace WP4Laravel\Http\Controllers;

use Illuminate\Http\Request;
use WP4Laravel\Models\Page;

/**
 * Catch all routes which are not defined in the routes file
 * Next search for a page which has the same url structure as the route
 * If not found,
 */
class PageController extends Controller
{
    public function index()
    {
        //	Get the homepage based on the id of the wp_options page_on_front attribute
        $post = Page::homepage();

        //	Add the homepage to the Site Container as a model
        //	This will make sure that all meta data will be available in the container .
        app('site')->model($post);

        return view($post->template, compact('post'));
    }

    /**
     * Show a page where his permalink matches the given url
     * @param  string $url
     * @return Response
     */
    public function show(Request $request, $url)
    {
        //	Get the post by url or abort
        $post = Page::publishedOrPreview($request, $url);

        //	Add post data to the site container
        app('site')->model($post);
        //	Show the template which is possibly chosen in WP

        if ($post->parent) {
            app('site')->set('parent', $post->parent);
        }

        return view($post->template, compact('post'));
    }
}
