<?php

/**
 *  ThemetechMount: Cms banner Box
 */
 
 
	$params = array(
		
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
		array (
			'param_name' 	=> 'link_text',
			'type' 			=> 'textfield',
			'heading' 		=> __('Link Text', 'fablio'),
			'description' 	=> __('URL linkable text  ex.Shop Now', 'fablio'),
			'admin_label'	=> false,
		),
		 array (
			'param_name' 	=> 'linktext_color',
			'type' 	 => 'colorpicker',
			'heading' 	 => __('Link Text Color', 'fablio'),
		),
		array (
			'param_name' 	=> 'link_url',
			'type' 			=> 'textfield',
			'heading' 		=> __('Link URL', 'fablio'),
			'description' 	=> __('ex. https://www.google.co.in/', 'fablio'),
		),
		array (
			'param_name' 	=> 'text1',
			'type' 			=> 'textarea',
			'heading' 		=> __('Text 1', 'fablio'),
			'description' 	=> __('Text1  ex.Shopper Bag', 'fablio'),
			'admin_label'	=> false,
		),
		array (
			'param_name' 	=> 'text1_color',
			'type' 	 => 'colorpicker',
			'heading' 	 => __('Text 1 Color', 'fablio'),
		),				
		array (
			'param_name' 	=> 'text2',
			'type' 			=> 'textarea',
			'heading' 		=> __('Text 2', 'fablio'),
			'description' 	=> __('Text2  ex.The World Catelog Ideas', 'fablio'),
			'admin_label'	=> false,
		),
		 array (
			'param_name' 	=> 'text2_color',
			'type' 	 => 'colorpicker',
			'heading' 	 => __('Text 2 Color', 'fablio'),
		),
		array (
			'param_name' 	=> 'text3',
			'type' 			=> 'textarea',
			'heading' 		=> __('Text 3', 'fablio'),
			'description' 	=> __('Text3  ex.The World Catelog Ideas', 'fablio'),
			'admin_label'	=> false,
		),
		 array (
			'param_name' 	=> 'text3_color',
			'type' 	 => 'colorpicker',
			'heading' 	 => __('Text 3 Color', 'fablio'),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Content alignment', 'fablio' ),
			'param_name' => 'content_alignment',
			'value' => array(
				esc_attr__( 'Left', 'fablio' )		=> 'left',
				esc_attr__( 'Right', 'fablio' )	=> 'right',
				esc_attr__( 'Center', 'fablio' )	=> 'center',
			),
			'std' => 'center',
			'description' => esc_attr__( 'Select Content alignment.', 'fablio' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Extra class name', 'fablio' ),
			'param_name' => 'el_class',
			'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fablio' ),
		),
	);


	global $themetechmount_sc_params_cmsbanner_block;
	$themetechmount_sc_params_cmsbanner_block = $params;
	
	vc_map( array(
		'name'		=> esc_attr__( 'ThemetechMount Banner Block', 'fablio' ),
		'base'		=> 'tm-cmsbanner-block',
		'icon'		=> 'icon-themetechmount-vc',
		'category'	=> esc_attr__( 'ThemetechMount Elements', 'fablio' ),
		'params'	=> $params,
	) );
