<?php
/**
 * Register widget areas
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

if ( ! function_exists( 'Foundationpress_sidebar_widgets' ) ) :
	function Foundationpress_sidebar_widgets() {
		register_sidebar(array(
			'id' => 'sidebar-widgets',
			'name' => __( 'Sidebar widgets', 'Foundationpress' ),
			'description' => __( 'Drag widgets to this sidebar container.', 'Foundationpress' ),
			'before_widget' => '<article id="%1$s" class="widget %2$s">',
			'after_widget' => '</article>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
			));
		
		register_sidebar(array(
			'id' => 'header-phone-number',
			'name' => __( 'Header Details', 'Foundationpress' ),
			'description' => __( 'Drag widgets to this footer container', 'Foundationpress' ),
			'before_widget' => '',
			'after_widget' => '',
			));
		register_sidebar(array(
			'id' => 'social-icons',
			'name' => __( 'Social Icons', 'Foundationpress' ),
			'description' => __( 'Drag widgets to this footer container', 'Foundationpress' ),
			'before_widget' => '<div class="social-icons">',
			'after_widget' => '</div>',
			));
	}

	add_action( 'widgets_init', 'Foundationpress_sidebar_widgets' );
	endif;
