<?php

/* Options for ThemetechMount Button */

global $tm_pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);
// populate integrated tm-icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( 'i_type' === $param['param_name'] ) {
				// Do nothing
			}
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}

		}
	}
}
$params = array_merge(
	array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_attr__( 'Text', 'fablio' ),
			'param_name' => 'title',
			'value'      => esc_attr__( 'Text on the button', 'fablio' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_attr__( 'URL (Link)', 'fablio' ),
			'param_name' => 'link',
			'description' => esc_attr__( 'Add link to button.', 'fablio' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Style', 'fablio' ),
			'description' => esc_attr__( 'Select button display style.', 'fablio' ),
			'param_name' => 'style',
			'std'		 => 'flat',
			'value' => array(
				esc_attr__( 'Flat', 'fablio' ) => 'flat',
				esc_attr__( 'Modern', 'fablio' ) => 'modern',
				esc_attr__( 'Classic', 'fablio' ) => 'classic',
				esc_attr__( 'Outline', 'fablio' ) => 'outline',
				esc_attr__( '3d', 'fablio' ) => '3d',
				esc_attr__( 'Simple Text', 'fablio' ) => 'text',
				esc_attr__( 'Custom', 'fablio' ) => 'custom',
				esc_attr__( 'Outline custom', 'fablio' ) => 'outline-custom',
				esc_attr__( 'Gradient', 'fablio' ) => 'gradient',
				esc_attr__( 'Gradient Custom', 'fablio' ) => 'gradient-custom',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 1', 'fablio' ),
			'param_name' => 'gradient_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'fablio' ),
			'param_holder_class' => 'tm_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => themetechmount_getVcShared( 'colors-dashed' ),
			'std' => 'turquoise',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 2', 'fablio' ),
			'param_name' => 'gradient_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'fablio' ),
			'param_holder_class' => 'tm_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => themetechmount_getVcShared( 'colors-dashed' ),
			'std' => 'blue',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 1', 'fablio' ),
			'param_name' => 'gradient_custom_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'fablio' ),
			'param_holder_class' => 'tm_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#dd3333',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 2', 'fablio' ),
			'param_name' => 'gradient_custom_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'fablio' ),
			'param_holder_class' => 'tm_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#eeee22',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Button Text Color', 'fablio' ),
			'param_name' => 'gradient_text_color',
			'description' => esc_attr__( 'Select button text color.', 'fablio' ),
			'param_holder_class' => 'tm_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#ffffff',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Background', 'fablio' ),
			'param_name' => 'custom_background',
			'description' => esc_attr__( 'Select custom background color for your element.', 'fablio' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#ededed',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Text', 'fablio' ),
			'param_name' => 'custom_text',
			'description' => esc_attr__( 'Select custom text color for your element.', 'fablio' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Outline and Text', 'fablio' ),
			'param_name' => 'outline_custom_color',
			'description' => esc_attr__( 'Select outline and text color for your element.', 'fablio' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover background', 'fablio' ),
			'param_name' => 'outline_custom_hover_background',
			'description' => esc_attr__( 'Select hover background color for your element.', 'fablio' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover text', 'fablio' ),
			'param_name' => 'outline_custom_hover_text',
			'description' => esc_attr__( 'Select hover text color for your element.', 'fablio' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#fff',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Shape', 'fablio' ),
			'description' => esc_attr__( 'Select button shape.', 'fablio' ),
			'param_name'  => 'shape',
			'std'		  => 'rounded',
			'value'       => array(
				esc_attr__( 'Square', 'fablio' ) => 'square',
				esc_attr__( 'Rounded', 'fablio' ) => 'rounded',
				esc_attr__( 'Round', 'fablio' ) => 'round',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Color', 'fablio' ),
			'param_name' => 'color',
			'description' => esc_attr__( 'Select button color.', 'fablio' ),
			'param_holder_class' => 'tm_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
							esc_attr__( '[Skin Color]', 'fablio' ) => 'skincolor',
							esc_attr__( '[Gradient Color]', 'fablio' ) => 'gradient',
							esc_attr__( 'Classic Grey', 'fablio' ) => 'default',
							esc_attr__( 'Classic Blue', 'fablio' ) => 'primary',
							esc_attr__( 'Classic Turquoise', 'fablio' ) => 'info',
							esc_attr__( 'Classic Green', 'fablio' ) => 'success',
							esc_attr__( 'Classic Orange', 'fablio' ) => 'warning',
							esc_attr__( 'Classic Red', 'fablio' ) => 'danger',
							esc_attr__( 'Classic Black', 'fablio' ) => 'inverse'
					   ) + themetechmount_getVcShared( 'colors-dashed' ),
			'std' => 'skincolor',
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array( 'custom', 'outline-custom' )
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Button Size', 'fablio' ),
			'param_name' => 'size',
			'description' => esc_attr__( 'Select button display size.', 'fablio' ),
			'std' => 'md',
			'value' => themetechmount_getVcShared( 'sizes' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Button Text Bold?', 'fablio' ),
			'param_name'  => 'font_weight',
			'description' => esc_attr__( 'Select YES if you like to bold the font text.', 'fablio' ),
			'std'         => 'no',
			'value'       => array(
				esc_attr__( 'Yes', 'fablio' ) => 'yes',
				esc_attr__( 'No', 'fablio' )  => 'no',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Alignment', 'fablio' ),
			'param_name' => 'align',
			'description' => esc_attr__( 'Select button alignment.', 'fablio' ),
			'value' => array(
				esc_attr__( 'Inline', 'fablio' ) => 'inline',
				esc_attr__( 'Left', 'fablio' ) => 'left',
				esc_attr__( 'Right', 'fablio' ) => 'right',
				esc_attr__( 'Center', 'fablio' ) => 'center'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Set full width button?', 'fablio' ),
			'param_name' => 'button_block',
			'dependency' => array(
				'element'            => 'align',
				'value_not_equal_to' => 'inline',
			),
			'value'      => array(
				esc_attr__( 'No', 'fablio' )  => 'false',
				esc_attr__( 'Yes', 'fablio' ) => 'true',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Add icon?', 'fablio' ),
			'param_name' => 'add_icon',
			'value'      => array(
				esc_attr__( 'No',  'fablio' ) => '',
				esc_attr__( 'Yes', 'fablio' ) => 'true',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Icon Alignment', 'fablio' ),
			'description' => esc_attr__( 'Select icon alignment.', 'fablio' ),
			'param_name' => 'i_align',
			'value' => array(
				esc_attr__( 'Left', 'fablio' ) => 'left',
				esc_attr__( 'Right', 'fablio' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
		),
	),
	
	$icons_params,
	
	array(
		vc_map_add_css_animation(),
		themetechmount_vc_ele_extra_class_option(),
		themetechmount_vc_ele_css_editor_option(),
	)
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	
	// Button Icon
	if( $param_name == 'i_align' ){
		$params[$i]['std'] = 'right';
	
	} else if( $param_name == 'i_type' ){
		$params[$i]['std'] = 'themify';
		
	} else if( $param_name == 'i_icon_themify' ){
		$params[$i]['std']   = 'themifyicon ti-arrow-right';
		$params[$i]['value'] = 'themifyicon ti-arrow-right';

	}
		
	$i++;
} // Foreach

global $tm_sc_params_btn;
$tm_sc_params_btn = $params;

vc_map( array(
	'name'     => esc_attr__( 'ThemetechMount Button', 'fablio' ),
	'base'     => 'tm-btn',
	'icon'     => 'icon-themetechmount-vc',
	'category' => array( esc_attr__( 'ThemetechMount Elements', 'fablio' ) ),
	'params'   => $params,
	'js_view'  => 'VcButton3View',
	'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
