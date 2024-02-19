<?php

/* Options */

$allParams1 =  array(
	array(
		"type"			=> "themetechmount_style_selector",
		"heading"		=> esc_attr__("Design", 'fablio'),
		"param_name"	=> "view",
		"description"	=> esc_attr__('Select box design.' , 'fablio'),
		'value'			=> array(
							array(
								'label'	=> esc_attr('Style 1','fablio'),
								'value'	=> 'topicon',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style1.png',
							),
							array(
								'label'	=> esc_attr('Style 2','fablio'),
								'value'	=> 'lefticon',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style2.png',
							),
							array(
								'label'	=> esc_attr('Style 3','fablio'),
								'value'	=> 'righticon',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style3.png',
							),
							array(
								'label'	=> esc_attr('Style 4','fablio'),
								'value'	=> 'circle-progress',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style4.png',
							),
							array(
								'label'	=> esc_attr('Style 5','fablio'),
								'value'	=> 'lefticon-style2',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style5.png',
							),
							array(
								'label'	=> esc_attr('Style 6','fablio'),
								'value'	=> 'style6',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style6.png',
							),
							array(
								'label'	=> esc_attr('Style 7','fablio'),
								'value'	=> 'style7',
								'thumb'	=> get_template_directory_uri() . '/inc/images/fid-style7.png',
							),
						),
		'std'           => 'topicon',
		'group'			=> esc_attr__( 'Boxes Appearance', 'fablio' ),
	),
	array(
		'type'			=> 'textarea',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Header (optional)', 'fablio'),
		'param_name'	=> 'title',
		'std'			=> esc_attr__('Title Text', 'fablio'),
		'description'	=> esc_attr__('Enter text for the title. Leave blank if no title is needed.', 'fablio')
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_attr__( 'Add icon?', 'fablio' ),
		'param_name' => 'add_icon',
		'std'        => 'true',
		'edit_field_class'	=> 'vc_col-sm-2 vc_column',
		'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array( 'circle-progress' ),
				),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_attr__( 'Box View?', 'fablio' ),
		'param_name' => 'add_border',
		'std'        => 'false',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array( 'circle-progress','topicon' ),
				),
		'group'			=> esc_attr__( 'Boxes Appearance', 'fablio' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Circle fill color', 'fablio' ),
		'param_name' => 'circle_fill_color',
		'value'      => array(
				esc_attr__( 'Skincolor', 'fablio' )      => 'skincolor',
				esc_attr__( 'Dark Grey', 'fablio' )      => '20292f',
				esc_attr__( 'White', 'fablio' ) 		   => '#fff',
			),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select circle fill color.', 'fablio' ),
		'param_holder_class' => 'tm_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
		'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array( 'topicon','lefticon-style2','lefticon','righticon','lefticon-border','righticon-border','style6' ),
				),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Circle empty color', 'fablio' ),
		'param_name' => 'circle_empty_color',
		'value'      => array(
				esc_attr__( 'Skincolor', 'fablio' )      => 'skincolor',
				esc_attr__( 'Dark Grey', 'fablio' )      => '20292f',
				esc_attr__( 'White', 'fablio' ) 		   => 'fff',
			),
		'std'         => '20292f',
		'description' => esc_attr__( 'Select circle empty color.', 'fablio' ),
		'param_holder_class' => 'tm_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
		'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array( 'topicon','lefticon-style2','lefticon','righticon','lefticon-border','righticon-border','style6'),
				),
	),
);

$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '', array(
	'include_only_regex' => '/^(type|icon_\w*)/',
), array(
	'element' => 'add_icon',
	'value' => 'true',
) );

$icons_params_new = array();

/* Adding class for two column */
foreach( $icons_params as $param ){
	$param['edit_field_class'] = 'vc_col-sm-6 vc_column';
	$icons_params_new[] = $param;
}

$allParams2 = array(
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Rotating Number', 'fablio'),
				'param_name'		=> 'digit',
				'std'				=> '100',
				'description'		=> esc_attr__('Enter rotating number digit here.', 'fablio'),
			),
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'heading'			=> esc_attr__('Text Before Number', 'fablio'),
				'param_name'		=> 'before',
				'description'		=> esc_attr__('Enter text which appear just before the rotating numbers.', 'fablio'),
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"heading"		=> esc_attr__("Text Style",'fablio'),
				"param_name"	=> "beforetextstyle",
				"description"	=> esc_attr__('Select text style for the text.', 'fablio') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','fablio') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','fablio'),
				'value' => array(
					esc_attr__( 'Superscript', 'fablio' ) => 'sup',
					esc_attr__( 'Subscript', 'fablio' )   => 'sub',
					esc_attr__( 'Normal', 'fablio' )      => 'span',
				),
				'std' => 'sup',
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Text After Number', 'fablio'),
				'param_name'		=> 'after',
				'description'		=> esc_attr__('Enter text which appear just after the rotating numbers.', 'fablio'),
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> esc_attr__("Text Style",'fablio'),
				"param_name"	=> "aftertextstyle",
				"description"	=> esc_attr__('Select text style for the text.', 'fablio') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','fablio') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','fablio'),
				'value' => array(
					esc_attr__( 'Superscript', 'fablio' ) => 'sup',
					esc_attr__( 'Subscript', 'fablio' )   => 'sub',
					esc_attr__( 'Normal', 'fablio' )      => 'span',
				),
				'std' => 'sub',
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class'			=> '',
				'heading'		=> esc_attr__('Rotating digit Interval', 'fablio'),
				'param_name'	=> 'interval',
				'std'			=> '5',
				'description'	=> esc_attr__('Enter rotating interval number here.', 'fablio')
			)
);

// merging all options
$params = array_merge( $allParams1, $icons_params_new, $allParams2 );

// merging extra options like css animation, css options etc
$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( themetechmount_vc_ele_extra_class_option() ),
	array( themetechmount_vc_ele_css_editor_option() )
);

global $tm_sc_params_facts_in_digits;
$tm_sc_params_facts_in_digits = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemetechMount Facts in digits', 'fablio' ),
	'base'		=> 'tm-facts-in-digits',
	'class'		=> '',
	'icon'		=> 'icon-themetechmount-vc',
	'category'	=> esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	'params'	=> $params
) );