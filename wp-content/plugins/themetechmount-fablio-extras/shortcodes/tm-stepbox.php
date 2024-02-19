<?php
// [tm-stepbox]
if( !function_exists('themetechmount_stepbox') ){
function themetechmount_stepbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){ 
	
	global $tm_vc_custom_element_stepbox;
	$options_list = themetechmount_create_options_list($tm_vc_custom_element_stepbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	

		// Heading element
		$return .= themetechmount_vc_element_heading( get_defined_vars() );
	
		// Getting $args for WP_Query
		$args = themetechmount_get_query_args( 'box_content', get_defined_vars() );

	
		if( !empty($box_content) ){
		
			$static_boxes = (array) vc_param_group_parse_atts( $box_content );

				
				$return .= '<div class="themetechmount-boxes-row-wrapper tm-stepbox-wrapper">';
				$x = 1;
				foreach( $static_boxes as $cmt_box ){
					$staticbox_desc  = ( !empty($cmt_box['static_boxcontent']) ) ? '<div class="tm-box-description">'.$cmt_box['static_boxcontent'].'</div>' : '' ;
					
					$staticbox_bicon= do_shortcode('[tm-icon type="' . $cmt_box['i_type'] . '" icon_linecons="' . $cmt_box['i_icon_linecons'] . '" icon_themify="' . $cmt_box['i_icon_themify'] . '" icon_fontawesome="' . $cmt_box['i_icon_fontawesome'] . '" icon_kw_fablio="' . $cmt_box['i_icon_kw_fablio'] . '" ]');
					
					$static_boxtitle      = ( !empty($cmt_box['static_boxtitle']) ) ? '<div class="tm-sboxbox-title"><h5>'.$cmt_box['static_boxtitle'].'</h5></div>' : '' ;
				
						
						$p_num = array("2", "4", "6", "8","10");
						$return .= '
						<div class="tm-stepsbox">';
						if (in_array($x, $p_num)) { 
						$return .= '<div class="tm-stepsbox-inner">
							<div class="tm-stepnum">0'.$x.'</div>
							<div class="tm-sboxbox-iconbox"> 
									<div class="tm-sboxbox-icon-outer"></div>
									<div class="tm-sboxbox-icon">
									'.$staticbox_bicon.'
									</div>								
							</div>
							<div class="tm-sboxbox-content" >
								'.$static_boxtitle.'
								'.$staticbox_desc.'
							</div>
						</div>';
							} else {
							$return .= '<div class="tm-stepsbox-inner">
							<div class="tm-sboxbox-iconbox"> 
									<div class="tm-sboxbox-icon-outer"></div>
									<div class="tm-sboxbox-icon">
									'.$staticbox_bicon.'
									</div>								
							</div>
							<div class="tm-sboxbox-content" >
								'.$static_boxtitle.'
								'.$staticbox_desc.'
							</div>
							<div class="tm-stepnum">0'.$x.'</div>
						</div>';
						}
						$return .= '</div>
						';
									
						
					$x++;
				} // end foreach
				$return .= '</div>';
				
			} // end if
			

		/* Restore original Post Data */
		wp_reset_postdata();
	
} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;	
	
}
}
add_shortcode( 'tm-stepbox', 'themetechmount_stepbox' );