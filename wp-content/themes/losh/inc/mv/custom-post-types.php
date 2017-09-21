<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Register Custom Post Type
function mv_custom_post_type() {
    // Character CPT
	$labels1 = array(
		'name'                => _x( 'Characters', 'Post Type General Name', 'mv' ),
		'singular_name'       => _x( 'Character', 'Post Type Singular Name', 'mv' ),
		'menu_name'           => __( 'Characters', 'mv' ),
		'parent_item_colon'   => __( 'Parent Item:', 'mv' ),
		'all_items'           => __( 'All Characters', 'mv' ),
		'view_item'           => __( 'View Character', 'mv' ),
		'add_new_item'        => __( 'Add New Character', 'mv' ),
		'add_new'             => __( 'Add New', 'mv' ),
		'edit_item'           => __( 'Edit Character', 'mv' ),
		'update_item'         => __( 'Update Character', 'mv' ),
		'search_items'        => __( 'Search Characters', 'mv' ),
		'not_found'           => __( 'Character Not found', 'mv' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'mv' ),
	);
	$args1 = array(
		'label'               => __( 'character', 'mv' ),
		'description'         => __( 'Losh Characters', 'mv' ),
		'labels'              => $labels1,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-heart',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
        
        // Music CPT
        $labels2 = array(
		'name'                => _x( 'Music', 'Post Type General Name', 'mv' ),
		'singular_name'       => _x( 'Song', 'Post Type Singular Name', 'mv' ),
		'menu_name'           => __( 'Music', 'mv' ),
		'parent_item_colon'   => __( 'Parent Song:', 'mv' ),
		'all_items'           => __( 'All Music', 'mv' ),
		'view_item'           => __( 'View Song', 'mv' ),
		'add_new_item'        => __( 'Add New Song', 'mv' ),
		'add_new'             => __( 'Add New', 'mv' ),
		'edit_item'           => __( 'Edit Song', 'mv' ),
		'update_item'         => __( 'Update Song', 'mv' ),
		'search_items'        => __( 'Search Music', 'mv' ),
		'not_found'           => __( 'Song Not found', 'mv' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'mv' ),
	);
	$args2 = array(
		'label'               => __( 'music', 'mv' ),
		'description'         => __( 'Losh Music', 'mv' ),
		'labels'              => $labels2,
		'supports'            => array( 'title','excerpt','thumbnail', 'revisions' ),
		'taxonomies'          => array( 'tags' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-media-audio',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
        // Activities CPT
        $labels3 = array(
		'name'                => _x( 'Activities', 'Post Type General Name', 'mv' ),
		'singular_name'       => _x( 'Activity', 'Post Type Singular Name', 'mv' ),
		'menu_name'           => __( 'Activities', 'mv' ),
		'parent_item_colon'   => __( 'Parent Activity:', 'mv' ),
		'all_items'           => __( 'All Activities', 'mv' ),
		'view_item'           => __( 'View Activity', 'mv' ),
		'add_new_item'        => __( 'Add New Activity', 'mv' ),
		'add_new'             => __( 'Add New', 'mv' ),
		'edit_item'           => __( 'Edit Activity', 'mv' ),
		'update_item'         => __( 'Update Activity', 'mv' ),
		'search_items'        => __( 'Search Activities', 'mv' ),
		'not_found'           => __( 'Activity Not found', 'mv' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'mv' ),
	);
	$args3 = array(
		'label'               => __( 'activity', 'mv' ),
		'description'         => __( 'Activity Pages', 'mv' ),
		'labels'              => $labels3,
		'supports'            => array( 'title','excerpt','thumbnail', 'revisions' ),
		'taxonomies'          => array( 'tags' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 22,
		'menu_icon'           => 'dashicons-art',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
        
        register_post_type( 'character', $args1 );
        register_post_type( 'music', $args2 );
        register_post_type( 'activity', $args3 );
        

}

// Hook into the 'init' action
add_action( 'init', 'mv_custom_post_type', 0 );



/*
 * Add custom titles
 */
function losh_change_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'character' == $screen->post_type ) {
          $title = 'Enter Character Name';
     }
     if  ( 'song' == $screen->post_type ) {
          $title = 'Enter Song Title';
     }
     if  ( 'activity' == $screen->post_type ) {
          $title = 'Enter Activity Title';
     }
  
     return $title;
}
  
add_filter( 'enter_title_here', 'losh_change_title_text' );
