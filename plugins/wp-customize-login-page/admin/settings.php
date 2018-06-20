<?php
//-- GLOBAL SETTINGS

//REGISTER OPTION GROUP
function wclp_register_options_group()
{
	register_setting('wclp_option_group', 'wclp_options');
}
 
add_action ('admin_init', 'wclp_register_options_group');

//SETTINGS FORM
function wclp_update_options_form()
{
	$wclp_options = get_option('wclp_options');
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_media();
	
	wp_enqueue_script( 'wclp_option_script', WCLP_URI . 'js/options.js' ,array(), WCLP_VERSION, true );
	wp_enqueue_style( 'wclp_option_style', WCLP_URI . 'css/options.css' ,array(), WCLP_VERSION, 'all' );
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br /></div>
		<h2><?php _e('WP Customize Login Page Settings','wclp'); ?></h2>
		<p>&nbsp;</p>
		<form id="wclp-option-form" enctype="multipart/form-data" method="post" action="options.php">
			<?php settings_fields('wclp_option_group'); ?>
			<table>
				<tbody>
					<!-- STATUS --> 
					<tr class="fieldset"><th scope="row" colspan="2"><?php _e('Status','wclp'); ?></th></tr>
					<tr valign="top">
						<th scope="row"><p><label for="status"><?php _e('Enabled?','wclp'); ?></label></p></th>
						<td>
							<?php $status = (is_array($wclp_options) && $wclp_options['status']) ? $wclp_options['status'] : false; ?>
							<p><input id="status" name="wclp_options[status]" type="checkbox" value="1" <?php checked( '1', $status ); ?>/></p>
						</td>
					</tr>
					<!-- HTML --> 
					<tr class="fieldset"><th scope="row" colspan="2"><?php _e('HTML','wclp'); ?></th></tr>
					<tr valign="top">
						<th scope="row"><p><label for="bg_color"><?php _e('Body','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[bg_color]" id="bg_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['bg_color'] : '#f1f1f1'; ?>" data-default-color="#f1f1f1" /></p>
						</td>
					</tr>
					<tr valign="top">
						<?php $wclp_attachment_id = false; $field_name = 'bg_img'; ?>
						<th scope="row"><p><label for="<?php echo $field_name; ?>"><?php _e('Body Background Image','wclp'); ?></label></p></th>
						<td>
							<?php 
							if( is_array($wclp_options) && $wclp_options[$field_name] != "" ): 
								$wclp_attachment_id = $wclp_options[$field_name];
								$attachmentArr = wp_get_attachment_image_src($wclp_attachment_id, 'thumbnail');
								$wclp_attachment_url = $attachmentArr[0];
							endif; 
                            
							$box_uploadImg = '<div id="box-media-'.$field_name.'" class="wclp_uploader">';
							$box_uploadImg .= '<div class="no_image_uploaded" ';
							if ($wclp_attachment_id): 
								$box_uploadImg .= 'style="display:none;"'; 
							endif;
							$box_uploadImg .= '>';
							$box_uploadImg .= '<label for="'.$field_name.'_button">'.__('No image','wclp').'</label>';
							$box_uploadImg .= '<button class="upload_image_button wclp_media_image button button-primary button-large" name="'.$field_name.'_button" id="'.$field_name.'_button">'.__('Upload','wclp').'</button>';
							$box_uploadImg .= '</div>';
							$box_uploadImg .= '<div class="image_uploaded" data-test="'.$wclp_attachment_id.'" ';
							if (!$wclp_attachment_id):
								$box_uploadImg .= 'style="display:none;" '; 
							endif;
							$box_uploadImg .= '>';
							if (isset($wclp_attachment_url) && isset($wclp_attachment_id)):
								$box_uploadImg .= '<input type="hidden" id="'.$field_name.'" name="wclp_options['.$field_name.']" value="'.$wclp_attachment_id.'" />';
								$box_uploadImg .= '<img src="'.$wclp_attachment_url.'" data-attachment-id="'.$wclp_attachment_id.'" />';
							else:
								$box_uploadImg .= '<input type="hidden" id="'.$field_name.'" name="wclp_options['.$field_name.']" value="0" />';
								$box_uploadImg .= '<img src="" data-attachment-id="" />';
							endif;
							$box_uploadImg .= '<div class="hover"><ul><li><a href="#" class="wclp-button-delete">'.__('Remove','wclp').'</a></li><li><a href="#" class="wclp-button-edit">'.__('Edit','wclp').'</a></li></ul></div>';
							$box_uploadImg .= '</div>';
							$box_uploadImg .= '</div>';
                            
							echo $box_uploadImg;
							?>
						</td>
					</tr>
					<!-- LOGO -->
					<tr class="fieldset"><th scope="row" colspan="2"><?php _e('Logo','wclp'); ?></th></tr>
					<tr valign="top">
						<?php $wclp_attachment_id = false; $field_name = 'logo_img'; ?>
						<th scope="row"><p><label for="<?php echo $field_name; ?>"><?php _e('Logo Image','wclp'); ?></label></p></th>
						<td>
							<?php 
							if( is_array($wclp_options) && $wclp_options[$field_name] != "" ): 
								$wclp_attachment_id = $wclp_options[$field_name];
								$attachmentArr = wp_get_attachment_image_src($wclp_attachment_id, 'thumbnail');
								$wclp_attachment_url = $attachmentArr[0];
							endif; 
                            
							$box_uploadImg = '<div id="box-media-'.$field_name.'" class="wclp_uploader">';
							$box_uploadImg .= '<div class="no_image_uploaded" ';
							if ($wclp_attachment_id): 
								$box_uploadImg .= 'style="display:none;"'; 
							endif;
							$box_uploadImg .= '>';
							$box_uploadImg .= '<label for="'.$field_name.'_button">'.__('No image','wclp').'</label>';
							$box_uploadImg .= '<button class="upload_image_button wclp_media_image button button-primary button-large" name="'.$field_name.'_button" id="'.$field_name.'_button">'.__('Upload','wclp').'</button>';
							$box_uploadImg .= '</div>';
							$box_uploadImg .= '<div class="image_uploaded" data-test="'.$wclp_attachment_id.'" ';
							if (!$wclp_attachment_id):
								$box_uploadImg .= 'style="display:none;" '; 
							endif;
							$box_uploadImg .= '>';
							if (isset($wclp_attachment_url) && isset($wclp_attachment_id)):
								$box_uploadImg .= '<input type="hidden" id="'.$field_name.'" name="wclp_options['.$field_name.']" value="'.$wclp_attachment_id.'" />';
								$box_uploadImg .= '<img src="'.$wclp_attachment_url.'" data-attachment-id="'.$wclp_attachment_id.'" />';
							else:
								$box_uploadImg .= '<input type="hidden" id="'.$field_name.'" name="wclp_options['.$field_name.']" value="0" />';
								$box_uploadImg .= '<img src="" data-attachment-id="" />';
							endif;
							$box_uploadImg .= '<div class="hover"><ul><li><a href="#" class="wclp-button-delete">'.__('Remove','wclp').'</a></li><li><a href="#" class="wclp-button-edit">'.__('Edit','wclp').'</a></li></ul></div>';
							$box_uploadImg .= '</div>';
							$box_uploadImg .= '</div>';
                            
							echo $box_uploadImg;
							?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="logo_url"><?php _e('Logo URL','wclp'); ?></label></p></th>
						<td>
							<p><input class="regular-text code" type="text" id="logo_url" value="<?php echo (is_array($wclp_options)) ? $wclp_options['logo_url'] : ''; ?>" name="wclp_options[logo_url]" /></p>
							<p><span class="description"><?php _e('Enter the link of the logo (default bloginfo url)','wclp'); ?></span></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="logo_title"><?php _e('Logo Title','wclp'); ?></label></p></th>
						<td>
							<p><input class="regular-text code" type="text" id="logo_title" value="<?php echo (is_array($wclp_options)) ? $wclp_options['logo_title'] : ''; ?>" name="wclp_options[logo_title]" /></p>
							<p><span class="description"><?php _e('Enter the title of the logo (default bloginfo description)','wclp'); ?></span></p>
						</td>
					</tr>
					<!-- FORM --> 
					<tr class="fieldset"><th scope="row" colspan="2"><?php _e('Form','wclp'); ?></th></tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_bg_color"><?php _e('Background color','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_bg_color]" id="form_bg_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_bg_color'] : '#ffffff'; ?>" data-default-color="#ffffff" /></p>
						</td>
					</tr>
					<tr valign="top">
						<?php $wclp_attachment_id = false; $field_name = 'form_bg_img'; ?>
						<th scope="row"><p><label for="<?php echo $field_name; ?>"><?php _e('Background Image','wclp'); ?></label></p></th>
						<td>
							<?php 
							if( is_array($wclp_options) && $wclp_options[$field_name] != "" ): 
								$wclp_attachment_id = $wclp_options[$field_name];
								$attachmentArr = wp_get_attachment_image_src($wclp_attachment_id, 'thumbnail');
								$wclp_attachment_url = $attachmentArr[0];
							endif; 
                            
							$box_uploadImg = '<div id="box-media-'.$field_name.'" class="wclp_uploader">';
							$box_uploadImg .= '<div class="no_image_uploaded" ';
							if ($wclp_attachment_id): 
								$box_uploadImg .= 'style="display:none;"'; 
							endif;
							$box_uploadImg .= '>';
							$box_uploadImg .= '<label for="'.$field_name.'_button">'.__('No image','wclp').'</label>';
							$box_uploadImg .= '<button class="upload_image_button wclp_media_image button button-primary button-large" name="'.$field_name.'_button" id="'.$field_name.'_button">'.__('Upload','wclp').'</button>';
							$box_uploadImg .= '</div>';
							$box_uploadImg .= '<div class="image_uploaded" data-test="'.$wclp_attachment_id.'" ';
							if (!$wclp_attachment_id):
								$box_uploadImg .= 'style="display:none;" '; 
							endif;
							$box_uploadImg .= '>';
							if (isset($wclp_attachment_url) && isset($wclp_attachment_id)):
								$box_uploadImg .= '<input type="hidden" id="'.$field_name.'" name="wclp_options['.$field_name.']" value="'.$wclp_attachment_id.'" />';
								$box_uploadImg .= '<img src="'.$wclp_attachment_url.'" data-attachment-id="'.$wclp_attachment_id.'" />';
							else:
								$box_uploadImg .= '<input type="hidden" id="'.$field_name.'" name="wclp_options['.$field_name.']" value="0" />';
								$box_uploadImg .= '<img src="" data-attachment-id="" />';
							endif;
							$box_uploadImg .= '<div class="hover"><ul><li><a href="#" class="wclp-button-delete">'.__('Remove','wclp').'</a></li><li><a href="#" class="wclp-button-edit">'.__('Edit','wclp').'</a></li></ul></div>';
							$box_uploadImg .= '</div>';
							$box_uploadImg .= '</div>';
                            
							echo $box_uploadImg;
							?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_shadow_color"><?php _e('Shadow','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_shadow_color]" id="form_shadow_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_shadow_color'] : '#ffffff'; ?>" data-default-color="#ffffff" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_label_color"><?php _e('Label','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_label_color]" id="form_label_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_label_color'] : '#777777'; ?>" data-default-color="#777777" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_input_color"><?php _e('Input','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_input_color]" id="form_input_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_input_color'] : '#FBFBFA'; ?>" data-default-color="#FBFBFA" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_bg_color"><?php _e('Button Bg','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_bg_color]" id="form_btn_bg_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_bg_color'] : '#0085ba'; ?>" data-default-color="#0085ba" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_bg_h_color"><?php _e('Button Hover Bg','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_bg_h_color]" id="form_btn_bg_h_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_bg_h_color'] : '#008ec2'; ?>" data-default-color="#008ec2" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_color"><?php _e('Button Text','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_color]" id="form_btn_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_color'] : '#ffffff'; ?>" data-default-color="#ffffff" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_h_color"><?php _e('Button Text Hover','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_h_color]" id="form_btn_h_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_h_color'] : '#ffffff'; ?>" data-default-color="#ffffff" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_border_color"><?php _e('Button Border','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_border_color]" id="form_btn_border_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_border_color'] : '#006799'; ?>" data-default-color="#006799" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_border_h_color"><?php _e('Button Border Hover','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_border_h_color]" id="form_btn_border_h_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_border_h_color'] : '#006799'; ?>" data-default-color="#006799" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_s_color"><?php _e('Button Shadow','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_s_color]" id="form_btn_s_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_s_color'] : '#006799'; ?>" data-default-color="#006799" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_s_h_color"><?php _e('Button Shadow Hover','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_s_h_color]" id="form_btn_s_h_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_s_h_color'] : '#006799'; ?>" data-default-color="#006799" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_t_s_color"><?php _e('Button Text Shadow','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_t_s_color]" id="form_btn_t_s_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_t_s_color'] : '#006799'; ?>" data-default-color="#006799" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="form_btn_s_h_color"><?php _e('Button Text Shadow Hover','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[form_btn_t_s_h_color]" id="form_btn_s_h_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['form_btn_s_h_color'] : '#006799'; ?>" data-default-color="#006799" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="link_color"><?php _e('Link','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[link_color]" id="link_color" value="<?php echo (is_array($wclp_options)) ? $wclp_options['link_color'] : '#999999'; ?>" data-default-color="#999999" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="link_color_h"><?php _e('Link Hover','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[link_color_h]" id="link_color_h" value="<?php echo (is_array($wclp_options)) ? $wclp_options['link_color_h'] : '#00a0d2'; ?>" data-default-color="#00a0d2" /></p>
						</td>
					</tr>
					<!-- FORM --> 
					<tr class="fieldset"><th scope="row" colspan="2"><?php _e('Notification','wclp'); ?></th></tr>
					<tr valign="top">
						<th scope="row"><p><label for="login_error"><?php _e('Login Error','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[login_error]" id="login_error" value="<?php echo (is_array($wclp_options)) ? $wclp_options['login_error'] : '#dc3232'; ?>" data-default-color="#dc3232" /></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><p><label for="login_msg"><?php _e('Login Message','wclp'); ?></label></p></th>
						<td>
							<p><input type="text" class="regular-text color-picker" name="wclp_options[login_msg]" id="login_msg" value="<?php echo (is_array($wclp_options)) ? $wclp_options['login_msg'] : '#00a0d2'; ?>" data-default-color="#00a0d2" /></p>
						</td>
					</tr>
                    
					<!-- FOOTER -->
					<tr id="wclp-footer" valign="top">
						<td colspan="2">
							<p>
								<input type="submit" class="button-primary" id="submit" name="submit" value="<?php _e('Save Changes','wclp'); ?>" />
							</p>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<?php
}

//ADD MENU
function wclp_add_option_page()
{
	add_options_page('wclp Options', 'wclp Options', 'administrator', 'wclp-options-page', 'wclp_update_options_form');
}
 
add_action('admin_menu', 'wclp_add_option_page');

?>