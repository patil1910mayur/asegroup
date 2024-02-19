<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Fablio
 * @since Fablio 1.0
 */
global $fablio_theme_options;
$center_col_class = $center_content = '';

?>

<div id="bottom-footer-text" class="bottom-footer-text tm-bottom-footer-text site-info <?php echo themetechmount_sanitize_html_classes(themetechmount_footer_row_class( 'bottom' )); ?>">
	<div class="bottom-footer-bg-layer tm-bg-layer"></div>
	<div class="<?php echo themetechmount_sanitize_html_classes(themetechmount_footer_container_class()); ?>">
		<div class="bottom-footer-inner">
			<div class="row multi-columns-row">
<?php
$left_content=themetechmount_footer_copyright_right();
$right_content=$fablio_theme_options['footer_copyright_left'];
if( !empty($fablio_theme_options['footer_copyright_center']) ){
$center_content=$fablio_theme_options['footer_copyright_center'];
}
if(!empty($left_content)) { $left_col_class='col-sm-7'; } else { $left_col_class='col-sm-12'; }
if(!empty($right_content)) { $right_col_class='col-sm-5'; } else { $right_col_class='col-sm-12'; }
if(!empty($center_content)) { $right_col_class='col-sm-4'; $left_col_class='col-sm-5'; }
?>
				<div class="col-xs-12 <?php echo esc_attr($left_col_class); ?> <?php if(!empty($right_content)) { ?>tm-footer2-left <?php } ?>">
					<?php
					if( !empty($fablio_theme_options['footer_copyright_left']) ){
					echo do_shortcode( $fablio_theme_options['footer_copyright_left'] );
					}
					?>
				</div><!--.footer menu -->
				
				<?php  if(!empty($center_content)){  ?>
					<div class="col-xs-12 col-sm-3 col-md-3 <?php echo esc_attr($center_col_class); ?> <?php if(!empty($center_content)) { ?>tm-footer2-center <?php } ?>">
						<?php echo themetechmount_wp_kses( themetechmount_footer_copyright_center() ); ?>
					</div><!--center  --> 
               <?php } ?>

				<div class="col-xs-12 <?php echo esc_attr($right_col_class); ?> <?php if(!empty($left_content)) { ?>tm-footer2-right <?php } ?>">
					<?php echo themetechmount_wp_kses( themetechmount_footer_copyright_right() ); ?>
				</div><!--.copyright --> 

			</div><!-- .row.multi-columns-row --> 
		</div><!-- .bottom-footer-inner --> 
	</div><!--  --> 
</div><!-- .footer-text -->