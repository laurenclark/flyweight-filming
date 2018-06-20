<?php
/**
 * Template part for off canvas menu
 *
 * @package Foundationpress
 * @since Foundationpress 1.0.0
 */

?>

<nav class="off-canvas position-left" id="mobile-menu" data-off-canvas data-position="left" role="navigation">

	<?php Foundationpress_mobile_nav(); ?>
	<ul class="custom-menu-items">
		<li><a href="<?php echo home_url(); ?>/customer-area/home/"><i class="fa fa-user"></i>&nbsp;Client Login</a>
		</li>
		<li><?php dynamic_sidebar('header-phone-number'); ?> </li>
	</ul>

</nav>

<div class="off-canvas-content" data-off-canvas-content>
