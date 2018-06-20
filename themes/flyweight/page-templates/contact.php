<?php
/*
Template Name: Contact
*/
get_header(); ?>

<div id="page">
	<div class="medium-6 columns">
		<h3>Send a Message</h3>
		<hr>
		<?php echo do_shortcode('[contact-form-7 id="22" title="Contact form 1"]'); ?>
	</div>

	<div class="medium-6 columns">
		<h3>Company Information</h3>
		<hr>
		<br>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<?php do_action( 'Foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<?php do_action( 'Foundationpress_page_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'Foundationpress_page_after_comments' ); ?>
			</article>
		<?php endwhile;?>
	</div>
</div>

<?php get_footer() ?>