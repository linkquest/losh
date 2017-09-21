<?php
//https://pippinsplugins.com/change-password-form-short-code/
function sbiz_change_password_form() {
	global $post;	
 
   	if (is_singular()) :
   		$current_url = get_permalink($post->ID);
   	else :
   		$pageURL = 'http';
   		if ($_SERVER["HTTPS"] == "on") $pageURL .= "s";
   		$pageURL .= "://";
   		if ($_SERVER["SERVER_PORT"] != "80") $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
   		else $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
   		$current_url = $pageURL;
   	endif;		
	$redirect = $current_url;
 
	ob_start();
 
		// show any error messages after form submission
		sbiz_show_error_messages(); ?>
 
		<?php if(isset($_GET['password-reset']) && $_GET['password-reset'] == 'true') { ?>
			<div class="sbiz_message success">
				<span><?php _e('Password changed successfully', 'rcp'); ?></span>
			</div>
		<?php } ?>
		<form id="sbiz_password_form" method="POST" action="<?php echo $current_url; ?>">
			<fieldset>
				<p>
					<label for="sbiz_user_pass"><?php _e('New Password', 'rcp'); ?></label>
					<input name="sbiz_user_pass" id="sbiz_user_pass" class="required" type="password"/>
				</p>
				<p>
					<label for="sbiz_user_pass_confirm"><?php _e('Password Confirm', 'rcp'); ?></label>
					<input name="sbiz_user_pass_confirm" id="sbiz_user_pass_confirm" class="required" type="password"/>
				</p>
				<p>
					<input type="hidden" name="sbiz_action" value="reset-password"/>
					<input type="hidden" name="sbiz_redirect" value="<?php echo $redirect; ?>"/>
					<input type="hidden" name="sbiz_password_nonce" value="<?php echo wp_create_nonce('rcp-password-nonce'); ?>"/>
					<input id="sbiz_password_submit" type="submit" value="<?php _e('Change Password', 'sbiz'); ?>"/>
				</p>
			</fieldset>
		</form>
	<?php
	return ob_get_clean();	
}
 
// password reset form
function sbiz_reset_password_form() {
	if(is_user_logged_in()) {
		return sbiz_change_password_form();
	}
}
add_shortcode('password_form', 'sbiz_reset_password_form');
 
 
function sbiz_reset_password() {
	// reset a users password
	if(isset($_POST['sbiz_action']) && $_POST['sbiz_action'] == 'reset-password') {
 
		global $user_ID;
 
		if(!is_user_logged_in())
			return;
 
		if(wp_verify_nonce($_POST['sbiz_password_nonce'], 'rcp-password-nonce')) {
 
			if($_POST['sbiz_user_pass'] == '' || $_POST['sbiz_user_pass_confirm'] == '') {
				// password(s) field empty
				sbiz_errors()->add('password_empty', __('Please enter a password, and confirm it', 'sbiz'));
			}
			if($_POST['sbiz_user_pass'] != $_POST['sbiz_user_pass_confirm']) {
				// passwords do not match
				sbiz_errors()->add('password_mismatch', __('Passwords do not match', 'sbiz'));
			}
 
			// retrieve all error messages, if any
			$errors = sbiz_errors()->get_error_messages();
 
			if(empty($errors)) {
				// change the password here
				$user_data = array(
					'ID' => $user_ID,
					'user_pass' => $_POST['sbiz_user_pass']
				);
				wp_update_user($user_data);
				// send password change email here (if WP doesn't)
				wp_redirect(add_query_arg('password-reset', 'true', $_POST['sbiz_redirect']));
				exit;
			}
		}
	}	
}
add_action('init', 'sbiz_reset_password');
 
if(!function_exists('sbiz_show_error_messages')) {
	// displays error messages from form submissions
	function sbiz_show_error_messages() {
		if($codes = sbiz_errors()->get_error_codes()) {
			echo '<div class="sbiz_message error">';
			    // Loop error codes and display errors
			   foreach($codes as $code){
			        $message = sbiz_errors()->get_error_message($code);
			        echo '<span class="sbiz_error"><strong>' . __('Error', 'rcp') . '</strong>: ' . $message . '</span><br/>';
			    }
			echo '</div>';
		}	
	}
}
 
if(!function_exists('sbiz_errors')) { 
	// used for tracking error messages
	function sbiz_errors(){
	    static $wp_error; // Will hold global variable safely
	    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
	}
}