<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_iconbox_element_values;
	if( is_array($tm_global_iconbox_element_values) ) :
?>
<div class="themetechmount-iconbox themetechmount-iconbox-<?php echo themetechmount_sanitize_html_classes($tm_global_iconbox_element_values['view']); ?> <?php echo themetechmount_sanitize_html_classes($tm_global_iconbox_element_values['main-class']); ?>">
	<div class="themetechmount-iconbox-inner">
		<div class="tm-iconbox-wrapper">
			<div class="themetechmount-iconbox-icon ">			
				<?php 				
					if($tm_global_iconbox_element_values['main_icon_type'] == 'icon'){ 
					  echo '<div class="tm-box-icon1"></div>';
					  echo '<div class="tm-box-icon2"></div>';
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
				<?php echo themetechmount_wp_kses( $tm_global_iconbox_element_values['box_contenttext'] ); ?>
				<?php echo themetechmount_wp_kses( $tm_global_iconbox_element_values['tmbox_button'] ); ?>
			</div>	
			<?php if( !empty($tm_global_iconbox_element_values['smalliconlink']) ){ ?>
			<div class="box-plus-icon">	
					<a href="<?php echo themetechmount_wp_kses( $tm_global_iconbox_element_values['smalliconlink'] ); ?>" rel="bookmark"><i class="tm-fablio-icon-plus"></i></a>		
			</div>
			<?php } ?>
		</div>
	</div>	
</div>
<?php
	endif;
	$tm_global_iconbox_element_values = '';
?>