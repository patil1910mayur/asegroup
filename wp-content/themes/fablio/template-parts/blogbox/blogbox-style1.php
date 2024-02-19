<article class="themetechmount-box themetechmount-box-blog themetechmount-blogbox-styleone themetechmount-blogbox-format-<?php echo get_post_format() ?> <?php echo themetechmount_sanitize_html_classes(themetechmount_post_class()); ?>">
	<div class="post-item">
		<div class="themetechmount-box-content">		
			<div class="tm-featured-outer-wrapper tm-post-featured-outer-wrapper">
				<?php echo themetechmount_get_featured_media( get_the_ID(), 'themetechmount-img-blog-top' ); ?>
			</div>		
			<div class="themetechmount-box-desc">
				<div class="tm-box-post-date">
				<?php themetechmount_entry_date(); ?>
				</div>
				<div class="entry-header">
					<?php echo fablio_entry_meta(); ?>
					<?php echo themetechmount_box_title(); ?>
					<?php echo themetechmount_blogbox_description(); ?>
					<?php echo themetechmount_blogbox_readmore(); ?>
				</div>						
			</div>
        </div>
	</div>
</article>
