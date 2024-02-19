<?php

/* Options */

$clientsGroupList = array();
if( taxonomy_exists('tm_client_group') ){
	$clientsGroupList_data = get_terms( 'tm_client_group', array( 'hide_empty' => false ) );
	$clientsGroupList      = array();
	foreach($clientsGroupList_data as $cat){
		$clientsGroupList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}

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

/**
 * Box Design options
 */
$boxParams = themetechmount_box_params();

$allParams = array_merge(
	$heading_element,
	array(
		array(
			"type"        => "themetechmount_style_selector",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Client Logo Design",'fablio'),
			"description" => esc_attr__("Select Client logo design.",'fablio'),
			"param_name"  => "view",
			"value"       => themetechmount_global_client_template_list( true ),
			"std"         => "simple-logo",
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show", "fablio"),
			"param_name"  => "show",
			"description" => esc_attr__("Total Clients Logos you want to show.", "fablio"),
			"value"       => array(
				esc_attr__("All", "fablio") => "-1",
				esc_attr__("1", "fablio")  => "1",
				esc_attr__("2", "fablio") => "2",
				esc_attr__("3", "fablio") => "3",
				esc_attr__("4", "fablio") => "4",
				esc_attr__("5", "fablio") => "5",
				esc_attr__("6", "fablio") => "6",
				esc_attr__("7", "fablio") => "7",
				esc_attr__("8", "fablio") => "8",
				esc_attr__("9", "fablio") => "9",
				esc_attr__("10", "fablio") => "10",
				esc_attr__("11", "fablio") => "11",
				esc_attr__("12", "fablio") => "12",
				esc_attr__("13", "fablio") => "13",
				esc_attr__("14", "fablio") => "14",
				esc_attr__("15", "fablio") => "15",
				esc_attr__("16", "fablio") => "16",
				esc_attr__("17", "fablio") => "17",
				esc_attr__("18", "fablio") => "18",
				esc_attr__("19", "fablio") => "19",
				esc_attr__("20", "fablio") => "20",
			),
			"std"  => "10",
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("From Group", "fablio"),
			"param_name"  => "category",
			"description" => esc_attr__("Select group so it will show client logo from selected group only.", "fablio"),
			"value"       => $clientsGroupList,
			"std"         => "",
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Tooltip on Logo?",'fablio'),
			"description" => esc_attr__("Select YES to show Tooltip on the logo.",'fablio'),
			"param_name"  => "show_tooltip",
			"value"       => array(
				esc_attr__("Yes", "fablio") => "yes",
				esc_attr__("No", "fablio")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Add link to all logos?",'fablio'),
			"description" => esc_attr__("Select YES to add link to all logos. Please note that link should be added to each client logo. If no link found than the logo will appear without link.",'fablio'),
			"param_name"  => "add_link",
			"value"       => array(
				esc_attr__("Yes", "fablio") => "yes",
				esc_attr__("No", "fablio")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
			
	),
	$boxParams,
	array(
		themetechmount_vc_ele_css_editor_option(),
	)
);

$params = $allParams;

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Clients';
	
	} else if( $param_name == 'column' ){
		$params[$i]['std'] = 'five';
		
	} else if( $param_name == 'boxview' ){
		$params[$i]['std'] = 'carousel';
		
	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';
		
	} else if( $param_name == 'carousel_loop' ){
		$params[$i]['std'] = '1';
		
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
		
	} else if( $param_name == 'carousel_nav' ){
		$params[$i]['std'] = '0';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	}
	
	$i++;
}

global $tm_sc_params_clients;
$tm_sc_params_clients = $params;


vc_map( array(
	"name"     => esc_attr__("ThemetechMount Client Logo Box", "fablio"),
	"base"     => "tm-clientsbox",
	"icon"     => "icon-themetechmount-vc",
	'category' => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	"params"   => $params,
) );