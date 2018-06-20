<?php
	// If a feature image is set, get the id, so it can be injected as a css background property
if ( has_post_thumbnail( $post->ID ) ) :
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
$image = $image[0];
?>

<header class="parallax-window" data-speed="0.5" data-parallax="scroll" data-image-src="<?php echo $image ?>" id="featured-hero" data-role="banner">
</header>
<?php endif;
