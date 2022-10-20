<?php

use Timber\Timber;

$context = Timber::context();
$context['post'] = new TimberPost();

$top_selling = [ 'post_type' => 'product', 'posts_per_page' => 4, 'post_status' => 'publish' ];
$context['top_selling'] =  Timber::get_posts    ($top_selling);

Timber::render('index.twig', $context);