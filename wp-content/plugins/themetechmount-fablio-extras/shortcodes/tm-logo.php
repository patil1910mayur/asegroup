<?php
// [tm-logo]
if( !function_exists('themetechmount_sc_logo') ){
function themetechmount_sc_logo( $atts, $content=NULL ){
	
	
	
	$fablio_theme_options = get_option('fablio_theme_options');
	
	if( !empty($fablio_theme_options['logotype']) ){
	
		$return = '<span class="tm-sc-logo tm-sc-logo-type-'.$fablio_theme_options['logotype'].'">';
		
		if( $fablio_theme_options['logotype']=='image' ){
			if( isset($fablio_theme_options['logoimg']) && is_array($fablio_theme_options['logoimg']) ){
				
				// standard logo
				if( isset($fablio_theme_options['logoimg']['full-url']) && trim($fablio_theme_options['logoimg']['full-url'])!='' ){
					$image = $fablio_theme_options['logoimg']['full-url'];
					$return .= '<img class="themetechmount-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$fablio_theme_options['logoimg']['full-url'].'">';
				
				} else if( isset($fablio_theme_options['logoimg']['thumb-url']) && trim($fablio_theme_options['logoimg']['thumb-url'])!='' ){
					$image = $fablio_theme_options['logoimg']['thumb-url'];
					$return .= '<img class="themetechmount-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$fablio_theme_options['logoimg']['thumb-url'].'">';

				} else if( isset($fablio_theme_options['logoimg']['id']) && trim($fablio_theme_options['logoimg']['id'])!='' ){
					$image   = wp_get_attachment_image_src( $fablio_theme_options['logoimg']['id'], 'full' );
					$return .= '<img class="themetechmount-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'">';
					
					
				}
				
				
				// stikcy logo
				if( isset($fablio_theme_options['logoimg_sticky']) && is_array($fablio_theme_options['logoimg_sticky']) ){
					
					if( isset($fablio_theme_options['logoimg_sticky']['full-url']) && trim($fablio_theme_options['logoimg_sticky']['full-url'])!='' ){
						$sticky_image   = $fablio_theme_options['logoimg_sticky']['full-url'];
						$return .= '<img class="themetechmount-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$fablio_theme_options['logoimg_sticky']['full-url'].'">';
					
					} else if( isset($fablio_theme_options['logoimg_sticky']['thumb-url']) && trim($fablio_theme_options['logoimg_sticky']['thumb-url'])!='' ){
						$sticky_image   = $fablio_theme_options['logoimg_sticky']['thumb-url'];
						$return .= '<img class="themetechmount-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$fablio_theme_options['logoimg_sticky']['thumb-url'].'">';
					
					} else if( isset($fablio_theme_options['logoimg_sticky']['id']) && trim($fablio_theme_options['logoimg_sticky']['id'])!='' ){
						$sticky_image   = wp_get_attachment_image_src( $fablio_theme_options['logoimg_sticky']['id'], 'full' );
						$return .= '<img class="themetechmount-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$sticky_image[0].'" width="'.$sticky_image[1].'" height="'.$image[2].'">';
						
					}
					
				}
				
				
			}
		} else {
			if( !empty($fablio_theme_options['logotext']) ){
				$return = $fablio_theme_options['logotext'];
			}
		}
		
		$return .= '</span>';
		
	}
	
	return $return;
}
}
add_shortcode( 'tm-logo', 'themetechmount_sc_logo' );