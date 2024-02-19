<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_iconbox_element_values;
	if( is_array($tm_global_iconbox_element_values) ) :
	if($tm_global_iconbox_element_values['tm_highlight_box'] == 'true' ){ $boxhightlight="tm-highlight-box"; } else {$boxhightlight=""; }
?>

<div class="themetechmount-iconbox themetechmount-iconbox-<?php echo themetechmount_sanitize_html_classes($tm_global_iconbox_element_values['view']); ?> <?php echo themetechmount_sanitize_html_classes($tm_global_iconbox_element_values['main-class']); ?><?php echo themetechmount_sanitize_html_classes($boxhightlight); ?>">
	<?php if($tm_global_iconbox_element_values['tm_highlight_box'] == 'true' ){ ?><div class="tm-box-highlight"><i class="fa fa-star"></i></div><?php } ?>
	<div class="themetechmount-iconbox-inner">
		<div class="tm-iconbox-wrapper">
			<div class="themetechmount-iconbox-icon ">			
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