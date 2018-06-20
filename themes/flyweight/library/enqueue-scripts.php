<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

if ( ! function_exists( 'Foundationpress_scripts' ) ) :
	function Foundationpress_scripts() {

	// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.6.1', 'all' );

		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro:300,400,400italic,600,300italic');

		// wp_enqueue_style('animateCss', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css');
	// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );

	// If you'd like to cherry-pick the foundation components you need in your project, head over to gulpfile.js and see lines 35-54.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '2.6.1', true );

	// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'Foundationpress_scripts' );
	//Fix Icon Button Bug 
	function load_custom_wp_admin_style() {
		wp_enqueue_script('icon-fix', get_template_directory_uri() . '/assets/javascript/icon-fix.js', array('jquery'), '2.6.1', true ) ;
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
	endif;
