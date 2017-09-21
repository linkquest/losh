<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if( !class_exists( 'acf')){
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
    function my_acf_settings_path( $path ) {

        // update path
        $path = get_stylesheet_directory() . '/acf/';

        // return
        return $path;

    }


    // 2. customize ACF dir
    add_filter('acf/settings/dir', 'my_acf_settings_dir');

    function my_acf_settings_dir( $dir ) {

        // update path
        $dir = get_stylesheet_directory_uri() . '/acf/';

        // return
        return $dir;

    }

    // 4. Include ACF
    include_once( get_stylesheet_directory() . '/acf/acf.php' );
}
   // 3. Hide ACF field group menu item
if(  ! defined( 'ACF_DEBUG' ) || false == ACF_DEBUG ) {
    add_filter('acf/settings/show_admin', '__return_false');
}