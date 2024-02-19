<?php

/**
 *  ThemetechMount: Date Counter Box
 */


	$params = array_merge(
		themetechmount_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Counter Date', 'fablio' ),
				'param_name'  => 'el_class',
				'param_name'  => 'counterdate',
				'description' => esc_attr__( 'You can enter the counter days. Example: 2019-10-25 18:30:00', 'fablio' ),
				"value"		  => "",
				'group'       => esc_attr__( 'Content', 'fablio' ),
			),
			array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Counter Box Alignment', 'fablio' ),
			'param_name' => 'box_align',
			'description' => esc_attr__( 'Select counter box alignment.', 'fablio' ),
			'value' => array(
				esc_attr__( 'Inline', 'fablio' ) => 'inline',
				esc_attr__( 'Left', 'fablio' ) => 'left',
				esc_attr__( 'Right', 'fablio' ) => 'right',
				esc_attr__( 'Center', 'fablio' ) => 'center'
				),
			'group'       => esc_attr__( 'Content', 'fablio' ),
			),
	
		)
	);
	

	
	global $tm_vc_custom_element_datecounterbox;
	$tm_vc_custom_element_datecounterbox = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Date Counter', 'fablio' ),
		'base'        => 'tm-datecounter',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'      => $params,
	) );