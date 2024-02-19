<article class="themetechmount-box themetechmount-box-testimonial themetechmount-testimonial-box-style2">
	<div class="themetechmount-post-item">
		<div class="themetechmount-box-content">
		<?php echo themetechmount_testimonial_featured_image('thumbnail') ?>
		    <div class="themetechmount-box-desc">
				<blockquote class="themetechmount-testimonial-text"><?php echo themetechmount_wp_kses( strip_tags( get_the_content('') ) ); ?></blockquote>
			</div>
			 <div class="clearfix"></div>
		</div>
		<div class="themetechmount-box-author">		
			<div class="themetechmount-ratting-star"><?php echo themetechmount_star_ratting(); ?></div>		
			<div class="themetechmount-box-title"><?php echo themetechmount_testimonial_title(); ?></div>	
		</div>					
	</div>
</article>