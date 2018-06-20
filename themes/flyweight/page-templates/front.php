<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<div class="caption">
	<h2 class="caption-text-title animated fadeInRight"><?php the_field('video_caption_title') ?></h2><br>
	<div class="caption-text animated fadeInRight">
		<p><?php the_field('video_caption_text') ?></p>
	</div>
</div>
<video id="homepageVid" poster="<?php the_field('video_fallback-image'); ?>" autoplay>
	<source src=" <?php the_field('embdedd_video_mp4'); ?>" type="video/mp4"/>
		<source src="<?php the_field('embdedd_video_webm'); ?>" type="video/mp4"/>
			<source src="<?php the_field('embdedd_video_ogg'); ?>" type="video/mp4"/>
				<img src="<?php the_field('video_fallback-image'); ?>" alt="Not Supported">
			</video>

			<div class="intro-bar-alt">
				<div class="row">
					<div class="large-12 columns">
						<p class="lead"><?php the_field('intro'); ?></p>
						<div class="large button-group large-4 large-offset-4">
							<a class="secondary hollow button expanded" href="<?php the_field('intro_button_internal_link'); ?>">
								<?php the_field('cta_button_icon');?>&nbsp;<?php the_field('cta_text'); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="content-bar">
				<div class="row">
					<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 1
						);

					$reference = new WP_Query( $args ); 
					?>

					<?php  if ( have_posts() ) : while ( $reference->have_posts() ) : $reference->the_post(); ?>
						<div class="large-6 columns">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="large-6 columns">
							<h3>Latest Blog</h3>
							<h4><?php the_title(); ?></h4>
							<small><?php Foundationpress_entry_meta(); ?></small>
							<?php the_excerpt(); ?>
							<a class="primary hollow button large" href="<?php the_permalink(); ?>">Read More...</a>
						<?php endwhile; endif; wp_reset_postdata(); ?>
						<?php /* End Loop */ ?>
					</div>
				</div>
			</div>

			<div class="intro-bar">
				<div class="row">
					<div class="large-6 columns">
						<?php the_field('left_content_box'); ?>
					</div>
					<div class="large-6 columns">
						<?php the_field('right_content_box'); ?>
					</div>
				</div>
			</div>
			<div class="parallax-window" data-speed="0.5" data-parallax="scroll" data-image-src="<?php the_field('content_block_image_1'); ?>">		
			</div>
			<div class="content-bar-alt">
				<div class="row">
					<div class="large-12 columns">
						<?php the_field('content_block_text_1'); ?>
					</div>
				</div>
			</div>
			<div class="parallax-window" data-speed="0.5" data-parallax="scroll" data-image-src="<?php the_field('content_block_image_2'); ?>">
			</div>
			<div class="content-bar-alt">
				<div class="row">
					<div class="large-12 columns">
						<?php the_field('content_block_text_2') ?>
					</div>
				</div>
			</div>
			<div class="parallax-window" data-speed="0.5" data-parallax="scroll" data-image-src="<?php the_field('content_block_image_3'); ?>">
			</div>
			<div class="content-bar-alt">
				<div class="row">
					<div class="large-12 columns">
						<?php the_field('content_block_text_3'); ?>
					</div>
				</div>
			</div>


			<?php get_footer();
