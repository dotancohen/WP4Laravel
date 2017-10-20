@if (!empty($post))
    <title>{{ $post->yoast->title }} - {{ config('app.name') }}</title>
	<meta name="robots" content="{{ $post->yoast->noindex ? 'noindex' : 'index' }},{{ $post->yoast->nofollow ? 'nofollow' : 'follow' }}"/>

	<meta name="description" content="{{ $post->yoast->description }}"/>
	<meta property="og:locale" content="{{ app()->getLocale() }}" />
	<meta property="og:type" content="{{ $post->yoast->type ?: 'website' }}" />
	<meta property="og:title" content="{{ $post->yoast->title }}" />
	<meta property="og:description" content="{{ $post->yoast->description }}" />

	<meta property="og:site_name" content="{{ config('app.name') }}" />

	<meta property="og:image" content="{{ $post->yoast->image ?: url('share.jpg') }}" />

	<meta name="twitter:card" content="summary_large_image"/>
	<meta name="twitter:description" content="{{ $post->yoast->twitter_description ?: $post->yoast->description }}"/>
	<meta name="twitter:title" content="{{ $post->yoast->twitter_title ?: $post->yoast->title }}"/>
	<meta name="twitter:image" content="{{ $post->yoast->twitter_image ? $post->yoast->twitter_image : url('share.jpg') }}" />
@else
    <title>{{ config('app.name') }}</title>
@endif
