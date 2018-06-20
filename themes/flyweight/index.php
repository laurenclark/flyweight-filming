<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

get_header(); ?>

<div id="page" class="row expanded">

	<div class="large-12 columns text-center">
		<h1>&nbsp;Blog</h1>
		<hr>
	</div>
	<article class="main-content large-8 columns">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<div class="large-6 columns">
						<div class="custom-blog">
							<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
								<?php the_post_thumbnail(); ?>
								<div class="blog-content">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="entry-meta"><em><?php Foundationpress_entry_meta(); ?></em></div>
									<?php the_excerpt(); ?>
								</div>
								<div>
									<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
								</div>

							</div>
						</div>
					</div>
				</a>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists( 'Foundationpress_pagination' ) ) { Foundationpress_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'Foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'Foundationpress' ) ); ?></div>
			</nav>
			<?php } ?>

		</article>
		<?php get_sidebar(); ?>

	</div>

	<?php get_footer();
