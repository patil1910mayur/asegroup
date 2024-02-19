<article class="themetechmount-box themetechmount-box-testimonial themetechmount-testimonialbox-stylefive">
	<div class="themetechmount-post-item">
		<div class="themetechmount-box-content">
			<div class="themetechmount-box-author">
				<div class="themetechmount-box-img">
					<?php echo themetechmount_testimonial_featured_image('thumbnail') ?>
				</div>	
				<div class="themetechmount-box-title">
					<?php echo themetechmount_testimonial_title(); ?>
				</div>
			</div>	
			<div class="themetechmount-box-desc">
			   <?php echo themetechmount_highlight_text() ?>
				<blockquote class="themetechmount-testimonial-text"><?php echo themetechmount_wp_kses( strip_tags( get_the_content('') ) ); ?></blockquote>
			</div>				
		</div>
	</div>
</article>