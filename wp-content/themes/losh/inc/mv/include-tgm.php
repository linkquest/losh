<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Spartan Project
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */


require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'lqm_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function lqm_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Captive Sidebar', // The plugin name.
			'slug'               => 'captive-sidebar', // The plugin slug (typically the folder name).
			'source'             => 'captive-sidebar.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
                        'id' => 'sbiz-tgmpa',
                    ),
            
            	
	);
        $config = array(
		'id'           => 'sbiz',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' =>  get_template_directory_uri() . '/tgm/plugins/',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '<div>Message goes here</div>',                      // Message to output right before the plugins table.
            );
        $membership_plugin = get_theme_mod( 'membership_plugin', 'pmp');
        if('int' == $membership_plugin){
            $plugins[] = array(
			'name'      => 'PayPal IPN for WordPress',
			'slug'      => 'paypal-ipn',
			'required'  => true,
                        'force_activation' => true,
		);
        }

        if('pmp' == $membership_plugin){
            $plugins[] = array(
			'name'      => 'Paid Memberships Pro',
			'slug'      => 'paid-memberships-pro',
			'required'  => true,
                        'force_activation' => true,
                        'dismissable'  => false, 
		);
        }
//The 'name' attribute is used in custom-admin.js to modify the link to point to the WLM purchae page
        if('wlm' == $membership_plugin){
            $plugins[] = array(
			'name'      => 'Wishlist Member',
                        'slug' => 'wishlist-member',
			'source'      => '',
                        'external_url'      => 'http://go.wishlistproducts.com/?p=WLP1187135&w=wlm',
			'required'  => true,
                        'force_activation' => false,
                        'dismissable'  => false, 
		);
            
        }

	tgmpa( $plugins, $config );
}


