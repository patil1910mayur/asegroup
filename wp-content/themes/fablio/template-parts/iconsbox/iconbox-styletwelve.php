<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_iconbox_element_values;
	if( is_array($tm_global_iconbox_element_values) ) :
		
	if($tm_global_iconbox_element_values['tm_highlight_box'] == 'Yes' ){ $boxhightlight="tm-highlight-box-test"; } else {$boxhightlight=""; }
?>
<div class="themetechmount-iconbox themetechmount-iconbox-<?php echo esc_attr($boxstyle); ?>">
	<?php if($tm_global_iconbox_element_values['tm_highlight_box'] == 'Yes' ){ ?><div class="tm-box-highlight-class"><i class="fa fa-star"></i></div><?php } ?>
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