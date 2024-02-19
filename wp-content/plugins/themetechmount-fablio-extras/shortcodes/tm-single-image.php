<?php
// [tm-single-image]
if( !function_exists('themetechmount_sc_single_image') ){
function themetechmount_sc_single_image( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
	global $themetechmount_sc_params_single_image;
	$options_list = themetechmount_create_options_list($themetechmount_sc_params_single_image);
		
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
		
		// boximage size
		$boximg_size = explode('|', $image );
		
		$full_img  = ( isset($boximg_size[0]) ) ? $boximg_size[0] : '' ;
		$thumb_img = ( isset($boximg_size[1]) ) ? $boximg_size[1] : '' ;
		$img_id    = ( isset($boximg_size[2]) ) ? $boximg_size[2] : '' ;

		$alignment = (!empty($alignment)) ? $alignment : 'left' ;
		
		// boxstyle
		$tm_img_boxstyle   = ( !empty($tm_img_boxstyle) ) ? $tm_img_boxstyle : '' ;
		$tmimage_rnumber   = ( !empty($tmimage_rnumber) ) ? $tmimage_rnumber : '' ;
		$tmimage_rtext     = ( !empty($tmimage_rtext) ) ? $tmimage_rtext : '' ;
		$playbox_boxlink   =( !empty($static_boxlink )) ? $static_boxlink : '';
		// Builing URL array
		$url =  themetechmount_vc_build_link($playbox_boxlink);
		$icon_boxdiv = '';
		$icon_textlink = '';
		if(!empty($tmimage_rnumber)) {
			$tmimage_rnumber_sec = '<div class="tm-wrap-cell left-text"><h4>' . $tmimage_rnumber . '</h4></div>';
		}
		else {
			$tmimage_rnumber_sec = '';
		}
		
		$return .= '<div class="tm-single-image-wrapper '. $tm_img_boxstyle .' wpb_single_image vc_align_' . esc_attr($alignment) . ' ' . esc_attr($el_class) . '">';

		if( !empty($full_img) ){
			$return .= '<div class="tm-single-image-inner"><img src="' . $full_img . '" class="tm-single-image-img" alt="" />';
		}
		if( !empty($tmimage_rtext) && ($tm_img_boxstyle != 'imagestyle-four') ){
			$return .= '<div class="tm-highlight-box tm-wrap">' . $tmimage_rnumber_sec . '<div class="tm-wrap-cell right-text">' . $tmimage_rtext . '</div></div>';
		}
		
		if ( $tm_img_boxstyle == 'imagestyle-four') {
			if ( strlen( $playbox_boxlink ) > 0 && strlen( $url['url'] ) > 0 ) {	
				$icon_boxdiv      = '<div class="tm-box-icon"><a class="tm_element-link tm_prettyphoto" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"><i class="kw_fablio flaticon-play"></i></a></div>';
				
				$icon_textlink      = '<h4><a class="tm_element-link tm_prettyphoto" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . $tmimage_rtext . '</a></h4>';				
			}
			
				$return .= '<div class="tm-playvideobox tm-wrap"><div class="tm-wrap-cell left-text">' . $icon_boxdiv . '</div>' . $icon_textlink . '</div>';	
			
		}
		
		
		$return .= '</div></div>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
	
}
}
add_shortcode( 'tm-single-image', 'themetechmount_sc_single_image' );