<?php

/* Options */

$allParams = array(
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'List Type', 'fablio' ),
		'param_name' => 'type',
		'value'      => array(
			esc_attr__( 'None', 'fablio' )                    => 'none',
			esc_attr__( 'Icon', 'fablio' )                    => 'icon',
			esc_attr__( 'Disc', 'fablio' )                    => 'disc',
			esc_attr__( 'Circle', 'fablio' )                  => 'circle',
			esc_attr__( 'Square', 'fablio' )                  => 'square',
			esc_attr__( 'Decimal (1, 2, 3, 4)', 'fablio' )    => 'decimal',
			esc_attr__( 'Alphabetic (A, B, C, D)', 'fablio' ) => 'upper-alpha',
			esc_attr__( 'Roman (I, II, III, IV)', 'fablio' )  => 'roman',
		),
		'std'         => 'icon',
		'description' => esc_attr__( 'Select list style.', 'fablio' ),
	),

	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'List icon color', 'fablio' ),
		'param_name' => 'icon_color',
		'value'      => array( esc_attr__( 'Default (same as text color)', 'fablio' ) => '' ) + themetechmount_getVcShared( 'colors' ),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select icon color.', 'fablio' ),
		'param_holder_class' => 'tm_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Text Color", "fablio"),
		"description" => esc_attr__("Select text color.", "fablio"),
		"param_name"  => "tm_textcolor",
		'value'       => array( esc_attr__( 'Default', 'fablio' ) => '' ) + themetechmount_getVcShared( 'colors' ),
		'param_holder_class' => 'tm_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
	),
	
	
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'List Font size', 'fablio' ),
		'param_name' => 'textsize',
		'value'      => array(
			esc_attr__( 'Default', 'fablio' )     => '',
			esc_attr__( 'Small', 'fablio' )       => 'small',
			esc_attr__( 'Medium', 'fablio' )      => 'medium',
			esc_attr__( 'Large', 'fablio' )       => 'large',
			esc_attr__( 'Extra Large', 'fablio' ) => 'xlarge',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select list font size. This will also apply to icon too', 'fablio' ),
	),
);

$icon_options = vc_map_integrate_shortcode(
	'tm-icon',
	'icon_',
	'',
	array(
		'include_only' => array(
			'type',
			'icon_fontawesome',
			'icon_linecons',
			'icon_themify',
		),
	),
	array(
		'element' => 'type',
		'value'   => 'icon',
	)
);

// Setting default icon for Font Awesome icon
foreach( $icon_options as $index=>$icon_option ){
	if( isset($icon_option['param_name']) && $icon_option['param_name']=='icon_icon_fontawesome' ){
		$icon_options[$index]['value'] = 'fa fa-angle-right';
	}
}

// each line
$lines = array();
$total = 20;
for( $x=1; $x <= $total ; $x++ ){
	$lines[] = array(
		'type'        => 'textarea_raw_html',
		'heading'     => sprintf( esc_attr__( 'List Line %s','fablio' ), $x ),
		'param_name'  => 'line'.$x,
		'description' => esc_attr__( 'Enter text for the list line. Some HTML tags are allowed.', 'fablio' ),
		'std'         => '',
		'value'       => '',
		'param_holder_class' => 'tm-simplify-textarea',
	);
}

// Merge all parameters
$params = array_merge( $allParams, $icon_options, $lines, array( vc_map_add_css_animation() ), array( themetechmount_vc_ele_extra_class_option() ), array( themetechmount_vc_ele_css_editor_option() ) );

// Changing default values
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'icon_type' ){
		$params[$i]['std']   = 'fontawesome';
	
	} else if( $param_name == 'icon_icon_fontawesome' ){
		$params[$i]['value'] = 'fa fa-caret-right';
		$params[$i]['std']   = 'fa fa-caret-right';
		
	} else if( $param_name == 'icon_icon_linecons' ){
		$params[$i]['value'] = 'vc_li vc_li-location';
		$params[$i]['std']   = 'vc_li vc_li-location';
	
	} else if( $param_name == 'icon_icon_themify' ){
		$params[$i]['value'] = 'themifyicon ti-angle-double-right';
		$params[$i]['std']   = 'themifyicon ti-angle-double-right';

	}
	
	$i++;
}

global $tm_sc_params_list;
$tm_sc_params_list = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemetechMount List', 'fablio' ),
	'base'		=> 'tm-list',
	'class'		=> '',
	'icon'		=> 'icon-themetechmount-vc',
	'category'	=> esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	'params'	=> $params
) );