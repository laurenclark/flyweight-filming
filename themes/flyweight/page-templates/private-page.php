<?php
/*
Template Name: Private Content
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div id="page-full-width" role="main">

	<?php do_action( 'Foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'Foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content large-10 large-centered columns" style="margin-top: 20px; margin-bottom: 100px;">
				<?php the_content(); ?>
			</div>
			<div>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'Foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</div>
		</article>
	<?php endwhile;?>

	<?php do_action( 'Foundationpress_after_content' ); ?>

</div>

<?php get_footer();
