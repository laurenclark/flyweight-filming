<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-T9QWJB"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T9QWJB');</script>
	<!-- End Google Tag Manager -->
	<?php do_action( 'Foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		<div class="off-canvas-wrapper">
			<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
				<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
			<?php endif; ?>

			<?php do_action( 'Foundationpress_layout_start' ); ?>

			<header id="masthead" class="site-header" role="banner">
				<div class="title-bar" data-responsive-toggle="site-navigation">
					<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
					<div class="title-bar-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img class="mobile-logo" src='<?php echo esc_url( get_theme_mod( 'Foundationpress_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></a>
					</div>
				</div>

				<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
					<div class="top-bar-left">
						<ul class="menu">
							<li class="home">
								<?php if ( get_theme_mod( 'Foundationpress_logo' ) ) : ?>
									<div class='site-logo'>
										<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'Foundationpress_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
									</div>
								<?php else : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>
							</li>
						</ul>
					</div>
					<div class="top-bar-right">
						<div class="top-bar-items">

							<span class="customer-log">
								<?php
								if ( is_user_logged_in() ) {
									echo '<a href="' .  home_url() . '/logout?redirect_to="/" "><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>';
								} else {
									echo '<a href="'. home_url() . '/customer-area/home/"><i class="fa fa-user"></i>&nbsp;Client Login</a>';
								}
								?>

							</span>
							<?php dynamic_sidebar('header-phone-number'); ?> 
						</div>
						<?php Foundationpress_top_bar_r(); ?>
						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
				</nav>
			</header>

			<?php do_action( 'Foundationpress_after_header' );
