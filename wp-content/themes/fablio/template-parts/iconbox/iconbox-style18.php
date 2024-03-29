<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_iconbox_element_values;
	if( is_array($tm_global_iconbox_element_values) ) :
?>
<div class="themetechmount-iconbox themetechmount-iconbox-<?php echo themetechmount_sanitize_html_classes($tm_global_iconbox_element_values['view']); ?> <?php echo themetechmount_sanitize_html_classes($tm_global_iconbox_element_values['main-class']); ?>">
	<div class="themetechmount-iconbox-inner tm-boxicon-<?php echo themetechmount_wp_kses($tm_global_iconbox_element_values['icon_size']); ?>">
		<div class="tm-iconbox-wrapper">
			<div class="themetechmount-iconbox-icon">
				<?php 				
					if($tm_global_iconbox_element_values['main_icon_type'] == 'icon'){ 
					  echo themetechmount_wp_kses($tm_global_iconbox_element_values['boxiconcode']);
					} else {
				?>
					<img src="<?php echo themetechmount_wp_kses($tm_global_iconbox_element_values['mainiconimage']); ?>" class="tm-iconbox-image" alt="icon-img" />
				<?php				
					} 
				?>	
			</div>
			<div class="themetechmount-iconbox-heading">
				<?php echo themetechmount_wp_kses( $tm_global_iconbox_element_values['box_headingtext'] ); ?>
					<div class="tm-iconbox-boxcontent">			
					<?php echo themetechmount_wp_kses( $tm_global_iconbox_element_values['box_contenttext'] ); ?>
					</div>
					<div class="themetechmount-iconbox-button">
					<?php echo themetechmount_wp_kses( $tm_global_iconbox_element_values['tmbox_button'] ); ?>
					</div>
			</div>	
		</div>
	</div>	
</div>
<?php
	endif;
	// Resetting data of the Iconbox
	$tm_global_iconbox_element_values = '';
?>
 