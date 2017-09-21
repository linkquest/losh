<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if( function_exists('acf_add_options_page') ) {
	
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme Default Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-default-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
                'position'  => '58'
	));
     
        acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> $parent['menu_slug'],
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> $parent['menu_slug'],
	));

	
	
      	
}

