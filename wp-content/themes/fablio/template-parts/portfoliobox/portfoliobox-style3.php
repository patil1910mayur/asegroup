<article class="themetechmount-box themetechmount-box-portfolio themetechmount-portfoliobox-style3 <?php echo themetechmount_portfoliobox_class(); ?>">
	<div class="themetechmount-post-item">	
		<div class="themetechmount-post-item-inner themetechmount-post-format-<?php echo get_post_format() ?>">
			<?php echo themetechmount_get_featured_media( get_the_ID(), 'themetechmount-img-700x770'); ?>
			<div class="themetechmount-post-overlay">
				<div class="themetechmount-box-link">
					<div class="themetechmount-media-link"><?php echo themetechmount_portfoliobox_media_link(); ?></div>
					<a href=" <?php echo get_permalink(); ?>" class="themetechmount_pf_link"><i class="tm-fablio-icon-shuffle-1"></i></a>
				</div>
				<div class="themetechmount-box-content tm-textwhite">	
					<div class="themetechmount-content-inner">
						<div class="themetechmount-box-category"><?php echo themetechmount_portfolio_category(false); ?></div>
						<?php echo themetechmount_box_title(); ?>
					</div>
				</div>				
			</div>
		</div>		
	</div>
</article>