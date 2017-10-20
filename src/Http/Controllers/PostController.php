<?php

namespace WP4Laravel\Http\Controllers;

use Illuminate\Http\Request;
use WP4Laravel\Models\Page;

/**
 * Post controller
 */

class PostController extends Controller
{
    /**
     * Show all news
     * @return Response
     */
    public function index(Request $request)
    {
        $post = Page::url($request->path());

        app('site')->model($post);

        //	Create the query builder for selecting items
        $builder = Post::published()->orderBy('post_date', 'desc');

        //	Get all posts with category and paginate it on 9
        $records = $builder->paginate(10);

        return view($post->template, compact('post', 'records'));
    }

    /**
     * Show news item
     * @param  string $slug
     * @return Response
     */

    public function show(Request $request, $slug)
    {
        //	Check if post exists, if not, show 404.
        $post = News::publishedOrPreview($request, $slug);

        //	Set the link to the page above
        app('site')->set('parent', ['url'=>'', 'title'=>"Nieuws"]);

        //	Set page title
        app('site')->model($post);

        //	Return the view
        return view($post->template, compact('post'));
    }
}
