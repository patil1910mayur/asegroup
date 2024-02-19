<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Fablio
 * @since Fablio 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( themetechmount_sanitize_html_classes(themetechmount_postlayout_class()) ); ?> >
	
	<div class="tm-featured-outer-wrapper tm-post-featured-outer-wrapper">
		<?php echo themetechmount_get_featured_media(); // Featured content ?>
		<div class="tm-box-post-date">
			<?php themetechmount_entry_date(); ?>
		</div>
	</div>
	
	<div class="tm-blog-classic-box-content">
		<?php
		if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
			<div class="tm-classic-post-meta">
				<?php echo fablio_entry_meta('blogclassic');  // blog post meta details ?>
			</div>
		<?php endif; ?>
		<?php if( !is_single() ) : ?>
		<header class="entry-header">
				<?php if( 'aside' != get_post_format() && 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
		</header><!-- .entry-header -->
		<?php endif; ?>	
	<?php if( 'quote' != get_post_format() ) : ?>
		<div class="entry-content">
			
			<?php if( !is_single() ) : ?>
				<div class="themetechmount-box-desc-text"><?php echo themetechmount_blogbox_description(); ?></div>
			<?php endif; ?>
		
			<?php

			the_content( sprintf(
				esc_attr__( 'Read More %s', 'fablio' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			?>

			<div class="themetechmount-blogbox-footer-readmore">
				<?php echo themetechmount_blogbox_readmore(); ?>
			</div>	
			<?php
			// pagination if any
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'fablio' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	
	<?php endif; ?>
	
	<?php
		if( is_single() ){
		$social_links = '';
		if( function_exists('themetechmount_fablio_cs_framework_init') ){	
			$social_links = themetechmount_social_share_links('post');
		}
		$tags_list = get_the_tag_list( '', esc_attr_x( ',', 'Used between list items, there is a space after the comma.', 'fablio' ) );
		if( !empty($social_links) || !empty($tags_list) ){
	?>
		<div class="themetechmount-blogbox-sharebox">	
			
				<?php
					if( !empty($tags_list) ) : ?>	
						<div class="tm_tag_lists"><span class="themetechmount-tags-links-title"><i class="fa fa-tags"></i><?php echo esc_attr('Tags:', 'fablio' ); ?></span> <span class="themetechmount-tags-links"><?php echo themetechmount_wp_kses($tags_list); ?></span></div>
					<?php endif; ?>	
	<?php echo themetechmount_social_share_box('post'); ?>						
		</div>	
		<?php } }	?>

	
	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'template-parts/author-bio', 'customized' );
	endif;
	?>
	
	</div>
	<div class="tm-blog-classic-commentbox">	
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( is_single() && ( comments_open() || get_comments_number() ) ) : ?>
		<div class="tm-blog-classic-box-comment">
			<?php comments_template(); ?>
		</div><!-- .tm-blog-classic-box-comment -->
	<?php endif; ?>
	</div>
</article><!-- #post-## -->