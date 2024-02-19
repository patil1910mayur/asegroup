<?php

$heading_params = vc_map_integrate_shortcode( 'tm-heading', '', esc_attr__('Content','fablio'),
	array(
		'exclude' => array(
			'txt_align',
			'seperator',
			'heading_style',
			'el_class',
			'css_animation',
			'css',
		),
	)
);
if ( is_array( $heading_params ) && ! empty( $heading_params ) ) {
	foreach ( $heading_params as $key => $param ) {
		
		if ( is_array( $param ) && isset( $param['param_name'] ) ){
			
			if( $param['param_name'] == 'content' ){
				$heading_params[$key]['value'] = esc_attr('');
				$heading_params[$key]['type'] = 'textarea';
				
			} else if( $param['param_name'] == 'reverse_heading' ){
				$heading_params[$key]['std'] = 'no';
				$heading_params[$key]['value'] = 'no';
				
			}
			
			
		}
	}
}

$btn_params = vc_map_integrate_shortcode( 'tm-btn', 'btn_', esc_attr__('Button','fablio'),
	array(
		'exclude' => array(
			'style',
			'shape',
			'color',
			'size',
			'font_weight',
			'align',
			'i_align',
			'gradient_color_1',
			'gradient_color_2',
			'gradient_custom_color_1',
			'gradient_custom_color_2',
			'gradient_text_color',
			'custom_background',
			'custom_text',
			'outline_custom_color',
			'outline_custom_hover_background',
			'outline_custom_hover_text',
			'button_block',
			'css_animation',
			'css',
		),
	),
	array(
		'element' => 'show_btn',
		'value'   => 'yes',
	)
);

// Extra Class
$extra_class = themetechmount_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Content', 'fablio' );

$vc_map_add_css_animation = vc_map_add_css_animation();
$vc_map_add_css_animation['group'] = esc_attr__( 'Animation', 'fablio' );
	
$params = array_merge(
		array( 
			array(
				"type"        => "themetechmount_style_selector",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Box Design",'fablio'),
				"description" => esc_attr__("Select box design.",'fablio'),
				"param_name"  => "view",
				"value"       => themetechmount_global_iconbox_template_list( true ),
				"std"         => "styleone",
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),		
		),
		
		$heading_params,
		
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_attr__( 'Select Icon Type', 'fablio' ),
				'param_name' => 'main_icon_type',
				'value'      => array(
					esc_attr__( 'Icon', 'fablio' ) => 'icon',
					esc_attr__( 'Image', 'fablio' )  => 'image',
				),
				'std'         => 'icon',
				'group'		  => esc_attr__( 'Icon', 'fablio' ),
				'description' => esc_attr__( 'Want to show icon or image', 'fablio' ),
				'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array( 'styletwo','stylefour','styleeight','stylefive','style14' ),
				),
			),
		),
		
		vc_map_integrate_shortcode( 'tm-icon', 'i_', esc_attr__( 'Icon', 'fablio' ),
		array(	
			'include_only_regex' => '/^(type|icon_\w*)/',
			)
		),
	
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Show button', 'fablio' ),
			'description' => esc_attr__( 'Show/hide button', 'fablio' ),
			'param_name'  => 'show_btn',
			'std'         => 'no',
			'value'       => array(
				esc_attr__( 'Yes', 'fablio' )	=> 'yes',
				esc_attr__( 'No', 'fablio' )	=> 'no',
			),
			'group'		  => esc_attr__( 'Content', 'fablio' ),
			'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array('style1','styleeight','stylenine','style17' ),
			),
		),
		array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'fablio' ),
		'param_name'  => 'smallicon_link',
		'description' => esc_attr__( 'Add link to Bottom icon.', 'fablio' ),
		'group'		  => esc_attr__( 'Button', 'fablio' ),
		'dependency'  => array(
				'element'	=> 'view',
				'value'		=> array('styleeight','style17'),
			)
		),
	
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon Size', 'fablio' ),
			'description' => esc_attr__( 'Show/hide button', 'fablio' ),
			'param_name'  => 'icon_size',
			'std'         => 'no',
			'value'       => array(
				esc_attr__( 'Default', 'fablio' )	=> 'default',
				esc_attr__( 'Small', 'fablio' )	=> 'small',
			),
			'group'		  => esc_attr__( 'Icon', 'fablio' ),
			'dependency'  => array(
					'element'  => 'view',
					'value'	   => array( 'stylethree','stylenine','styletwelve','stylethirteen' ),
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Background shape', 'fablio' ),
			'param_name'  => 'icon_bg_style',
			'value'       => array(
				esc_attr__( 'Circle', 'fablio' ) => 'rounded',
				esc_attr__( 'Square', 'fablio' ) => 'boxed',
				esc_attr__( 'Rounded', 'fablio' ) => 'rounded-less',
				esc_attr__( 'Outline Circle', 'fablio' ) => 'rounded-outline',
				esc_attr__( 'Outline Square', 'fablio' ) => 'boxed-outline',
				esc_attr__( 'Outline Rounded', 'fablio' ) => 'rounded-less-outline',
			),
			'std'         => 'rounded',
			'group'		  => esc_attr__( 'Icon', 'fablio' ),
			'description' => esc_attr__( 'Select background shape and style for icon.', 'fablio' ),
			'dependency'  => array(
					'element'	=> 'view',
					'value'		=> array('stylenine','style14','style15'),
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Content alignment', 'fablio' ),
			'param_name' => 'content_align',
			'value'      => array(
				esc_attr__( 'Left', 'fablio' )   => 'left',
				esc_attr__( 'Right', 'fablio' )  => 'right',
				esc_attr__( 'Center', 'fablio' ) => 'center',
			),
			'std'         => 'center',
			'description' => esc_attr__( 'Select content alignment.', 'fablio' ),
			'group'		  => esc_attr__( 'Icon', 'fablio' ),
			'dependency'  => array(
					'element'	=> 'view',
					'value'		=> array('styletwelve','style15'),
			)
		),
		array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Number', 'fablio'),
				'param_name'		=> 'digit',
				'std'				=> '100',
				'description'		=> esc_attr__('Enter number digit here.', 'fablio'),
				'dependency'  => array(
					'element'	=> 'view',
					'value'		=> array('styleten'),
			)
			),
		array(
			'type' => 'themetechmount_attach_image',
			'heading' => esc_attr__( 'Box Image', 'fablio' ),
			'param_name' => 'mainiconimage',
			'description' => esc_attr__( 'Select image.', 'fablio' ),
			'admin_label' => true,
			'group'		  => esc_attr__( 'Icon', 'fablio' ),
			'dependency'  => array(
					'element'	=> 'main_icon_type',
					'value'		=> array('image'),
			)
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_attr__( 'Highlight BoX', 'fablio' ),
			'param_name'       => 'tm_highlight_box',
			'description'      => esc_attr__( 'Highlight this iconbox', 'fablio' ),
			'std'			   => 'false',
			'group'		  => esc_attr__( 'Content', 'fablio' ),
			'dependency'  => array(
					'element'            => 'view',
					'value'		=> array('styleeleven'),
			),
		),
	),
	
	$btn_params,
	
	array(
		$extra_class,
		themetechmount_vc_ele_css_editor_option(),
	)
	
	
);


global $tm_sc_params_iconbox;
$tm_sc_params_iconbox = $params;

vc_map( array(
	"name"     => sprintf( esc_attr__("ThemetechMount IconBox",'fablio') ),
	"base"     => "tm-iconbox",
	"class"    => "",
	'category' => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	"icon"     => "icon-themetechmount-vc",
	"params"   => $params,
) );