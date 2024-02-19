<?php

/**
 *  Themetechmount: Static Content Box
 */

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	)
);

$param_group = array(
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Box Title', 'fablio' ),
						'param_name'  => 'static_boxtitle',
						'description' => esc_attr__( 'Enter text used as title', 'fablio' ),
						'group'       => esc_attr__( 'Content', 'fablio' ),
						'admin_label' => true,
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Box Content', 'fablio' ),
						'param_name'  => 'static_boxcontent',
						'description' => esc_attr__( 'Enter box content', 'fablio' ),
						'group'       => esc_attr__( 'Content', 'fablio' ),
						'admin_label' => true,
				),
       			
			);
// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );	
	
	$params  = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'fablio' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fablio' ),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_attr__( 'Box Content', 'fablio' ),
				'param_name' => 'box_content',
				'group'       => esc_attr__( 'Content', 'fablio' ),
				'description' => esc_attr__( 'Set box content', 'fablio' ),
				'params' => $param_group,
			),			
	);
	
	
	
/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'tm-heading', '', '',
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$params    = array_merge( $heading_element, $params );

	
	global $tm_vc_custom_element_stepbox;
	$tm_vc_custom_element_stepbox = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Steps Box2', 'fablio' ),
		'base'        => 'tm-stepbox',
		"class"   	  => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'      => $params,
	) );