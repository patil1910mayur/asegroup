<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_iconbox_element_values;
	if( is_array($tm_global_iconbox_element_values) ) :
	
	if( !empty($tm_global_iconbox_element_values['tmbox_button'])) { $box_classes = 'box-with-rbutton'; } else { $box_classes = ''; }
?>
<div class="themetechmount-iconbox box-with-rbutton themetechmount-iconbox-<?php echo esc_attr($boxstyle); ?><?php echo esc_attr($mainclass); ?>">
	<div class="themetechmount-iconbox-inner">
		<div class="tm-iconbox-wrapper">
			<div class="themetechmount-iconbox-icon ">
			<?php echo themetechmount_wp_kses( $icon_html ); 	?>
				
			</div>
			<div class="themetechmount-iconbox-heading">
				<?php echo themetechmount_wp_kses($heading_html); ?>
				<?php echo themetechmount_wp_kses($content_html); ?>
				<?php echo themetechmount_wp_kses($button_html); ?>	
			</div>
			
		</div>
		
		</div>		
</div>
<?php
	endif;
	$tm_global_iconbox_element_values = '';
?>