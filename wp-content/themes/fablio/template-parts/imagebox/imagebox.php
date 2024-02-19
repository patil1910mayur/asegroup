<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_imagebox_element_values;
	
	if( is_array($tm_global_imagebox_element_values) ) :

	if($tm_global_imagebox_element_values['tm_highlight_box'] == 'yes' ){ $boxhightlight="tm_highlight_box"; } else {$boxhightlight=""; }

	
?>
<div class="tm-single-image-wrapper  imagestyle-<?php echo esc_attr($view); ?> wpb_single_image vc_align_<?php echo esc_attr($align); ?> ">
	 <?php if($tm_global_imagebox_element_values['tm_highlight_box'] == 'yes' ){ ?><div class="tm-box-highlight-class"><?php echo themetechmount_wp_kses($heading_html); ?></div><?php } ?>
<div class="tm-single-image-inner">
	<?php echo themetechmount_wp_kses($image_html); ?>
</div>
  
</div>


<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$tm_global_imagebox_element_values = '';
?>