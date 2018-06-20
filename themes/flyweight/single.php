<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

get_header(); ?>
<div class="spacer"></div>
<div id="single-post" role="main">

	<?php do_action( 'Foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php Foundationpress_entry_meta(); ?>
			</header>
			<?php do_action( 'Foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif;
				?>
				<?php the_content(); ?>
			</div>
			<div>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'Foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</div>
			<?php do_action( 'Foundationpress_post_before_comments' ); ?>
			<br>
			<hr>
			<?php comments_template(); ?>
			<?php do_action( 'Foundationpress_post_after_comments' ); ?>
		</article>
	<?php endwhile;?>

	<?php do_action( 'Foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>
</div>
<?php get_footer();
