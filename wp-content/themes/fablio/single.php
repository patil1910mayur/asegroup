<?php get_header(); ?>

<div id="primary" class="content-area <?php echo themetechmount_sanitize_html_classes(themetechmount_sidebar_class('content-area')); ?>">
    <main id="main" class="site-main">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();
        ?>

            <h1><?php the_title(); ?></h1>

            <?php
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            if (themetechmount_get_option('blog_view') == 'classic-style2') {
                get_template_part('template-parts/content-classicstyle2-post', 'classic-style2');
            } else if (themetechmount_get_option('blog_view') == 'classic-style3') {
                get_template_part('template-parts/content-classicstyle3-post', 'classic-style3');
            } else {
                get_template_part('template-parts/content-classic-post', 'classic');
            }
            ?>

        <?php endwhile; ?>
        <!-- End the loop. -->

    </main>
</div>

<?php get_footer(); ?>
