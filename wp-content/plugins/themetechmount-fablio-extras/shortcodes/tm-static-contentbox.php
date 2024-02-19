<?php
// [tm-static-contentbox]
if( !function_exists('themetechmount_sc_static_contentbox') ){
function themetechmount_sc_static_contentbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){ 
	
	global $tm_vc_custom_element_staticcontent_box;
	$options_list = themetechmount_create_options_list($tm_vc_custom_element_staticcontent_box);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );

		
				
		// Starting wrapper of the whole arear
		$return .= themetechmount_box_wrapper( 'start', 'steps', get_defined_vars() );
		
		// Heading element
		$return .= themetechmount_vc_element_heading( get_defined_vars() );
	
		// Getting $args for WP_Query
		$args = themetechmount_get_query_args( 'contentbox', get_defined_vars() );
		
		
		// image size
		$tm_stps_style   = ( !empty($tm_stps_style) ) ? $tm_stps_style : '' ;

		if( !empty($box_content) ){
		
			$static_boxes = (array) vc_param_group_parse_atts( $box_content );
				
				$return .= '<div class="row multi-columns-row themetechmount-boxes-row-wrapper">';
				foreach( $static_boxes as $tm_box ){
					
					$staticbox_desc  = ( !empty($tm_box['static_boxcontent']) ) ? '<div class="tm-item-desc">'.$tm_box['static_boxcontent'].'</div>' : '' ;
					
					$tm_box['static_boxstyle']=( !empty($tm_box['tm_stps_style']) ) ? $tm_box['tm_stps_style'] : '';
		
					
					$static_boxnnumber  = ( !empty($tm_box['static_boxnnumber']) ) ? '<span>' .$tm_box['static_boxnnumber'].'</span>' : '' ;					
					$static_boxtitle  = ( !empty($tm_box['static_boxtitle']) ) ? '<h3 class="tm-custom-heading">'.$tm_box['static_boxtitle'].'</h3>' : '' ;
					

					$return .= themetechmount_column_div('start', $column );
					
					if ( $tm_stps_style == 'steps-style1') {
						$return .= '
						<div class="tm-static-box-wrapper tm-steps-box '. $tm_stps_style .'">
							<div class="tm-static-box-content" >
								<div class="tm-steps-descbox">
									<div class="tm-static-steps-num">
									  '.$static_boxnnumber.'
									</div>
									<div class="tm-steps-desc">
									'.$static_boxtitle.'
									'.$staticbox_desc.'		
									</div>
								</div>
							</div>
						</div>
						';
					} else if($tm_stps_style == 'steps-style3') {
						$return .= '
						<div class="tm-static-box-wrapper tm-steps-box steps-style1 '. $tm_stps_style .'">
							<div class="tm-static-box-content" >
								<div class="tm-steps-descbox">
									<div class="tm-static-steps-num">
									  '.$static_boxnnumber.'
									</div>
									<div class="tm-steps-desc">
									'.$static_boxtitle.'
									'.$staticbox_desc.'		
									</div>
								</div>
							</div>
						</div>
						';
					}
					else {
						$return .= '
						<div class="tm-static-box-wrapper tm-steps-box '. $tm_stps_style .'">
							<div class="tm-static-box-content" >
								<div class="tm-steps-descbox">
									<div class="tm-static-steps-num">
									  '.$static_boxnnumber.'
									</div>
									<div class="tm-steps-desc">
									'.$static_boxtitle.'
									'.$staticbox_desc.'		
									</div>
								</div>
							</div>
						</div>
						';	
					}	
						
					$return .= themetechmount_column_div('end', $column );
				} // end foreach
				$return .= '</div>';
				
			} // end if
			
		$return .= themetechmount_box_wrapper( 'end', 'static', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
	
} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;	
	
}
}
add_shortcode( 'tm-static-contentbox', 'themetechmount_sc_static_contentbox' );