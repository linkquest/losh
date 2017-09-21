<?php
/**
 * Add course to new users account
 * @param int $user_id
 */
function sbiz_registration_add_course( $user_id ) {
//PC::debug( $user_id );
    if ( isset( $_POST['sbiz-sku'] ) )
        add_class_to_user( $_POST['sbiz-sku'] , $user_id );
}
add_action( 'user_register', 'sbiz_registration_add_course', 10, 1 );

/**
 * Add course to users account
 * @param string $user_login
 * @param obj $user
 */

function sbiz_login_add_course( $user_login, $user ) {
   if ( isset( $_POST['sbiz-sku'] ) )
        add_class_to_user( $_POST['sbiz-sku'] , $user->ID );
}
add_action('wp_login', 'sbiz_login_add_course', 10, 2);

// Add Password, Repeat Password and Are You Human fields to WordPress registration form
// http://wp.me/p1Ehkq-gn

//add_action( 'register_form', 'ts_show_extra_register_fields' );
function ts_show_extra_register_fields(){
?>
	<p>
		<label for="password">Password<br/>
		<input id="password" class="input" type="password" tabindex="30" size="25" value="" name="password" />
		</label>
	</p>
	<p>
		<label for="repeat_password">Repeat password<br/>
		<input id="repeat_password" class="input" type="password" tabindex="40" size="25" value="" name="repeat_password" />
		</label>
	</p>
	<p>
		<label for="are_you_human" style="font-size:11px">Sorry, but we must check if you are human. What is the name of website you are registering for?<br/>
		<input id="are_you_human" class="input" type="text" tabindex="40" size="25" value="" name="are_you_human" />
		</label>
	</p>
<?php
}

// Check the form for errors
//add_action( 'register_post', 'ts_check_extra_register_fields', 10, 3 );
function ts_check_extra_register_fields($login, $email, $errors) {
	if ( $_POST['password'] !== $_POST['repeat_password'] ) {
		$errors->add( 'passwords_not_matched', "<strong>ERROR</strong>: Passwords must match" );
	}
	if ( strlen( $_POST['password'] ) < 8 ) {
		$errors->add( 'password_too_short', "<strong>ERROR</strong>: Passwords must be at least eight characters long" );
	}
	if ( $_POST['are_you_human'] !== get_bloginfo( 'name' ) ) {
		$errors->add( 'not_human', "<strong>ERROR</strong>: Your name is Bot? James Bot? Check bellow the form, there's a Back to [sitename] link." );
	}
}

// Storing WordPress user-selected password into database on registration
// http://wp.me/p1Ehkq-gn

//add_action( 'user_register', 'ts_register_extra_fields', 100 );
function ts_register_extra_fields( $user_id ){
	$userdata = array();

	$userdata['ID'] = $user_id;
	if ( $_POST['password'] !== '' ) {
		$userdata['user_pass'] = $_POST['password'];
	}
	$new_user_id = wp_update_user( $userdata );
}
// Editing WordPress registration confirmation message
// http://wp.me/p1Ehkq-gn

add_filter( 'gettext', 'ts_edit_password_email_text' );
function ts_edit_password_email_text ( $text ) {
	if ( $text == 'A password will be e-mailed to you.' ) {
		$text = 'If you leave password fields empty one will be generated for you. Password must be at least eight characters long.';
	}
	return $text;
}