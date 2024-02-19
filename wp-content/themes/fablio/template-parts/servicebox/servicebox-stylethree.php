<article class="themetechmount-box themetechmount-box-service themetechmount-servicebox-stylethree <?php echo themetechmount_servicebox_class(); ?>">
	<div class="themetechmount-post-item">
		<div class="themetechmount-box-bottom-content">	
			<div class="tm-servicebox-detials">
				<div class="tm-box-header ">
					<?php echo themetechmount_box_title(); ?>
				</div>
				<div class="themetechmount-box-desc">
					<?php if( has_excerpt() ){ ?>
						<div class="tm-short-desc">
							<?php $return  = nl2br( get_the_excerpt() );
							echo do_shortcode($return); ?>
						</div>
					<?php } ?>
					<div class="themetechmount-serviceboxbox-readmore">
						<?php echo themetechmount_servicebox_readmore_text(); ?>
					</div>
				</div> 
			</div>
			<?php echo themetechmount_get_featured_media( get_the_ID(), 'medium_large', true ); ?>
		</div>
	</div>
</article>