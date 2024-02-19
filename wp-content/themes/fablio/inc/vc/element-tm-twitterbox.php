<?php

/* Options */

$allParams = array(
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Twitter handle (Twitter Username)",'fablio'),
			"param_name"	=> "username",
			"description"	=> esc_attr__('Twitter user name. Example "envato".','fablio')
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__('"Follow us" text after big icon','fablio'),
			"param_name"	=> "followustext",
			"description"	=> esc_attr__('(optional) Follow us text after the big Twitter icon so user can click on it and go to Twitter profile page.','fablio')
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Show Tweets",'fablio'),
			"param_name"	=> "show",
			"description"	=> esc_attr__('How many Tweets you like to show.','fablio'),
			'value' => array(
				esc_attr__( '1', 'fablio' ) => '1',
				esc_attr__( '2', 'fablio' ) => '2',
				esc_attr__( '3', 'fablio' ) => '3',
				esc_attr__( '4', 'fablio' ) => '4',
				esc_attr__( '5', 'fablio' ) => '5',
				esc_attr__( '6', 'fablio' ) => '6',
				esc_attr__( '7', 'fablio' ) => '7',
				esc_attr__( '8', 'fablio' ) => '8',
				esc_attr__( '9', 'fablio' ) => '9',
				esc_attr__( '10', 'fablio' ) => '10',
			),
			'std' => '3',
		),
		
	);

$boxParams  = themetechmount_box_params();
$css_editor = array( themetechmount_vc_ele_css_editor_option() );

$params = array_merge( $allParams, $boxParams, $css_editor );



// Changing default values
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'one';
	
	} else if( $param_name == 'view' ){
		$params[$i]['std'] = 'carousel';
		
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
		
	} else if( $param_name == 'carousel_nav' ){ // Removing "About Carousel" option as it's not used here.
		unset( $params[$i]['value']["Above Carousel"] );
		
	}
	
	$i++;
}

global $tm_sc_params_twitterbox;
$tm_sc_params_twitterbox = $params;

vc_map( array(
	"name"        => esc_attr__("ThemetechMount Twitter Box",'fablio'),
	"base"        => "tm-twitterbox",
	"class"       => "",
	'category' => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	"icon"        => "icon-themetechmount-vc",
	"params"      => $params,
) );