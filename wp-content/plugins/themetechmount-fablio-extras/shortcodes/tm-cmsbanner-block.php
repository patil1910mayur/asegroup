<?php
// [tm-cmsbanner-block]
if( !function_exists('themetechmount_sc_cmsbanner_block') ){
function themetechmount_sc_cmsbanner_block( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
	global $themetechmount_sc_params_cmsbanner_block;
	$options_list = themetechmount_create_options_list($themetechmount_sc_params_cmsbanner_block);
		
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
		
		// boximage size
		$boximg_size = explode('|', $image );
		
		$full_img  = ( isset($boximg_size[0]) ) ? $boximg_size[0] : '' ;
		$thumb_img = ( isset($boximg_size[1]) ) ? $boximg_size[1] : '' ;
		$img_id    = ( isset($boximg_size[2]) ) ? $boximg_size[2] : '' ;

		$alignment = (!empty($alignment)) ? $alignment : 'left' ;
		$content_alignment = (!empty($content_alignment)) ? $content_alignment : 'left' ;
		$cmstext1 = '';	
		$cmstext2 = '';	
		$cmstext3 = '';	
		$cmstext1_color = '';
		$cmstext2_color = '';
		$cmstext3_color = '';
		$cmslinktext_color = '';		$cmsbutton_color = '';
		

		if( !empty($full_img) ){
			$cmsimg = '<a href="'.$link_url.'" class="img"><img src="' . $full_img . '" alt="" /></a>';
		}
		if(!empty($text1_color)) :
			$cmstext1_color .= 'color:'.$text1_color.';';
		endif;
		if(!empty($text2_color)) :
			$cmstext2_color .= 'color:'.$text2_color.';';
		endif;
		if(!empty($text3_color)) :
			$cmstext3_color .= 'color:'.$text3_color.';';
		endif;
		if(!empty($linktext_color)) :
			$cmslinktext_color .= 'color: '.$linktext_color.';';
		endif;
		
		if(!empty($text1)) :	
			$cmstext1 = '<span class="bannertext1" style="'.$cmstext1_color.'">'.$text1.'</span>';		
		endif;
		if(!empty($text2)) :	
			$cmstext2 = '<span class="bannertext2" style="'.$cmstext2_color.'">'.$text2.'</span>';		
		endif;
		if(!empty($text3)) :	
			$cmstext3 = '<span class="bannertext3" style="'.$cmstext3_color.'">'.$text3.'</span>';		
		endif;
		if(!empty($link_text)) :	
			$link_text = '<a href="'.$link_url.'" class="bannerbtn"  style="'.$cmslinktext_color.' '.$cmsbutton_color.'">'.$link_text.'</a>';		
		endif;		
		
		
		$return .='<div class="bannercms_content '.$el_class.'"><div class="bannercms_item '.$alignment.'">'.$cmsimg.'<div class="bannertext '.$content_alignment.'">'.$cmstext1.''.$cmstext2.''.$cmstext3.''.$link_text.'</div></div></div>';
		
		return $return;
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
	
}
}
add_shortcode( 'tm-cmsbanner-block', 'themetechmount_sc_cmsbanner_block' );

