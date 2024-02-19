
<?php
/*
 * Custom PHP code for the child theme
 */

// Enqueue the child theme's style.css
function tm_fablio_child_enqueue_styles() {
    wp_enqueue_style( 'fablio-child-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'tm_fablio_child_enqueue_styles', 18 );
