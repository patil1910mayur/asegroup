<?php

/* Options for ThemetechMount Servicebox */

$serviceCatList = array();
if( taxonomy_exists('tm_service_category') ){
	$serviceCatList_data = get_terms( 'tm_service_category', array( 'hide_empty' => false ) );
	$serviceCatList      = array();
	foreach($serviceCatList_data as $cat){
		$serviceCatList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}

// Getting Options
$fablio_theme_options   = get_option('fablio_theme_options');
$service_type_title          = ( !empty($fablio_theme_options['service_type_title']) ) ? $fablio_theme_options['service_type_title'] : 'Service' ;
$service_type_title_singular = ( !empty($fablio_theme_options['service_type_title_singular']) ) ? $fablio_theme_options['service_type_title_singular'] : 'Service' ;
$service_cat_title           = ( !empty($fablio_theme_options['service_cat_title']) ) ? $fablio_theme_options['service_cat_title'] : 'Service Categories' ;
$service_cat_title_singular  = ( !empty($fablio_theme_options['service_cat_title_singular']) ) ? $fablio_theme_options['service_cat_title_singular'] : 'Service Category' ;


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
				"heading"     => esc_attr__("Box Design",'fablio'),
				"description" => esc_attr__("Select box design.",'fablio'),
				"param_name"  => "view",
				"value"       => themetechmount_global_service_template_list( true ),
				"std"         => "styleone",
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show",'fablio'),
				"description" => sprintf( esc_attr__("How many %s item you want to show.", "fablio"), $service_type_title ),
				"param_name"  => "show",
				"value"       => array(
					esc_attr__("All", "fablio") => "-1",
					esc_attr__('1', "fablio")   => "1",
					esc_attr__('2', "fablio")   => "2",
					esc_attr__('3','fablio')    =>'3',
					esc_attr__('4','fablio')    =>'4',
					esc_attr__('5','fablio')    =>'5',
					esc_attr__('6','fablio')    =>'6',
					esc_attr__('7','fablio')    =>'7',
					esc_attr__('8','fablio')    =>'8',
					esc_attr__('9','fablio')    =>'9',
					esc_attr__('10','fablio')   =>'10',
					esc_attr__('11','fablio')   =>'11',
					esc_attr__('12','fablio')   =>'12',
					esc_attr__('13','fablio')   =>'13',
					esc_attr__('14','fablio')   =>'14',
					esc_attr__('15','fablio')   =>'15',
					esc_attr__('16','fablio')   =>'16',
					esc_attr__('17','fablio')   =>'17',
					esc_attr__('18','fablio')   =>'18',
					esc_attr__('19','fablio')   =>'19',
					esc_attr__('20','fablio')   =>'20',
					esc_attr__('21','fablio')   =>'21',
					esc_attr__('22','fablio')   =>'22',
					esc_attr__('23','fablio')   =>'23',
					esc_attr__('24','fablio')   =>'24',
				),
				"std"  => "3",
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show Sortable Category Links",'fablio'),
				"description" => sprintf( esc_attr__("Show sortable category links above %s items so user can sort by just single click.",'fablio'), $service_type_title_singular ),
				"param_name"  => "sortable",
				"value"       => array(
					esc_attr__('No','fablio')  => 'no',
					esc_attr__('Yes','fablio') => 'yes',
				),
				"std"         => "no",
				'dependency'  => array(
					'element'            => 'boxview',
					'value_not_equal_to' => array( 'carousel' ),
				),
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Replace ALL word', 'fablio' ),
				'param_name'  => 'allword',
				'description' => esc_attr__( 'Replace ALL word in sortable category links. Default is ALL word.', 'fablio' ),
				"std"         => "All",
				'dependency'  => array(
					'element'   => 'sortable',
					'value'     => array( 'yes' ),
				),
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_attr__( 'Sortable Button Type', 'fablio' ),
				'description' => esc_attr__( 'Sortable Button type square or round', 'fablio' ),
				'param_name'  => 'sortable_buttontype',
				"value"       => array(
					esc_attr__('Square','fablio')  => 'square',
					esc_attr__('Round','fablio') => 'round',
				),
				"std"         => "square",
				'dependency'  => array(
					'element'   => 'sortable',
					'value'     => array( 'yes' ),
				),
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show Pagination",'fablio'),
				"description" => sprintf( esc_attr__("Show pagination links below %s boxes.",'fablio'), $service_type_title ),
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
				"type"        => "checkbox",
				"heading"     => sprintf( esc_attr__("From %s", "fablio"), $service_cat_title_singular ),
				"description" => sprintf( esc_attr__('If you like to show %1$s from selected %2$s than select the category here.', "fablio"), $service_type_title, $service_cat_title ),
				
				"param_name"  => "category",
				"value"       => $serviceCatList,
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Order by",'fablio'),
				"description" => esc_attr__("Sort retrieved service by parameter.",'fablio'),
				"param_name"  => "orderby",
				"value"       => array(
					esc_attr__('No order (none)','fablio')           => 'none',
					esc_attr__('Order by post id (ID)','fablio')     => 'ID',
					esc_attr__('Order by author (author)','fablio')  => 'author',
					esc_attr__('Order by title (title)','fablio')    => 'title',
					esc_attr__('Order by slug (name)','fablio')      => 'name',
					esc_attr__('Order by date (date)','fablio')      => 'date',
					esc_attr__('Order by last modified date (modified)','fablio') => 'modified',
					esc_attr__('Random order (rand)','fablio')       => 'rand',
					esc_attr__('Order by number of comments (comment_count)','fablio') => 'comment_count',
					
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				"std"              => "date",
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Order",'fablio'),
				"description" => esc_attr__("Designates the ascending or descending order of the 'orderby' parameter.",'fablio'),
				"param_name"  => "order",
				"value"       => array(
					esc_attr__('Ascending (1, 2, 3; a, b, c)','fablio')  => 'ASC',
					esc_attr__('Descending (3, 2, 1; c, b, a)','fablio') => 'DESC',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				"std"              => "DESC",
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
					esc_attr__("15 pixel spacing", "fablio")       		 => "15px",
				),
				"std"  => "",
				'group'		  => esc_attr__( 'Box Style', 'fablio' ),
			)
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
		$params[$i]['std'] = 'Our Services';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
	}
	$i++;
}

global $tm_sc_params_servicesbox;
$tm_sc_params_servicesbox = $params;

vc_map( array(
	"name"     => sprintf( esc_attr__("ThemetechMount %s Box",'fablio'), $service_type_title_singular ),
	"base"     => "tm-servicesbox",
	"class"    => "",
	'category' => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	"icon"     => "icon-themetechmount-vc",
	"params"   => $params,
) );