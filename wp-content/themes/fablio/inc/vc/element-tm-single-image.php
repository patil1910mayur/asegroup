<?php

/**
 *  ThemetechMount: Image Box
 */
 
 
	$params = array(
		array(
			'type'			=> 'themetechmount_style_selector',
			'heading'		=> esc_attr__( 'Image Style', 'fablio' ),
			'description'	=> esc_attr__( 'Select Image box style.', 'fablio' ),
			'param_name'	=> 'tm_img_boxstyle',
			'value'			=> array(
									array(
										'label'	=> esc_attr('Image Box - Style 1','fablio'),
										'value'	=> 'imagestyle-one',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style1.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 2','fablio'),
										'value'	=> 'imagestyle-two',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style2.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 3','fablio'),
										'value'	=> 'imagestyle-three',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style3.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 4','fablio'),
										'value'	=> 'imagestyle-four',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style4.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 5','fablio'),
										'value'	=> 'imagestyle-five',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style5.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 6','fablio'),
										'value'	=> 'imagestyle-six',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style6.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 7','fablio'),
										'value'	=> 'imagestyle-seven',
										'thumb'	=> get_template_directory_uri() . '/inc/images/tm-imgbox-style7.png',
									),
								),
			'group'		  	=> esc_attr__( 'Box Style', 'fablio' ),
			"std"         	=> "imagestyle-one",
		),
		array(
			'type'			=> 'themetechmount_attach_image',
			'heading'		=> esc_attr__( 'Image', 'fablio' ),
			'param_name'	=> 'image',
			'value'			=> '',
			'description'	=> esc_attr__( 'Select image from media library.', 'fablio' ),
			'admin_label'	=> true,
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Image alignment', 'fablio' ),
			'param_name' => 'alignment',
			'value' => array(
				esc_attr__( 'Left', 'fablio' )		=> 'left',
				esc_attr__( 'Right', 'fablio' )	=> 'right',
				esc_attr__( 'Center', 'fablio' )	=> 'center',
			),
			'description' => esc_attr__( 'Select image alignment.', 'fablio' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Rotating Number', 'fablio' ),
			'param_name'  => 'tmimage_rnumber',
			'description' => esc_attr__( 'Enter rotating number', 'fablio' ),
			'admin_label' => true,
			'dependency'  => array(
				'element'   => 'tm_img_boxstyle',
				'value'     => array( 'imagestyle-one' ),
			),
		),	
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Header Text', 'fablio' ),
			'param_name'  => 'tmimage_rtext',
			'description' => esc_attr__( 'Enter header text', 'fablio' ),
			'admin_label' => true,
			'dependency'  => array(
				'element'   => 'tm_img_boxstyle',
				'value'     => array( 'imagestyle-one','imagestyle-four','imagestyle-six' ),
			),
		),	
		array(
			'type'        => 'vc_link',
			'heading'     => esc_attr__( 'Play Icon URL (Link)', 'fablio' ),
			'param_name'  => 'static_boxlink',
			'description' => esc_attr__( 'Add link for box button', 'fablio' ),
			'admin_label' => true,
			'dependency'  => array(
				'element'   => 'tm_img_boxstyle',
				'value'     => array( 'imagestyle-four' ),
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Extra class name', 'fablio' ),
			'param_name' => 'el_class',
			'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fablio' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_attr__( 'CSS box', 'fablio' ),
			'param_name' => 'css',
			'group' => esc_attr__( 'Design Options', 'fablio' ),
		),
	);


	global $themetechmount_sc_params_single_image;
	$themetechmount_sc_params_single_image = $params;
	
	vc_map( array(
		'name'		=> esc_attr__( 'ThemetechMount Single Image', 'fablio' ),
		'base'		=> 'tm-single-image',
		'icon'		=> 'icon-themetechmount-vc',
		'category'	=> esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'	=> $params,
	) );
