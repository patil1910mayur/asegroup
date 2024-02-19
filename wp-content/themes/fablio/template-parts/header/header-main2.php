<div id="tm-stickable-header-w" class="tm-stickable-header-w tm-bgcolor-<?php echo themetechmount_get_option('header_bg_color'); ?>" >
		<?php get_template_part('template-parts/header/header','topbar'); ?>
	<div id="site-header" class="site-header <?php echo themetechmount_sanitize_html_classes(themetechmount_header_class()); ?> <?php echo themetechmount_sanitize_html_classes(themetechmount_sticky_header_class()); ?>">
		
		<div class="site-header-main tm-wrap <?php echo themetechmount_sanitize_html_classes(themetechmount_header_container_class()); ?>">
		
			<div class="site-branding tm-wrap-cell">
				<?php echo themetechmount_wp_kses( themetechmount_site_logo() ); ?>
			</div><!-- .site-branding -->

			<div id="site-header-menu" class="site-header-menu tm-wrap-cell">
				<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(themetechmount_get_option('header_height_sticky')); ?>">
					<?php themetechmount_header_text(); ?>
					
					<?php echo themetechmount_wp_kses( themetechmount_header_links(), 'header_links' ); ?>
					<?php get_template_part('template-parts/header/header','menu'); ?>
				</nav><!-- .main-navigation -->
			</div><!-- .site-header-menu -->
			
			<?php themetechmount_one_page_site_js(); ?>
			
		</div><!-- .site-header-main -->
	</div>
	<?php if( themetechmount_slidersociallinks_show() ) : ?>
		<div class="tm-slider-div"><?php echo themetechmount_slidersociallinks_title(); ?><?php echo themetechmount_wp_kses( do_shortcode('[tm-social-links tooltip="no"]') ); ?></div>
	<?php endif; ?>
</div>


