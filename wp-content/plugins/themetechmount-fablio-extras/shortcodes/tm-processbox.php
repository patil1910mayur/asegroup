<?php
// [tm-processbox]
if( !function_exists('themetechmount_processbox') ){
function themetechmount_processbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){ 
	
	global $tm_vc_custom_element_processbox;
	$options_list = themetechmount_create_options_list($tm_vc_custom_element_processbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	

		// boximage size
			$boximg_size   = ( !empty($boximg_size) ) ? $boximg_size : 'full' ;
		
				

		// Heading element
		$return .= themetechmount_vc_element_heading( get_defined_vars() );
	
		// Getting $args for WP_Query
		$args = themetechmount_get_query_args( 'box_content', get_defined_vars() );

	
		if( !empty($box_content) ){
		
			$static_boxes = (array) vc_param_group_parse_atts( $box_content );

				
				$return .= '<div class="themetechmount-boxes-row-wrapper tm-processbox-wrapper">';
				$x = 1;
				foreach( $static_boxes as $tm_box ){
					$staticbox_desc  = ( !empty($tm_box['static_boxcontent']) ) ? '<div class="tm-box-description">'.$tm_box['static_boxcontent'].'</div>' : '' ;
					$image_box = '' ;
					$tm_box['static_boximage']=( !empty($tm_box['static_boximage']) ) ? $tm_box['static_boximage'] : '';
	                $tm_box['static_boxlink']=( !empty($tm_box['static_boxlink']) ) ? $tm_box['static_boxlink'] : '';
					
					// Builing URL array
					$url =  themetechmount_vc_build_link($tm_box['static_boxlink']);
					if( function_exists('wpb_getImageBySize') ){
							$image_box = wpb_getImageBySize( array(
								'attach_id'  => $tm_box['static_boximage'],
								'thumb_size' => $boximg_size,
							) );
							$image_box = ( !empty($image_box['thumbnail']) ) ? $image_box['thumbnail'] : '' ;
						} else {
							$image_box = wp_get_attachment_image( $tm_box['static_boximage'], 'full' );
					}
					 $static_boxtitle      = ( !empty($tm_box['static_boxtitle']) ) ? '<div class="tm-box-title"><h5>'.$tm_box['static_boxtitle'].'</h5></div>' : '' ;
						if ( strlen( $tm_box['static_boxlink'] ) > 0 && strlen( $url['url'] ) > 0 ) {	
						
							$static_boxtitle      = ( !empty($tm_box['static_boxtitle']) ) ? '<div class="tm-box-title"><h5><a class="tm_element-link" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">'.$tm_box['static_boxtitle'].'</a></h5></div>' : '' ;
						}
					
					
						$return .= '
						<div class="tm-processbox">
							<div class="tm-box-image"> 
								' . $image_box . '
								<div class="process-num"><span class="number">0' . $x . '</span></div>						
							</div>
							<div class="tm-box-content" >
								'.$static_boxtitle.'
								'.$staticbox_desc.'
							</div>
						</div>
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
add_shortcode( 'tm-processbox', 'themetechmount_processbox' );