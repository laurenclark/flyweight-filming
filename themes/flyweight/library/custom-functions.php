<?php 
// ALLOW SVG
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// CHANGEABLE LOGO
function Foundationpress_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'Foundationpress_logo_section' , array(
		'title'       => __( 'Logo', 'Foundationpress' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
		) );
	$wp_customize->add_setting( 'Foundationpress_logo', array ( 'default' => '',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'Foundationpress_logo', array(
		'label'    => __( 'Logo', 'Foundationpress' ),
		'section'  => 'Foundationpress_logo_section',
		'settings' => 'Foundationpress_logo',
		) ) );
}
add_action( 'customize_register', 'Foundationpress_theme_customizer' );

//Disable sidebar?
function cuar_disable_default_sidebar( $is_enabled ) {
	return false;
}
$page_slugs = array('customer-conversations', 'customer-private-files', 'customer-private-pages');
foreach ($page_slugs as $page_slug) {
	add_filter( 'cuar/core/page/enable-default-sidebar?slug=' . $page_slug, 'cuar_disable_default_sidebar' );
}



//Services Sidebar
   /**
	* Creates a sidebar
	* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	*/
	$args = array(
		'name'          => __( 'Services', 'theme_text_domain' ),
		'id'            => 'services',
		'description' => __( 'Drag widgets to this sidebar container.', 'Foundationpress' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		);

	register_sidebar( $args );


//Logout redirect to home
	add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));

//Footer Menus
	function register_flyweight_menus() {
		register_nav_menus(
			array(
				'footer-left' => __( 'Footer Left Menu' ),
				'footer-mid' => __( 'Footer Middle Menu' )
				)
			);
	}
	add_action( 'init', 'register_flyweight_menus' );

// EDITOR STYLES
// Goes to editor-styles.css by default
	add_editor_style();
