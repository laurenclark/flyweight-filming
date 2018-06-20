<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div id="page" role="main">

	<?php do_action( 'Foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action( 'Foundationpress_page_before_entry_content' ); ?>
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
	<?php get_sidebar(); ?>

</div>

<?php get_footer();
