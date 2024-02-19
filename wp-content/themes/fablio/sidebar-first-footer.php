<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Fablio
 * @since Fablio 1.0
 */

 
global $fablio_theme_options;

$footer_col = '3_3_3_3';
if( !empty($fablio_theme_options['first_footer_column_layout']) ){
	$footer_col = esc_attr($fablio_theme_options['first_footer_column_layout']);
}
?>


<?php if ( is_active_sidebar( 'first-footer-1-widget-area' ) || is_active_sidebar( 'first-footer-2-widget-area' ) || is_active_sidebar( 'first-footer-3-widget-area' ) || is_active_sidebar( 'first-footer-4-widget-area' ) ) : ?>

<div id="first-footer" class="sidebar-container first-footer <?php echo themetechmount_sanitize_html_classes(themetechmount_footer_row_class( 'first' )); ?>" role="complementary">
	<div class="first-footer-bg-layer tm-bg-layer"></div>
	<div class="<?php echo themetechmount_sanitize_html_classes(themetechmount_footer_container_class()); ?>">
		<div class="first-footer-inner">
			<div class="row multi-columns-row">

				<?php if($footer_col == '3_3_3_3'){ ?>

					<?php if ( is_active_sidebar( 'first-footer-1-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'first-footer-1-widget-area' ); ?>
					</div><!-- .widget-area -->
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'first-footer-2-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'first-footer-2-widget-area' ); ?>
					</div><!-- .widget-area -->
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'first-footer-3-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'first-footer-3-widget-area' ); ?>
					</div><!-- .widget-area -->
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'first-footer-4-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'first-footer-4-widget-area' ); ?>
					</div><!-- .widget-area -->
					<?php endif; ?>

				
				<?php } else if($footer_col == '4_4_4_1'){ ?>
					<?php if ( is_active_sidebar( 'first-footer-1-widget-area' ) ) : ?>
					<div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-6 first-widget-area tm-first-bgcolor">
						<?php dynamic_sidebar( 'first-footer-1-widget-area' ); ?>
					</div><!-- .widget-area -->
					<?php endif; ?>
					<div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-6 first-widget-area">
						<div class="tm-layout-4-4-below">
					<?php if ( is_active_sidebar( 'first-footer-4-widget-area' ) ) : ?>
							<div class="widget-area col-xs-12 col-sm-12 col-md-12 col-lg-12 widget-form">
								<?php dynamic_sidebar( 'first-footer-4-widget-area' ); ?>
							</div><!-- .widget-area -->
							<?php endif; ?>
							<div class="widget_area_inner row tm-layout-6-6-below">
							<?php if ( is_active_sidebar( 'first-footer-2-widget-area' ) ) : ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<?php dynamic_sidebar( 'first-footer-2-widget-area' ); ?>
							</div>
							<?php endif; ?>
							<?php if ( is_active_sidebar( 'first-footer-3-widget-area' ) ) : ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<?php dynamic_sidebar( 'first-footer-3-widget-area' ); ?>
							</div>
							<?php endif; ?>
							</div><!-- .widget-area -->
						</div><!-- .widget-area -->
					</div><!-- .widget-area -->
          
				<?php } else {
					
					$footer_col = explode('_', $footer_col);
					
					if( is_array($footer_col) && count($footer_col)>0 ){
						$x = 1;
						foreach($footer_col as $col){
							// ROW width class
							$row_class = 'col-xs-12 col-sm-'.$col.' col-md-'.$col.' col-lg-'.$col;
							if ( is_active_sidebar( 'first-footer-'.$x.'-widget-area' ) ) : ?>
							<div class="widget-area <?php echo themetechmount_sanitize_html_classes($row_class); ?> first-widget-area">
							<?php dynamic_sidebar( 'first-footer-'.$x.'-widget-area' ); ?>
							</div><!-- .widget-area -->
							<?php endif;
							$x++;
						} // Foreach
					} // If

					
				} // if end  ?>
				
				
          
			</div><!-- .row.multi-columns-row -->
		</div><!-- .first-footer-inner -->
	</div><!--  -->
</div><!-- #secondary -->

<?php endif; ?>