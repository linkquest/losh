<?php

/**
 * Custom Login
 */
function mv_login_logo() { ?>
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
            $custom_logo = wp_get_attachment_image_src( $custom_logo_id, 'full', false);

    }
$logo = ($custom_logo ? $custom_logo[0] : (get_stylesheet_directory_uri() . '/images/WPLoginLogo.png') ); ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo $logo; ?>);
            padding-bottom: 0px;
            height: 82px !important;
            width: auto !important;
            background-size: contain !important;
            background-position: bottom;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'mv_login_logo' );
//function my_login_logo_url() {
//    return 'http://mediavandals.com';
//}
//add_filter( 'login_headerurl', 'my_login_logo_url' );

//function my_login_logo_url_title() {
//    return 'Mediavandals';
//}
//add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//remove admin bar for all but admin
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}
/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
//printa( ); die();
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {

		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return get_permalink( get_theme_mod( 'sbiz_profile',get_option('page_on_front') ) );
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 99, 3 );
