<?php
/**
 * Theme functions and definitions.
 *
 * @package ag-theme
 */

if ( ! function_exists( 'ag_theme_setup' ) ) {
	
	function ag_theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 120,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'automatic-feed-links' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'ag-theme' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'ag_theme_setup' );

if ( ! function_exists( 'ag_theme_enqueue_assets' ) ) {
	
	function ag_theme_enqueue_assets() {
		wp_enqueue_style(
			'ag-theme-style',
			get_stylesheet_uri(),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ag_theme_enqueue_assets' );

if ( ! function_exists( 'ag_theme_excerpt_more' ) ) {
	
	function ag_theme_excerpt_more( $more ) {
		return '…';
	}
}
add_filter( 'excerpt_more', 'ag_theme_excerpt_more' );

if ( ! function_exists( 'ag_theme_image_sizes' ) ) {
	
	function ag_theme_image_sizes() {
		add_image_size( 'ag-theme-card', 960, 640, true );
	}
}
add_action( 'after_setup_theme', 'ag_theme_image_sizes' );
