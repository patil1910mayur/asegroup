<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_iconbox_element_values;
	if( is_array($tm_global_iconbox_element_values) ) :
?>
<div class="themetechmount-iconbox themetechmount-iconbox-<?php echo esc_attr($boxstyle); ?> <?php echo esc_attr($mainclass); ?> themetechmount-iconcolor-<?php echo esc_attr($icon_color_html); ?> themetechmount-icon-bgcolor-<?php echo esc_attr($icon_bg_color_html); ?> tm-iconstyle-<?php echo esc_attr($icon_shape_html); ?> themetechmount-iconsize-<?php echo esc_attr($icon_size_html); ?>">
	<div class="themetechmount-iconbox-inner">
		<div class="tm-iconbox-wrapper tm-wrap">
			<div class="themetechmount-iconbox-icon tm-wrap-cell">
				<?php echo themetechmount_wp_kses( $icon_html ); 	?>
			</div>
			<div class="themetechmount-iconbox-heading tm-wrap-cell">
				<?php echo themetechmount_wp_kses($heading_html); ?>
			</div>
				
		</div>
			<div class="tm-iconbox-boxcontent">			
			   <?php echo themetechmount_wp_kses($content_html); ?>
				<?php echo themetechmount_wp_kses($button_html); ?>	
			
			</div>		
	</div>	
</div>
<?php
	endif;
	// Resetting data of the Iconbox
	$tm_global_iconbox_element_values = '';
?>