<?php

if ( ! function_exists( 'ag_theme_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since ag-theme 1.0.0
	 *
	 * @return void
	 */
	function ag_theme_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'title-tag', 'post-thumbnail', 'custom-logo' ) );
	}
endif;
add_action( 'after_setup_theme', 'ag_theme_post_format_setup' );




if ( ! function_exists( 'ag_theme_enqueue_styles' ) ) :
	/**
	 * Enqueues the theme stylesheet on the front.
	 *
	 * @since ag-theme 1.0.0
	 *
	 * @return void
	 */
	function ag_theme_enqueue_styles() {
        $suffix = is_rtl() ? '-rtl' : '';
		$src    = 'style' . $suffix . '.css';

		wp_enqueue_style(
			'ag-theme-style',
			get_parent_theme_file_uri( $src ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_style_add_data(
			'ag-theme-style',
			'path',
			get_parent_theme_file_path( $src )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'ag_theme_enqueue_styles' );

function register_all_menu(){
    register_nav_menus(
      array('top_menu' => 'Top Menu')
      );
 }