<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_585443af66677',
	'title' => 'Sidebars',
	'fields' => array (
		array (
			'multiple' => 0,
			'allow_null' => 1,
			'choices' => array (
				'default' => 'Default',
				'no-sidebar' => 'No Sidebar',
				'left-sidebar' => 'Left Sidebar',
				'right-sidebar' => 'Right Sidebar',
			),
			'default_value' => array (
				0 => 'default',
			),
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'return_format' => 'value',
			'key' => 'field_585443c5c1c71',
			'label' => 'Sidebar Layout',
			'name' => 'biz_sidebar_layout',
			'type' => 'select',
			'instructions' => 'This will override the sidebar layout set in Customizer>Layout',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
            array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'class',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;