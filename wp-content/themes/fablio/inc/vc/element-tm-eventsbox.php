<?php

/* Options */

$allParams = array(
	array(
		"type"        => "themetechmount_style_selector",
		"heading"     => esc_attr__("Box Style", "fablio"),
		"description" => esc_attr__("Select box style.", "fablio"),
		"group"       => esc_attr__( "Box Design", "fablio" ),
		"param_name"  => "view",
		'value'		  => array(
							array(
								'label'	=> esc_attr('Default Style','fablio'),
								'value'	=> 'top-image',
								'thumb'	=> get_template_directory_uri() . '/inc/images/eventbox-style1.png',
							),
						),
		"std"         => "top-image",
		'group'		  => esc_attr__( 'Box Style', 'fablio' ),
	),
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Events Item",'fablio'),
		"description" => esc_attr__("How many events you want to show.",'fablio'),
		"param_name"  => "show",
		"value"       => array(
			esc_attr__('All','fablio') => '-1',
			esc_attr__('1','fablio')  => '1',
			esc_attr__('2','fablio') => '2',
			esc_attr__('3','fablio')=>'3',
			esc_attr__('4','fablio')=>'4',
			esc_attr__('5','fablio')=>'5',
			esc_attr__('6','fablio')=>'6',
			esc_attr__('7','fablio')=>'7',
			esc_attr__('8','fablio')=>'8',
			esc_attr__('9','fablio')=>'9',
			esc_attr__('10','fablio')=>'10',
			esc_attr__('11','fablio')=>'11',
			esc_attr__('12','fablio')=>'12',
			esc_attr__('13','fablio')=>'13',
			esc_attr__('14','fablio')=>'14',
			esc_attr__('15','fablio')=>'15',
			esc_attr__('16','fablio')=>'16',
			esc_attr__('17','fablio')=>'17',
			esc_attr__('18','fablio')=>'18',
			esc_attr__('19','fablio')=>'19',
			esc_attr__('20','fablio')=>'20',
			esc_attr__('21','fablio')=>'21',
			esc_attr__('22','fablio')=>'22',
			esc_attr__('23','fablio')=>'23',
			esc_attr__('24','fablio')=>'24',
		),
		"std"  => "3",
		'group'		  => esc_attr__( 'Box Style', 'fablio' ),
	),
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Pagination",'fablio'),
		"description" => esc_attr__("Show pagination links below Event boxes.",'fablio'),
		"param_name"  => "pagination",
		"value"       => array(
			esc_attr__('No','fablio')  => 'no',
			esc_attr__('Yes','fablio') => 'yes',
		),
		"std"         => "no",
		'dependency'  => array(
			'element'    => 'sortable',
			'value_not_equal_to' => array( 'yes' ),
		),
		'group'		  => esc_attr__( 'Box Style', 'fablio' ),
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Box Spacing", "fablio"),
		"param_name"  => "box_spacing",
		"description" => esc_attr__("Spacing between each box.", "fablio"),
		"value"       => array(
			esc_attr__("Default", "fablio")                        => "",
			esc_attr__("0 pixel spacing (joint boxes)", "fablio")  => "0px",
			esc_attr__("5 pixel spacing", "fablio")                => "5px",
			esc_attr__("10 pixel spacing", "fablio")               => "10px",
		),
		"std"  => "",
		'group'		  => esc_attr__( 'Box Style', 'fablio' ),
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

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Latest Events';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	}
	$i++;
}

global $tm_sc_params_eventsbox;
$tm_sc_params_eventsbox = $params;


vc_map( array(
	"name"     => esc_attr__("ThemetechMount Events Box", "fablio"),
	"base"     => "tm-eventsbox",
	"icon"     => "icon-themetechmount-vc",
	'category' => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	"params"   => $params
) );