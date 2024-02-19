<article class="themetechmount-box themetechmount-box-events themetechmount-box-view-top-image themetechmount-events-box-view-top-image">
	<div class="themetechmount-post-item">
		<div class="themetechmount-post-item-inner">
			<?php echo themetechmount_get_featured_media( get_the_ID(), 'themetechmount-img-blog-top', true ); ?>
		</div>
		<div class="event-box-content">
			<div class="themetechmount-box-title"><?php echo themetechmount_box_title(); ?></div>
			<div class="themetechmount-box-meta themetechmount-events-meta"><?php echo themetechmount_wp_kses( themetechmount_event_meta() ); ?></div>
			<?php echo themetechmount_wp_kses( themetechmount_event_venue() ); ?>
		</div>
	</div>
</article>