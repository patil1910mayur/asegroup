<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if( !isset($tm_framework_settings) || !isset($tm_framework_options) ){
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
		include( get_template_directory() .'/cs-framework-override/config/framework-options2.php' );
	}
	else {
		include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
	}
}

CSFramework::instance( $tm_framework_settings, $tm_framework_options );
