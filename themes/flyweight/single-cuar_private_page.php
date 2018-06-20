<?php
/*
Template Name: Private page Single
*/
get_header(); ?>

<?php if (get_template_part( 'template-parts/featured-image' )): ?>
	<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php endif ?>

<div class="spacer"></div>

<div id="page-full-width" role="main">
	<div class="large-10 columns large-centered">
		<?php do_action( 'Foundationpress_before_content' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<div>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'Foundationpress' ), 'after' => '</p></nav>' ) ); ?>
					<p><?php the_tags(); ?></p>
				</div>
				<?php do_action( 'Foundationpress_page_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'Foundationpress_page_after_comments' ); ?>
			</article>
		<?php endwhile;?>

		<?php do_action( 'Foundationpress_after_content' ); ?>

	</div>
</div>
<?php get_footer();
