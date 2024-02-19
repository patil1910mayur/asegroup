<?php
// [tm-datecounter]
if( !function_exists('themetechmount_sc_datecounter') ){
function themetechmount_sc_datecounter( $atts, $content=NULL ){
	
	$return = '';
	
	
	if( function_exists('vc_map') ){
		
		global $tm_vc_custom_element_datecounterbox;
		$options_list = themetechmount_create_options_list($tm_vc_custom_element_datecounterbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		

		
	$ctaShortcode = '[tm-heading ';
	foreach( $options_list as $key=>$val ){
		if( trim( ${$key} )!='' ){
			$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';

		}
	}
	$ctaShortcode .= 'el_width="100%" css_animation=""][/tm-heading]';	
	
	$return = do_shortcode($ctaShortcode);
	
	
		$class = array();
		
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		
		if ( empty( $atts['counterdate'] ) ) {
			$atts['counterdate'] = '';
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = themetechmount_vc_shortcode_custom_css_class( $css );
		}
		

		
		$class = implode(' ', $class );
		$return .= '<div class="countdown-box">';
		$return .= '<div class="counter-box tm-text-align-' . $box_align . '">';
		$return .= '<div id="countdown-timer" class="countdown-timer' . $class . '" data-date=" ' . esc_attr( $atts['counterdate'] ) . '">';
		$return .= "<script>
						jQuery(document).ready(function($){
							 jQuery('.countdown-timer').TimeCircles({
								  'animation': 'smooth',
								  'use_background': false,
								  'bg_width': 0,
								  'fg_width': 0,
								  'time': {
									  'Days': {
										  'text': '" . esc_attr__("Days", 'presentup') . "',
										  'show': true
									  },
									  'Hours': {
										  'text': '" . esc_attr__("Hours", 'presentup') . "',
										  'show': true
									  },
									  'Minutes': {
										  'text': '" . esc_attr__("Minutes", 'presentup') . "',
										  'show': true
									  },
									  'Seconds': {
										  'text': '" . esc_attr__("Seconds", 'presentup') . "',
										  'show': true
									  }
								  }
							 }); 
						});
					</script>";
														
		
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</div>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'tm-datecounter', 'themetechmount_sc_datecounter' );