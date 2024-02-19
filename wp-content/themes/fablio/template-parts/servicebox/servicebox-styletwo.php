<article class="themetechmount-box themetechmount-box-service themetechmount-servicebox-styletwo <?php echo themetechmount_servicebox_class(); ?>">
	<div class="themetechmount-post-item">
		<div class="themetechmount-box-bottom-content">	
			<?php echo themetechmount_get_featured_media( get_the_ID(), 'medium_large', true ); ?>
			<div class="tm-servicebox-detials">
				<div class="tm-box-header">
					<?php echo themetechmount_box_title(); ?>
					<div class="tm-details-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="themifyicon ti-arrow-top-right"></i></a></div>
				</div>
				<div class="themetechmount-box-desc">
					<?php if( has_excerpt() ){ ?>
						<div class="tm-short-desc">
							<?php $return  = nl2br( get_the_excerpt() );
							echo do_shortcode($return); ?>
						</div>
					<?php } ?>
				</div> 
			</div>
		</div>
	</div>
</article>