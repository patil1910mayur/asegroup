<?php
// [tm-portfoliobox]
if( !function_exists('themetechmount_sc_portfoliobox') ){
function themetechmount_sc_portfoliobox( $atts, $content=NULL ){
	
	$return = $boxcustom = '';
	if( function_exists('vc_map') ){
		
		global $tm_sc_params_portfoliobox;
		
		$options_list = themetechmount_create_options_list($tm_sc_params_portfoliobox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );

		
		if(!empty($atts['el_class']) ){
			$boxcustom= $atts['el_class'];
		}
		
		// Starting wrapper of the whole arear
		$return .= themetechmount_box_wrapper( 'start', 'portfolio', get_defined_vars() );
		
				
			if($boxcustom == 'tm-column-styleview') {
				$return .='<div class="col-md-4"><div class="tm-portfoliobox-inner">';
				$return .= themetechmount_vc_element_heading( get_defined_vars() );
				$return .='<div class="tm-slick-arrows"><a class="tm-slick-arrow tm-slick-prev"><i class="tm-fablio-icon-angle-left"></i></a>		<a class="tm-slick-arrow tm-slick-next"><i class="tm-fablio-icon-angle-right"></i></a></div></div></div>';
			}
			else {
				$return .= themetechmount_vc_element_heading( get_defined_vars() );
			}

			// Heading element
			
			
			
			
			// Getting $args for WP_Query
			$args = themetechmount_get_query_args( 'portfolio', get_defined_vars() );
			
			// Wp query to fetch posts
			$posts = new WP_Query( $args );
			
			if ( $posts->have_posts() ) {
				
				if($boxcustom == 'tm-column-styleview') {
					$return .='<div class="col-md-8"><div class="tm-portfoliobox-inner">';
					$return .= themetechmount_get_boxes( 'portfolio', get_defined_vars() );
					$return .='</div></div>';
				}
				else {
				$return .= themetechmount_get_boxes( 'portfolio', get_defined_vars() );
				}
			}
			
		
		// Ending wrapper of the whole arear
		$return .= themetechmount_box_wrapper( 'end', 'portfolio', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'tm-portfoliobox', 'themetechmount_sc_portfoliobox' );









