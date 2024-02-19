<article class="themetechmount-box themetechmount-box-portfolio themetechmount-portfoliobox-style1 <?php echo themetechmount_portfoliobox_class(); ?>">
	<div class="themetechmount-post-item tm-shadow-box">	
		<div class="themetechmount-post-item-inner">
			<?php echo themetechmount_get_featured_media( get_the_ID(), 'medium_large', true ); ?>
			<div class="themetechmount-box-content themetechmount-overlay">
				<div class="themetechmount-box-content-inner">
					<div class="themetechmount-icon-box themetechmount-media-link"><?php echo themetechmount_portfoliobox_media_link(); ?><a href=" <?php echo get_permalink(); ?>" class="themetechmount_pf_link"><i class="tm-fablio-icon-shuffle"></i></a></div>
				</div>			
			</div>
		</div>		
		<div class="themetechmount-box-bottom-content">						
			<?php echo themetechmount_box_title(); ?>
			<div class="themetechmount-box-desc">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</article>