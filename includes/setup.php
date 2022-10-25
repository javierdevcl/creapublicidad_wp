<?php

use Timber\Site;
use Timber\Timber;
use Timber\Menu;

$timber = new Timber;

class Theme extends Site
{
    public function __construct()
    {
        add_action('init', array($this, 'add_menus'));
        add_action('after_setup_theme', array($this, 'theme_supports'));
        add_filter('timber/context', array($this, 'add_to_context'));
        add_filter('timber/twig', array($this, 'add_to_twig'));
		add_filter('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));

        parent::__construct();
    }

    public function add_menus()
    {
        register_nav_menu('main_menu', __('Menu principal'));
        register_nav_menu('footer_menu_1', __('Menu Footer 1'));
        register_nav_menu('footer_menu_2', __('Menu Footer 2'));
    }

    public function theme_supports()
    {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );
        add_theme_support( 'menus' );
    }

    public function add_to_context($context)
    {
        $menu_slugs = ['main_menu', 'footer_menu_1', 'footer_menu_2'];

        foreach ($menu_slugs as $menu_slug) {
            $context[$menu_slug] = new Menu($menu_slug);
        }

        if (function_exists('get_fields')) {
            $context['options'] = get_fields('option');
        }
        $context['custom_logo_url'] = wp_get_attachment_image_url(get_theme_mod('custom_logo'),'full');

        return $context;
    }

    public function add_to_twig( $twig )
    {
        $twig->addExtension( new Twig\Extension\StringLoaderExtension() );
        return $twig;
    }

	public function wp_enqueue_scripts()
	{
 		wp_enqueue_style( 'bathe-main', get_theme_file_uri( 'assets/css/main.css' ) );
		wp_enqueue_style( 'tailwind-main', get_stylesheet_directory_uri() . '/assets/css/tailwind.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/tailwind.css' ) );

		wp_enqueue_script('bathe-bundle', get_theme_file_uri('/assets/js/main.js'), array(), filemtime(get_theme_file_path('/assets/js/main.js')));

		//wp_enqueue_script( 'bathe-bundle', get_theme_file_uri( 'assets/js/main.js' ), array(), null, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}

new Theme();
