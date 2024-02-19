<?php

/**
 *  ThemetechMount: Process Box
 */


	$allParams =
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'fablio' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fablio' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Box Image size', 'fablio' ),
				'param_name'  => 'boximg_size',
				'value'			=> 'full',
				'description' => esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full"). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fablio' ),
				'group'       => esc_attr__( 'Content', 'fablio' ),
			),
			array(
			'type' => 'param_group',
			'heading' => esc_attr__( 'Box Content', 'fablio' ),
			'param_name' => 'box_content',
			'group'       => esc_attr__( 'Content', 'fablio' ),
			'description' => esc_attr__( 'Set box content', 'fablio' ),
			'params' => array(
			    array(
						'type'        => 'attach_image',
						'heading'     => esc_attr__( 'Box Image', 'fablio' ),
						'param_name'  => 'static_boximage',
						'description' => esc_attr__( 'Select image', 'fablio' ),
						'group'       => esc_attr__( 'Content', 'fablio' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
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
                array(
						'type'        => 'vc_link',
						'heading'     => esc_attr__( 'Box URL (Link)', 'fablio' ),
						'param_name'  => 'static_boxlink',
						'description' => esc_attr__( 'Add link for box title and image', 'fablio' ),
						'group'       => esc_attr__( 'Content', 'fablio' ),
						'admin_label' => true,
				),				
						
			),
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


$params    = array_merge( $heading_element, $allParams );

	
	global $tm_vc_custom_element_processbox;
	$tm_vc_custom_element_processbox = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Process Box', 'fablio' ),
		'base'        => 'tm-processbox',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'      => $params,
	) );