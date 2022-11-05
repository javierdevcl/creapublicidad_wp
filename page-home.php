<?php
/**
 * Template Name: Inicio
 * Description: A Page Template with a darker design.
 */

// Code to display Page goes here...

use Timber\Timber;

$context = Timber::context();
$context['post'] = new TimberPost();

$tax_query[] = array (
	'taxonomy' => 'product_visibility', // Does a meta query on product visibility
	'field'    => 'name',
	'terms'    => 'featured', // Makes sure we grab all products flagged as featured
	'operator' => 'IN',
);
$top_selling = [ 'post_type' => 'product', 'posts_per_page' => 7, 'tax_query' => $tax_query, 'post_status' => 'publish' ];
$context['top_selling'] =  Timber::get_posts($top_selling);
$context['category'] = Timber::get_terms('product_cat');

Timber::render('index.twig', $context);
