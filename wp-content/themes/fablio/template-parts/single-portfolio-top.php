<?php
/*
 *
 *  Single Portfolio - Top image-1
 *
 */

?>

<div class="tm-pf-single-content-wrapper tm-sboxpf-view-top-image">	
	<div class="tm-pf-single-content-wrapper-innerbox">
	<div class="tm-pf-top-content">
		<?php echo themetechmount_get_featured_media(); ?>
		<div class="themetechmount-pf-single-details-area col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<div class="themetechmount-pf-single-detail-box">
					<?php echo themetechmount_portfolio_description_title(); ?>
					<div class="themetechmount-pf-detail-content">
						<?php if( has_excerpt() ){ ?>
												<div class="tm-short-desc">
													<?php $return  = nl2br( get_the_excerpt() );
													echo do_shortcode($return); ?>
												</div>
											<?php } ?>
						<?php echo themetechmount_portfolio_detailsbox(); ?>
					</div>
				</div>
			</div><!-- .themetechmount-pf-single-details-area -->
		</div>
		<div class="row">
			<div class="themetechmount-pf-single-content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php echo themetechmount_portfolio_description(); ?>
			</div><!-- .themetechmount-pf-single-content-area -->
			
			
			<div class="tm-social-bottom-wrapper col-md-12 col-lg-12">
				<div class="tm-single-pf-footer">
				<?php echo themetechmount_social_share_box('portfolio'); /* Social share */ ?>
				</div>
				<div class="tm-nextprev-bottom-nav">
					<?php echo themetechmount_portfolio_next_prev_btn(); /* Next/Prev button */ ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo themetechmount_portfolio_related(); ?>
</div>

<?php edit_post_link( esc_attr__( 'Edit', 'fablio' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

