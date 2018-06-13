<?php

define('SIDURI_THEME_PATH', get_template_directory() );
define('SIDURI_THEME_URL', get_template_directory_uri() );
define('SIDURI_THEME_VERISON', '0.0.2' );


function siduri_setup(){
	add_theme_support( "title-tag" ) ;
	add_theme_support( "post-thumbnails" );

	add_editor_style();

}
add_action( 'after_setup_theme', 'siduri_setup' );


/**
 * Enqueue Theme Styles
 */
function siduri_enqueue_styles() {

	if (!is_admin()) {

		wp_enqueue_style( 'siduri-style', SIDURI_THEME_URL . '/css/style.css', array(), SIDURI_THEME_VERISON);
		// Global CSS for the page and tiles
		wp_enqueue_style( 'siduri-main', SIDURI_THEME_URL . '/css/main.css', array(), SIDURI_THEME_VERISON);

		wp_enqueue_style( 'siduri', get_stylesheet_uri(), array(), SIDURI_THEME_VERISON);

	}

}
add_action( 'wp_enqueue_scripts', 'siduri_enqueue_styles' );




/**
 * Enqueue Theme Scripts
*/
function siduri_enqueue_scripts() {

	// Comment reply script for threaded comments
	if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (!is_admin()) {
		//wp_enqueue_script( 'cronista-bootstrap', SIDURI_THEME_URL . '/assets/js/bootstrap.min.js',  array( 'jquery' ), SIDURI_THEME_VERISON, true );



		// ----wookmark-scripts---->
		wp_enqueue_script( 'siduri-images', SIDURI_THEME_URL . '/js/jquery.imagesloaded.js',  array('jquery'), SIDURI_THEME_VERISON, true );
		wp_enqueue_script( 'siduri-wookmark', SIDURI_THEME_URL . '/js/jquery.wookmark.js',  array('jquery'), SIDURI_THEME_VERISON, true );

		wp_enqueue_script( 'siduri', SIDURI_THEME_URL . '/js/siduri.js',  array('jquery'), SIDURI_THEME_VERISON, true );


	}




}
add_action( 'wp_enqueue_scripts', 'siduri_enqueue_scripts');
