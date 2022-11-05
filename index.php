<?php

use Timber\Timber;

$context = Timber::context();
$context['post'] = new TimberPost();

$top_selling = [ 'post_type' => 'product', 'posts_per_page' => 7, 'post_status' => 'publish' ];
$context['top_selling'] =  Timber::get_posts($top_selling);
$context['category'] = Timber::get_terms('product_cat');

Timber::render('index.twig', $context);
