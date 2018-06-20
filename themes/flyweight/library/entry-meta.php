<?php
/**
 * Entry meta information for posts
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

if ( ! function_exists( 'Foundationpress_entry_meta' ) ) :
	function Foundationpress_entry_meta() {
		echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'Posted on %s ', 'Foundationpress' ), get_the_date(), get_the_time() ) . '</time><span>' . __( 'by', 'Foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></span>';
	}
	endif;
