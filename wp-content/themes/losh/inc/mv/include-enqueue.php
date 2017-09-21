<?php

/* 
 * Mediavandals
 */

/**
 * Enqueue scripts and styles.
 */
function mv_scripts() {
        wp_enqueue_style( 'mv-style', get_stylesheet_uri() );
        wp_enqueue_style( 'mv-mmenu-css', get_template_directory_uri() . '/custom-mmenu.css' );
        wp_enqueue_style( 'mv-google-font', "https://fonts.googleapis.com/css?family=Baloo+Bhaina" );
        wp_enqueue_style( 'mv-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );


        wp_enqueue_script( 'mv-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );
        wp_enqueue_script( 'mv-mmenu-js', get_template_directory_uri() . '/js/mmenu/core/js/jquery.mmenu.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'mv-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20120206', true );
        wp_enqueue_script( 'mv-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mv_scripts' );

function lqm_load_admin_scripts() {
	wp_enqueue_script('admin-js',get_template_directory_uri() . '/js/custom-admin.js');
        wp_enqueue_style( 'mv-admin-css', get_template_directory_uri() . '/admin/mv-admin.css' );
}
add_action('admin_enqueue_scripts', 'lqm_load_admin_scripts');

