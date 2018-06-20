<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

?>

<footer id="footer">
	<?php do_action( 'Foundationpress_before_footer' ); ?>
	<?php dynamic_sidebar( 'footer-widgets' ); ?>
	<?php do_action( 'Foundationpress_after_footer' ); ?>
	<div class="row">
		<div class="large-3 small-6 columns">
			<h4>Services</h4>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-left' ) ); ?>
			<br>
		</div>
		<div class="large-3 small-6 columns">
			<h4>Company</h4>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-mid' ) ); ?>
			<br>
		</div>
		<div class="large-6 small-12 columns">
			<?php echo do_shortcode( '[mc4wp_form id="129"]' ); ?>
		</div>
	</div>
	<div class="row text-center">
		<?php dynamic_sidebar('social-icons'); ?>

	</div>
	<small style="text-align: center;display:block;">&copy; 2016 After Me Information Services</small>
</footer>


<?php do_action( 'Foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'Foundationpress_before_closing_body' ); ?>
</body>
</html>
