<article class="themetechmount-box themetechmount-box-service themetechmount-servicebox-styleone <?php echo themetechmount_servicebox_class(); ?>">
	<div class="themetechmount-post-item">
		<div class="themetechmount-box-bottom-content tm-shadow-box">	
			<div class="tm-box-icon"><?php echo themetechmount_servicebox_icon(); ?></div>
			<div class="tm-servicebox-detials">
				<?php echo themetechmount_box_title(); ?>
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
		</div>
	</div>
</article>