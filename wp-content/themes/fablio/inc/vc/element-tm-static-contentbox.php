<?php

/**
 *  ThemetechMount: Static Content Box
 */


	$allParams =
		array(
			array(
				'type'			=> 'themetechmount_style_selector',
				'heading'		=> esc_attr__( 'Steps Box Style', 'fablio' ),
				'description'	=> esc_attr__( 'Select Menu Table box style.', 'fablio' ),
				'param_name'	=> 'tm_stps_style',				
				'value'			=> array(
								array(
									'label'	=> esc_attr('Steps Style 1','fablio'),
									'value'	=> 'steps-style1',
									'thumb'	=> get_template_directory_uri() . '/inc/images/steps-view-style1.png',
								),
								array(
									'label'	=> esc_attr('Steps Style 2','fablio'),
									'value'	=> 'steps-style2',
									'thumb'	=> get_template_directory_uri() . '/inc/images/steps-view-style2.png',
								),
								array(
									'label'	=> esc_attr('Steps Style 3','fablio'),
									'value'	=> 'steps-style3',
									'thumb'	=> get_template_directory_uri() . '/inc/images/steps-view-style3.png',
								),
								array(
									'label'	=> esc_attr('Steps Style 4','fablio'),
									'value'	=> 'steps-style4',
									'thumb'	=> get_template_directory_uri() . '/inc/images/steps-view-style4.png',
								),
								array(
									'label'	=> esc_attr('Steps Style 5','fablio'),
									'value'	=> 'steps-style5',
									'thumb'	=> get_template_directory_uri() . '/inc/images/steps-view-style5.png',
								),
							),
				'std'			=> 'steps-style1',
				'group'			=> esc_attr__( 'Boxes Appearance', 'fablio' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'fablio' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fablio' ),
			),
			array(
			'type' => 'param_group',
			'heading' => esc_attr__( 'Steps Item Content', 'fablio' ),
			'param_name' => 'box_content',
			'group'       => esc_attr__( 'Content', 'fablio' ),
			'description' => esc_attr__( 'Set Steps Item content', 'fablio' ),
			'params' => array(
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Steps Title', 'fablio' ),
						'param_name'  => 'static_boxtitle',
						'description' => esc_attr__( 'Enter text used as title', 'fablio' ),
						'group'       => esc_attr__( 'Content', 'fablio' ),
						'admin_label' => true,
						'dependency' => array(
							'element' => 'tm_stps_style',
							'value' => array( 'steps-style1' ),
						),
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Steps Description', 'fablio' ),
						'param_name'  => 'static_boxcontent',
						'description' => esc_attr__( 'Enter box content', 'fablio' ),
						'group'       => esc_attr__( 'Content', 'fablio' ),
						'admin_label' => true,
				),	
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Steps Num', 'fablio' ),
						'param_name'  => 'static_boxnnumber',
						'description' => esc_attr__( 'Enter Steps Number', 'fablio' ),
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

$boxParams = themetechmount_box_params();
$params    = array_merge( $heading_element, $allParams, $boxParams );

	
	global $tm_vc_custom_element_staticcontent_box;
	$tm_vc_custom_element_staticcontent_box = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Steps Box', 'fablio' ),
		'base'        => 'tm-static-contentbox',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'      => $params,
	) );