				</div><!-- .site-content-inner -->
			</div><!-- .site-content -->
		</div><!-- .site-content-wrapper -->
<?php
$footer_cta_class = '';
$footer_cta_box = themetechmount_get_option('footer_cta_box');
if( $footer_cta_box==true ){ $footer_cta_class="tm-footer-cta-yes"; }
$footer_cta_styles	= themetechmount_get_option('footer_cta_styles');
?>
		<footer id="colophon" class="site-footer">			
			<div class="footer_inner_wrapper footer<?php echo themetechmount_sanitize_html_classes(themetechmount_footer_row_class( 'full' )); ?> <?php echo themetechmount_sanitize_html_classes($footer_cta_class); ?>">
				<div class="site-footer-bg-layer tm-bg-layer"></div>
				<div class="site-footer-w">					
					<div class="footer-rows">
						<div class="footer-rows-inner">
							<?php if($footer_cta_styles == 'style1' ){ echo themetechmount_footer_ctabox();  ?>	<?php } ?>	
							<?php get_sidebar( 'first-footer' ); ?>	
							<?php get_sidebar( 'second-footer' ); ?>
							<?php if($footer_cta_styles == 'default' ){ themetechmount_footer_ctabox(); ?><?php } ?>
						</div><!-- .footer-inner -->
					</div><!-- .footer -->
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- .footer-inner-wrapper -->
			</div><!-- .site-footer-inner -->
		</footer><!-- .site-footer -->

	</div><!-- #page .site -->

</div><!-- .main-holder -->

<!-- To Top -->
<a id="totop" href="#top"><i class="tm-fablio-icon-angle-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>
