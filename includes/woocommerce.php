<?php

class WooCommerceTheme {
	/**
	 * Inits all hooks.
	 */
	public function init() {
		if ( class_exists( 'WooCommerce' ) ) {
			Timber\Integrations\WooCommerce\WooCommerce::init();
		}

		// Optional: Disable default WooCommerce image functionality.
		// Timber\Integrations\WooCommerce\WooCommerce::disable_woocommerce_images();

		add_action( 'after_setup_theme', [ $this, 'hooks' ] );
		add_action( 'after_setup_theme', [ $this, 'theme_support' ] );
	}

	/**
	 * Customize WooCommerce.
	 *
	 * Add your hooks to customize WooCommerce here.
	 *
	 * Everything here is hooked to `after_setup_theme`, because child theme functionality runs
	 * before parent theme functionality. By hooking it, we make sure it runs after all hooks in
	 * the parent theme were registered.
	 *
	 * @see plugins/woocommerce/includes/wc-template-hooks.php for a list of available actions.
	 */
	public function hooks() {
		remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10,0);
		remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10,0);
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10,0);
		remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10,0);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}

	/**
	 * Theme support.
	 */
	public function theme_support() {
		/**
		 * Add theme support for WooCommerce.
		 *
		 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-5
		 */
		add_theme_support( 'woocommerce' );

		// Optional.
		add_theme_support( 'wc-product-gallery-slider' );
	}
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function remove_image_zoom_support() {
	remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 6; // 4 related products
	return $args;
}

/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
	// Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['home'] = 'Imprenta';
	return $defaults;
}

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '<div class="separator-breadcrumb"> &gt; </div>';
	return $defaults;
}

/**
 * Disable WooCommerce block styles (front-end).
 */
function themesharbor_disable_woocommerce_block_styles() {
	wp_dequeue_style( 'wc-blocks-vendors' );
	wp_dequeue_style( 'wc-blocks-style' );
}
add_action( 'wp_enqueue_scripts', 'themesharbor_disable_woocommerce_block_styles' );


function wc_remove_image_effect_support() {

	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-lightbox' );

}

add_action( 'after_setup_theme', 'wc_remove_image_effect_support', 100 );

add_filter( 'woocommerce_single_product_image_thumbnail_html', 'custom_remove_product_link' );
function custom_remove_product_link( $html ) {
	return strip_tags( $html, '<div><img>' );
}

( new WooCommerceTheme() )->init();

