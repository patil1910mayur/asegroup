<?php

/**
 *  ThemetechMount: Schedule Box
 */
 
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


	$params = array_merge(
		$heading_element,
		array(
			array(
				'type'			=> 'themetechmount_style_selector',
				'heading'		=> esc_attr__( 'Work Hour Style', 'fablio' ),
				'description'	=> esc_attr__( 'Select Menu Table box style.', 'fablio' ),
				'param_name'	=> 'tm_workhour_style',				
				'value'			=> array(
								array(
									'label'	=> esc_attr('Work Hour Style 1','fablio'),
									'value'	=> 'workhour-style1',
									'thumb'	=> get_template_directory_uri() . '/inc/images/workhour-style1.png',
								),
								array(
									'label'	=> esc_attr('Work Hour Style 2','fablio'),
									'value'	=> 'workhour-style2',
									'thumb'	=> get_template_directory_uri() . '/inc/images/workhour-style2.png',
								),
								array(
									'label'	=> esc_attr('Work Hour Style 3','fablio'),
									'value'	=> 'workhour-style3',
									'thumb'	=> get_template_directory_uri() . '/inc/images/workhour-style3.png',
								),
							),
				'std'			=> 'workhour-style1',
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
			'heading' => esc_attr__( 'WorkHour', 'fablio' ),
			'param_name' => 'pricelist',
			'group'       => esc_attr__( 'WorkHour', 'fablio' ),
			'description' => esc_attr__( 'Set Service price', 'fablio' ),
			'value' => urlencode( json_encode( array(
				array(
					'service_name' => esc_attr__( 'Monday - Friday', 'fablio' ),
					'price' => '9:00 AM - 6:00 PM',
				),
			
			))),
			'params' => array(
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Title', 'fablio' ),
						'param_name'  => 'service_name',
						'description' => esc_attr__( 'Fill title information here', 'fablio' ),
						'group'       => esc_attr__( 'WorkHour', 'fablio' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Time', 'fablio' ),
						'param_name'  => 'price',
						// 'value'       => '',
						'description' => esc_attr__( 'Fill time details here eg:9:00 AM - 6:00 PM', 'fablio' ),
						'group'       => esc_attr__( 'WorkHour', 'fablio' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				
			),
		),
			
			
		)
	);
	
	global $tm_vc_custom_element_pricelistbox;
	$tm_vc_custom_element_pricelistbox = $params;

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount WorkHour', 'fablio' ),
		'base'        => 'tm-pricelistbox',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'      => $params,
	) );