<?php
/* CUSTOMIZE LOGO URL */
function wclp_login_logo_url() {
    $wclp_options = get_option('wclp_options');
    if($wclp_options['status']){
        $wclp_login_logo_url = get_bloginfo('url');
        if($wclp_options['logo_url']){
            $wclp_login_logo_url = $wclp_options['logo_url'];
        }
        return $wclp_login_logo_url;
    }
}
add_filter('login_headerurl', 'wclp_login_logo_url');

/* CUSTOMIZE LOGO TITLE */
function wclp_login_logo_title() {
    $wclp_options = get_option('wclp_options');
    if($wclp_options['status']){
        $wclp_login_logo_title = get_bloginfo('description');
        if($wclp_options['logo_title']){
            $wclp_login_logo_title = $wclp_options['logo_title'];
        }
        return $wclp_login_logo_title;
    }
}
add_filter('login_headertitle', 'wclp_login_logo_title');

/* CUSTOMIZE LOGIN FORM */
function wclp_custom_login() {
    $wclp_options = get_option('wclp_options');
    if($wclp_options['status']){
        ?>
        <style type="text/css">
            /* bg body */
            <?php 
                $wclp_attachment_url = false;
                $field_name = 'bg_img';
                if( is_array($wclp_options) && $wclp_options[$field_name] != "" ): 
                    $wclp_attachment_id = $wclp_options[$field_name];
                    $attachmentArr = wp_get_attachment_image_src($wclp_attachment_id, 'full');
                    $wclp_attachment_url = $attachmentArr[0];
                endif; 
            ?>
            html,body.login{
                background-color:<?php echo $wclp_options['bg_color']; ?>;
                <?php if($wclp_attachment_url): ?>
                background-image:url('<?php echo $wclp_attachment_url; ?>');
                background-position: center center !important;
                background-size: cover !important;
                <?php endif; ?>  
            }
            
            /* logo */
            <?php 
                $wclp_attachment_url = false;
                $field_name = 'logo_img';
                if( is_array($wclp_options) && $wclp_options[$field_name] != "" ): 
                    $wclp_attachment_id = $wclp_options[$field_name];
                    $attachmentArr = wp_get_attachment_image_src($wclp_attachment_id, 'full');
                    $wclp_attachment_url = $attachmentArr[0];
                endif; 
            ?>
            h1 a {
                <?php if($wclp_attachment_url): ?>
                background-image:url('<?php echo $wclp_attachment_url; ?>') !important;
                background-position: center center !important;
                background-size: contain !important;
                <?php endif; ?>    
                height: 85px !importnat;
                width: 280px !important;
                margin: auto !important;
                padding: 0 !important;
            }
            
            /* form */
            <?php 
                $wclp_attachment_url = false;
                $field_name = 'form_bg_img';
                if( is_array($wclp_options) && $wclp_options[$field_name] != "" ): 
                    $wclp_attachment_id = $wclp_options[$field_name];
                    $attachmentArr = wp_get_attachment_image_src($wclp_attachment_id, 'full');
                    $wclp_attachment_url = $attachmentArr[0];
                endif; 
            ?>
            .login form{
                <?php if($wclp_attachment_url): ?>
                background-image:url('<?php echo $wclp_attachment_url; ?>');
                background-position: center center !important;
                background-size: cover !important;
                <?php endif; ?>  
                background-color: <?php echo $wclp_options['form_bg_color']; ?>;
                box-shadow: 0 1px 4px -1px <?php echo $wclp_options['form_shadow_color']; ?>;
                -moz-box-shadow: 0 1px 4px -1px <?php echo $wclp_options['form_shadow_color']; ?>;
                -webkit-box-shadow: 0 1px 4px -1px <?php echo $wclp_options['form_shadow_color']; ?>;
            }
            .login label{
                color:<?php echo $wclp_options['form_label_color']; ?>;
            }
            .login form .input, .login form input[type=checkbox], .login input[type=text]{
                background-color: <?php echo $wclp_options['form_input_color']; ?>;
            }
            .login .button-primary{
                border-color: <?php echo $wclp_options['form_btn_border_color']; ?>;
                background-color: <?php echo $wclp_options['form_btn_bg_color']; ?>;
                color: <?php echo $wclp_options['form_btn_color']; ?>;
                -webkit-box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_color']; ?>;
                box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_color']; ?>;
                -webkit-box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_color']; ?>;
                box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_color']; ?>;
                text-shadow: 0 -1px 1px <?php echo $wclp_options['form_btn_t_s_color']; ?>,1px 0 1px <?php echo $wclp_options['form_btn_t_s_color']; ?>,0 1px 1px <?php echo $wclp_options['form_btn_t_s_color']; ?>,-1px 0 1px <?php echo $wclp_options['form_btn_t_s_color']; ?>;
            }
            .login .button-primary:hover{
                border-color: <?php echo $wclp_options['form_btn_border_h_color']; ?>;
                background-color: <?php echo $wclp_options['form_btn_bg_h_color']; ?>;
                color: <?php echo $wclp_options['form_btn_h_color']; ?>;
                -webkit-box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_h_color']; ?>;
                -moz-box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_h_color']; ?>;
                box-shadow: 0 1px 0 <?php echo $wclp_options['form_btn_s_h_color']; ?>;
                text-shadow: 0 -1px 1px <?php echo $wclp_options['form_btn_t_s_h_color']; ?>,1px 0 1px <?php echo $wclp_options['form_btn_t_s_h_color']; ?>,0 1px 1px <?php echo $wclp_options['form_btn_t_s_h_color']; ?>,-1px 0 1px <?php echo $wclp_options['form_btn_t_s_h_color']; ?>;
            }
            .login #backtoblog a, .login #nav a, .login h1 a {
                color: <?php echo $wclp_options['link_color']; ?>;
            }
            .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
                color: <?php echo $wclp_options['link_color_h']; ?>;
            }
			.login .message {
			    border-left-color: <?php echo $wclp_options['login_msg']; ?>;
			}
			.login #login_error{
			    border-left-color: <?php echo $wclp_options['login_error']; ?>;
			} 
        </style>
        <?php
    }
}

add_action('login_head', 'wclp_custom_login');
?>