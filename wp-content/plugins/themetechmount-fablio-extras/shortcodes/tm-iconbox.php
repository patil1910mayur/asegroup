<?php
// [tm-iconbox]
if( !function_exists('themetechmount_sc_iconbox') ){
function themetechmount_sc_iconbox( $atts, $content=NULL ){
	
	$return = '';

	if( function_exists('vc_map') ){
	
		global $tm_sc_params_iconbox;
		$options_list = themetechmount_create_options_list($tm_sc_params_iconbox);
		
		// This global variable will be used in template file for design
		global $tm_global_iconbox_element_values;
		$tm_global_iconbox_element_values = array();
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
	
		
        if( !empty($view) ){
			$class[] = 'tm-iconbox-view'.$view;
		}
		
		
		//Icon
		    $boxiconcode='';
			$class = array();
		  
					if( !isset($i_icon_linecons) ){
						$i_icon_linecons = '';
					}
					if( !isset($i_icon_themify) ){
						$i_icon_themify = '';
					}
					
					
					// We are calling this to add CSS file of the selected icon.
					do_shortcode('[tm-icon type="'.$i_type.'" icon_fontawesome="'.$i_icon_fontawesome.'" icon_linecons="'.$i_icon_linecons.'" icon_themify="'.$i_icon_themify.'" color="skincolor" align="left"]');
					
					// This is real icon code
					$icon_class   = ( !empty( ${'i_icon_'.$i_type} ) ) ? ${'i_icon_'.$i_type} : '' ;
					$boxiconcode = '<div class="tm-box-icon"><i class="' . $icon_class . '"></i></div>';
					$icon_type_class = 'icon';
		
		/** Heading, Subheading, Content ***/
		
		$ctaShortcode = '[tm-cta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""] [/tm-cta]';
		$box_headingtext = do_shortcode($ctaShortcode);
			
		$box_contenttext = ( !empty($content) ) ? '<div class="tm-cta3-content-wrapper">'.$content.'</div>' : '' ;
		
		// Builing URL array
		
		$smallicon_url = themetechmount_vc_build_link( $smallicon_link );
		
		$atag = '';
		if ( strlen( $smallicon_link ) > 0 && strlen( $smallicon_url['url'] ) > 0 ) {
			$atag = esc_attr( $smallicon_url['url'] );
		}

		
		/** Button **/
		$tmbox_button = '';
		if( $show_btn=='yes' ){
			$btnShortcode = '[tm-btn';
			foreach( $options_list as $key=>$val ){
				if( trim( ${$key} )!='' && substr( $key, 0, 4 ) == 'btn_' && $key!='btn_style' ){
					$btnShortcode .= ' '.substr( $key, 4 ).'="'.${$key}.'"';
				}
			}
			
			$btnShortcode .= ' style="text" color="black"]';
			
			$tmbox_button = do_shortcode($btnShortcode);
		}

		// boximage size
		$boximg_size = explode('|', $mainiconimage );
		$image_html  = ( isset($boximg_size[1]) ) ? $boximg_size[1] : '' ;	


		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = themetechmount_vc_shortcode_custom_css_class( $css );
		}
		
		// Extra class
		if ( ! empty( $el_class ) ) {
			$class[] = $el_class;
		}
		
		/* Added by ThemeTechMount */
		
		// storing in global variables to be used in template file
		$tm_global_iconbox_element_values['box_headingtext'] = $box_headingtext;
		$tm_global_iconbox_element_values['box_contenttext'] = $box_contenttext;
		$tm_global_iconbox_element_values['tmbox_button']	 = $tmbox_button;
		$tm_global_iconbox_element_values['main-class']   	 = implode(' ', $class);
		$tm_global_iconbox_element_values['boxiconcode'] 	 = $boxiconcode;
		$tm_global_iconbox_element_values['view']         	 = $view;
		$tm_global_iconbox_element_values['smalliconlink']   = $atag;
		$tm_global_iconbox_element_values['icon_size']  	 = $icon_size;
		$tm_global_iconbox_element_values['icon_bg_style']   = $icon_bg_style;
		$tm_global_iconbox_element_values['content_align']   = $content_align;
		$tm_global_iconbox_element_values['main_icon_type']  = $main_icon_type;
		$tm_global_iconbox_element_values['mainiconimage']   = $image_html;
		$tm_global_iconbox_element_values['digit']  		 = $digit;
		$tm_global_iconbox_element_values['tm_highlight_box']= $tm_highlight_box;
		if ( ! empty( $el_class ) ) {
			$tm_global_iconbox_element_values['ex-class'] = trim($el_class);
		}


		
		// calling template depending on the selected VIEW option
		ob_start();
		get_template_part('template-parts/iconbox/iconbox', $view);
		$return = ob_get_contents();
		ob_end_clean();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	
	return $return;
}
}
add_shortcode( 'tm-iconbox', 'themetechmount_sc_iconbox' );







