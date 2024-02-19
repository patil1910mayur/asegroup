<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_fid_element_values;
	
	if( is_array($tm_global_fid_element_values) ) :
	
?>


<div class="tm-fid inside tm-fid-with-icon tm-fid-view-style6 tm-fid-no-border">
	<?php echo themetechmount_wp_kses( $lefticoncode ); ?>
	<div class="tm-fld-contents">
		<h4 class="tm-fid-inner">
			<?php echo themetechmount_wp_kses( $before_text ); ?>
			<span
			class				  = "tm-number-rotate"
			data-appear-animation = "animateDigits"
			data-from             = "0"
			data-to               = "<?php echo esc_html( $digit ); ?>"
			data-interval         = "<?php echo esc_html( $interval ); ?>"
			data-before           = ""
			data-before-style     = ""
			data-after            = ""
			data-after-style      = ""
			>
				<?php echo esc_html( $digit ); ?>
		</span>
			<?php echo themetechmount_wp_kses( $after_text ); ?>
		</h4>
		<h3 class="tm-fid-title"><span><?php echo themetechmount_wp_kses($title); ?><br></span></h3>
	</div><!-- .tm-fld-contents -->
		<?php echo themetechmount_wp_kses($righticoncode); ?>
</div>

<?php
	endif;
	
	// Resetting data of the Facts in Digits box
	$tm_global_fid_element_values = '';
?>