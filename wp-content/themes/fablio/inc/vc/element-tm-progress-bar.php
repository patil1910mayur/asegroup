<?php

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);

// each progress bar options
$param_group = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'fablio' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar.', 'fablio' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Value', 'fablio' ),
		'param_name' => 'value',
		'description' => esc_attr__( 'Enter value of bar.', 'fablio' ),
		'admin_label' => true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'fablio' ),
		'param_name' => 'color',
		'value' => array(
				esc_attr__( 'Default', 'fablio' ) => '',
			) + array(
				esc_attr__( 'Classic Grey', 'fablio' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'fablio' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'fablio' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'fablio' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'fablio' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'fablio' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'fablio' ) => 'bar_black',
			) + themetechmount_getVcShared( 'colors-dashed' ),
		'description' => esc_attr__( 'Select single bar background color.', 'fablio' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	
	// Show / Hide icon
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Show Icon?', 'fablio' ),
		'param_name' => 'add_icon',
		'value'      => array(
			esc_attr__( 'Yes', 'fablio' ) => 'true',
			esc_attr__( 'No', 'fablio' )  => 'false',
		),
		'std'         => 'true',
		'description' => esc_attr__( 'Want to show icon with the progress bar.', 'fablio' ),
	)
);

// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );

$params =  array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Widget title', 'fablio' ),
		'param_name' => 'title',
		'description' => esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'fablio' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_attr__( 'Values', 'fablio' ),
		'param_name' => 'values',
		'description' => esc_attr__( 'Enter values for graph - value, title and color.', 'fablio' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_attr__( 'Development', 'fablio' ),
				'value' => '90',
			),
			array(
				'label' => esc_attr__( 'Design', 'fablio' ),
				'value' => '80',
			),
			array(
				'label' => esc_attr__( 'Marketing', 'fablio' ),
				'value' => '70',
			),
		) ) ),
		'params' => $param_group,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Units', 'fablio' ),
		'param_name' => 'units',
		'description' => esc_attr__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'fablio' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'fablio' ),
		'param_name' => 'bgcolor',
		'std' => 'skincolor',
		'value' => array(
				esc_attr__( 'Classic Grey', 'fablio' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'fablio' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'fablio' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'fablio' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'fablio' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'fablio' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'fablio' ) => 'bar_black',
			) + themetechmount_getVcShared( 'colors-dashed' ) ,
		'description' => esc_attr__( 'Select bar background color.', 'fablio' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_attr__( 'Options', 'fablio' ),
		'param_name' => 'options',
		'value' => array(
			esc_attr__( 'Add stripes', 'fablio' ) => 'striped',
			esc_attr__( 'Add animation (Note: visible only with striped bar).', 'fablio' ) => 'animated',
		),
	),
);

$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( themetechmount_vc_ele_extra_class_option() ),
	array( themetechmount_vc_ele_css_editor_option() )
);
		
global $tm_sc_params_progressbar;
$tm_sc_params_progressbar = $params;


vc_map( array(
	'name'		=> esc_attr__( 'ThemetechMount Progress Bar', 'fablio' ),
	'base'		=> 'tm-progress-bar',
	'class'		=> '',
	'icon'		=> 'icon-themetechmount-vc',
	'category'	=> esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	'params'	=> $params
) );