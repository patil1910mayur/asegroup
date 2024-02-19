<?php

/**
 *  ThemetechMount: Woo category slider Box
 */
 
 
	$allParams = array(
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Category Display', 'fablio' ),
			'param_name' => 'display_category',
			'value' 	=> array_flip(array(
				'0'		=> __('Parent', 'fablio'),
			)),
			'description' => esc_attr__( 'Default category display.', 'fablio' ),
			'admin_label'	=> false,
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Hide Empty Category', 'fablio' ),
			'param_name' => 'hide_empty',
			'value' 	=> array_flip(array(
				'1'		=> __('Yes', 'fablio'),
				'0'		=> __('No', 'fablio'),
			)),
			'description' => esc_attr__( 'Select option for hide/display empty category.', 'fablio' ),
			'admin_label'	=> false,
		),
		array (
			'param_name' 	=> 'height',
			'type' 			=> 'textarea',
			'heading' 		=> __('Category Image Height', 'fablio'),
			'description' 	=> __('Category Image Height in pixel (note:enter number without px ex.100)', 'fablio'),
			'admin_label'	=> false,
		),			
		array (
			'param_name' 	=> 'width',
			'type' 			=> 'textarea',
			'heading' 		=> __('Category Image Width', 'fablio'),
			'description' 	=> __('Category Image Width in pixel (note:enter number without px ex.100)', 'fablio'),
			'admin_label'	=> false,
		),
	
	);

$boxParams = themetechmount_box_params();
$params    = array_merge( $allParams, $boxParams );
	
	global $themetechmount_sc_params_woocategory_block;
	$themetechmount_sc_params_woocategory_block = $params;
	
	vc_map( array(
		'name'		=> esc_attr__( 'ThemetechMount Woo Categories', 'fablio' ),
		'base'		=> 'tm-woocategory-block',
		'icon'		=> 'icon-themetechmount-vc',
		'category'	=> esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'	=> $params,
	) );
