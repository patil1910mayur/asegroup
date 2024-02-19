<?php

/* Options for ThemetechMount Testimonial box */

// Fetching all Testmonial group names
$testimonialGroups = array();
if( taxonomy_exists('tm_testimonial_group') ){
	$testimonial_groups = get_terms( 'tm_testimonial_group', array('hide_empty'=>false) );
	$testimonialGroups  = array();
	foreach( $testimonial_groups as $group ){
		$totalcount = 0;
		if( trim($group->count) > 0 ){
			$totalcount = $group->count;
		}
		$testimonialGroups[ $group->name.' ('.$totalcount.')' ] = $group->slug;
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
$boxParams = themetechmount_box_params('testimonial');

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
			"value"       => themetechmount_global_testimonial_template_list( true ),
			"std"         => "style-1",
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show", "fablio"),
			"param_name"  => "show",
			"description" => esc_attr__("Total Testimonials you want to show.", "fablio"),
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
			"std"  => "3",
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Sortable Category Links",'fablio'),
			"description" => esc_attr__("Show sortable category links above Testimonial boxes so user can sort by category by just single click.",'fablio'),
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
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Pagination",'fablio'),
			"description" => esc_attr__("Show pagination links below Testimonial boxes.",'fablio'),
			"param_name"  => "pagination",
			"value"       => array(
				esc_attr__('No','fablio')  => 'no',
				esc_attr__('Yes','fablio') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'            => 'sortable',
				'value_not_equal_to' => array( 'yes' ),
			),
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("From Group", "fablio"),
			"param_name"  => "category",
			"description" => esc_attr__("Select group so it will show Testimonials from selected group only.", "fablio"),
			"value"       => $testimonialGroups,
			"std"         => "",
			'group'		  => esc_attr__( 'Box Style', 'fablio' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order by",'fablio'),
			"description" => esc_attr__("Sort retrieved portfolio by parameter.",'fablio'),
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
		$params[$i]['std'] = 'Testimonials';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';
		
	}
	
	$i++;
}

global $tm_sc_params_testimonialbox;
$tm_sc_params_testimonialbox = $params;


vc_map( array(
	"name"     => esc_attr__("ThemetechMount Testimonial Box", "fablio"),
	"base"     => "tm-testimonialbox",
	"icon"     => "icon-themetechmount-vc",
	'category' => esc_attr__( 'ThemetechMount Elements', 'fablio' ),
	"params"   => $params,
) );