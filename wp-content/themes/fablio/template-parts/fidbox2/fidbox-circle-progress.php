<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_fid_element_values;
	
	// jquery circle progress bar js
	wp_enqueue_script('jquery-circle-progress');
	
	// skin color
	global $boldman_theme_options;
	$skincolor = ( !empty($boldman_theme_options['skincolor']) ) ? $boldman_theme_options['skincolor'] : '#129ce7' ;
	
	$fillcolor = esc_attr($tm_global_fid_element_values['circle_fill_color']);
	$emptycolor = esc_attr($tm_global_fid_element_values['circle_empty_color']);
	
	if(!empty($fillcolor) && ($fillcolor == 'skincolor')) {
	$fillcolor	= $skincolor;
	}
	if(!empty($emptycolor) && ($emptycolor == 'skincolor')) {
		$emptycolor	= $skincolor;
	}
	
	if( is_array($tm_global_fid_element_values) ) :
	
?>

<div class="tm-fid inside <?php echo themetechmount_wp_kses( $view_class ); ?>">	
	<div class="tm-fld-contents">
		<div class="tm-circle-box"
			data-digit			= "<?php echo esc_attr( $digit ); ?>"
			data-fill			= "<?php echo esc_attr($fillcolor) ?>"
			data-before			= "<?php echo esc_html( $before_text ); ?>"
			data-before-type	= "<?php echo esc_html( $beforetextstyle ); ?>"
			data-after			= "<?php echo esc_html( $after_text ); ?>"
			data-after-type		= "<?php echo esc_html( $aftertextstyle ); ?>"
			data-size			= "145"
			data-emptyfill		= "<?php echo esc_attr($emptycolor) ?>"
			data-thickness		= "7"
			data-gradient		= ""
			>
			<div class="tm-circle-content">
				<div class="tm-circle"></div>
				<div class="tm-circle-boxcontent">
					<div class="tm-fid-number"></div>
				</div>
			</div>
			<div class="tm-fid-content">
				<h3 class="tm-fid-title"><span><?php echo themetechmount_wp_kses($title); ?><br></span></h3>
			</div>
		</div>
	</div><!-- .tm-fld-contents -->
</div>

<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$tm_global_fid_element_values = '';
?>