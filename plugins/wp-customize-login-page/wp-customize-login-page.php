<?php
/*
Plugin Name: WP Customize Login Page
Plugin URI: http://carlolapera.com/plugins/wp-customize-login-page/
Description: Customize your Login page.
Author: Carlo La Pera
Version: 1.2
Author URI: http://carlolapera.com/
*/

class WP_Customize_Login_Page {

    /**
     * PHP4 constructor method.  This will be removed once the plugin only supports WordPress 3.2, 
     * which is the version that drops PHP4 support.
     */
    function WP_Customize_Login_Page() {
        $this->__construct();
    }

    /**
     * PHP5 constructor method.
     */
    function __construct() {
        global $WPCustomizeLoginPage;

        /* Set up an empty class for the global $WPCustomizeLoginPage object. */
        $WPCustomizeLoginPage = new stdClass;

        /* Set the constants needed by the plugin. */
        add_action('plugins_loaded', array(&$this, 'constants'), 1);

        /* Internationalize the text strings used. */
        add_action('plugins_loaded', array(&$this, 'i18n'), 2);

        /* Load the functions files. */
        add_action('plugins_loaded', array(&$this, 'includes'), 3);

        /* Load the admin files. */
        add_action('plugins_loaded', array(&$this, 'admin'), 4);

        /* Register activation hook. */
        register_activation_hook(__FILE__, array(&$this, 'activation'));
        
        /* Register deactivation hook. */
        register_deactivation_hook(__FILE__, array(&$this, 'deactivation'));
    }

    /**
     * Defines constants used by the plugin.
     */
    function constants() {

        /* Set the version number of the plugin. */
        define('WCLP_VERSION', '0.1');

        /* Set the database version number of the plugin. */
        define('WCLP_DB_VERSION', 1);
        
        /* Set constant path to the wclp plugin index. */
        define('WCLP_INDEX', __FILE__);

        /* Set constant path to the wclp plugin directory. */
        define('WCLP_DIR', trailingslashit(plugin_dir_path(__FILE__)));

        /* Set constant path to the wclp plugin URL. */
        define('WCLP_URI', trailingslashit(plugin_dir_url(__FILE__)));

        /* Set the constant path to the wclp includes directory. */
        define('WCLP_INCLUDES', WCLP_DIR . trailingslashit('includes'));

        /* Set the constant path to the wclp admin directory. */
        define('WCLP_ADMIN', WCLP_DIR . trailingslashit('admin'));
        
        
    }

    /**
     * Loads the initial files needed by the plugin.
     */
    function includes() {

        /* Load the plugin functions file. */
        require_once( WCLP_INCLUDES . 'functions.php' );
        
    }

    /**
     * Loads the translation files.
     */
    function i18n() {
        /* Load the translation of the plugin. */
        load_plugin_textdomain('wclp', false, 'wp-customize-login-page/languages');
    }

    /**
     * Loads the admin functions and files.
     */
    function admin() {

        /* Only load files if in the WordPress admin. */
        if (is_admin()) {

            /* Load the plugin settings. */
            require_once( WCLP_ADMIN . 'settings.php' );
			
			//UPDATE OPTION
        	$this->updateOptions();
        
            /* Add action link. */
            add_filter('plugin_action_links',array(&$this,'plugin_settings_link'),10,2);
        }
    }

    /**
     * Method that runs only when the plugin is activated.
     */
    function activation() {
        //ADD OPTION
        $this->addOptions();
    }
    
 	function getDefaultVal(){
	    $default = array(
	        'satus' => 1,
	        'bg_color' => '#f1f1f1',
	        'bg_img' => null,
	        'logo_img' => null,
	        'logo_url' => get_bloginfo('url'),
	        'logo_title' => get_bloginfo('title'),
	        'form_bg_color' => '#ffffff',
	        'form_bg_img' => null,
	        'form_shadow_color' => '#ffffff',
	        'form_label_color' => '#777777',
	        'form_input_color' => '#FBFBFA',
	        'form_btn_bg_color' => '#0085ba',
	        'form_btn_bg_h_color' => '#008ec2',
	        'form_btn_color' => '#ffffff',
	        'form_btn_h_color' => '#ffffff',
	        'form_btn_border_color' => '#006799',
	        'form_btn_border_h_color' => '#006799',
	        'form_btn_s_color' => '#006799',
	        'form_btn_s_h_color' => '#006799',
	        'form_btn_t_s_color' => '#006799',
	        'form_btn_t_s_h_color' => '#006799',
	        'link_color' => '#999999',
	        'link_color_h' => '#00a0d2',
	        'login_error' => '#dc3232',
	        'login_msg' => '#00a0d2'
	    );
		return $default;
 	}
	
    function addOptions(){
        $default = $this->getDefaultVal();
        
        add_option( 'wclp_options', $default);
    }
 	
    function updateOptions(){
		$default = $this->getDefaultVal();
		$wclp_options = get_option('wclp_options');
		$result = array_merge($default, $wclp_options);
		$changed = false;
		foreach($wclp_options as $key => $val){
			if(!$val){
				$wclp_options[$key] = $default[$key];
				$changed = true;
			}
		}
		if($changed){
        	update_option( 'wclp_options', $wclp_options);
		}
    }
    
    /**
     * Method that runs only when the plugin is deactivated.
     */
    function deactivation(){
        //DELETE OPTION
        delete_option('wclp_options');
    }
    
    /**
     * Add Action Link.
     */
    function plugin_settings_link( $links, $file ) {
		if ( $file != plugin_basename( __FILE__ ) ) {
			return $links;
		}

		array_unshift( $links, '<a href="' . esc_url( admin_url( 'admin.php' ) ) . '?page=wclp-options-page">' . esc_html__( 'Settings', 'wclp' ) . '</a>' );

		return $links;
	}

}

$WPCustomizeLoginPage_load = new WP_Customize_Login_Page();

?>
