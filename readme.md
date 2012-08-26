# [laravel-feed](http://roumen.me/projects/laravel-feed) bundle

Simple rss feed generator for Laravel.


## Installation

Install using the Artian CLI:

	php artisan bundle:install feed

then edit **application/bundles.php** to autoload messages:

```php
<?php

return array(

'feed' => array(
	'auto' => true
),

```

## Example


```php

Route::get('feed', function(){

    // creating rss feed with our most recent 20 posts
    $posts = DB::table('posts')->order_by('created', 'desc')->take(20)->get();

    $feed = new Feed();

    $feed->title = 'Your title';
    $feed->description = 'Your description';
    $feed->link = URL::to('feed');
    $feed->pubdate = $posts[0]->created;

    foreach ($posts as $post)
    {
        // title, author, url, pubdate, description
        $feed->add($post->title, $post->author, URL::to($post->url), $post->created, $post->description);
    }
    
    // options: 'rss', 'atom'
    return $feed->render('rss');
    
});

```