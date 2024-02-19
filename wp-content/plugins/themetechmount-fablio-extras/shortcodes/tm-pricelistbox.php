<?php
// [tm-pricelistbox]
if( !function_exists('themetechmount_sc_pricelist') ){
function themetechmount_sc_pricelist( $atts, $content=NULL ){
	
	$return = '';
	if( function_exists('vc_map') ){
		
	global $tm_vc_custom_element_pricelistbox;
	$options_list = themetechmount_create_options_list($tm_vc_custom_element_pricelistbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	

	// Heading element
		$return .= themetechmount_vc_element_heading( get_defined_vars() );
		
	// pricelist lists
	$pricelist = json_decode(urldecode($pricelist));
	
	// image size
	$tm_workhour_style   = ( !empty($tm_workhour_style) ) ? $tm_workhour_style : '' ;
		
	$return .= '<div class="tm-pricelist-block-wrapper '. $tm_workhour_style .'">';
	$return .= '<ul class="tm-pricelist-block">';
		foreach( $pricelist as $data ){
			
			$service_name 	= '';
			$timing = '';
			
			//service_name 
			if( !empty($data->service_name) ){
				$servicename = ( isset($data->service_name) ) ? $data->service_name : '';
				$tm_servicename= '<span class="service-title">'.$servicename.'</span>';
			}
			
			//price
			if( !empty($data->price) ){
				$price = ( isset($data->price) ) ? $data->price : '';
				$prices= '<span class="service-price">'.$price.'</span>';
			}
			
			$return .= '<li>'.$tm_servicename.$prices.'</li>';
			
		}
	$return .= '</ul> <!-- .tm-pricelist-block -->';
	$return .= '</div><!-- .tm-pricelist-block-wrapper -->  ';
	

	$wrapperStart = '<div class="themetechmount-pricelistbox-wrapper '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
}
}
add_shortcode( 'tm-pricelistbox', 'themetechmount_sc_pricelist' );