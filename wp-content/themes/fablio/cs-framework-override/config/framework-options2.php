<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


// Get current theme name and vesion
$tm_theme = wp_get_theme();
$tm_theme_name = $tm_theme->get( 'Name' );
$tm_theme_ver  = $tm_theme->get( 'Version' );


// Getting all theme options again if variable is not defined
global $fablio_theme_options;
if( empty($fablio_theme_options) || !is_array($fablio_theme_options) ){
	if( function_exists('themetechmount_load_default_theme_options') ){
		themetechmount_load_default_theme_options();
	} else {
		$fablio_theme_options = get_option('fablio_theme_options');
	}
}

// variables
$team_member_title          = ( !empty($fablio_theme_options['team_type_title']) ) ? esc_attr($fablio_theme_options['team_type_title']) : esc_attr__('Team Members', 'fablio') ;
$team_member_title_singular = ( !empty($fablio_theme_options['team_type_title_singular']) ) ? esc_attr($fablio_theme_options['team_type_title_singular']) : esc_attr__('Team Member', 'fablio') ;
$team_group_title           = ( !empty($fablio_theme_options['team_group_title']) ) ? esc_attr($fablio_theme_options['team_group_title']) : esc_attr__('Team Groups', 'fablio') ;
$team_group_title_singular  = ( !empty($fablio_theme_options['team_group_title_singular']) ) ? esc_attr($fablio_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'fablio') ;

$pf_title               = ( !empty($fablio_theme_options['pf_type_title']) ) ? esc_attr($fablio_theme_options['pf_type_title']) : esc_attr__('Portfolio', 'fablio') ;
$pf_title_singular      = ( !empty($fablio_theme_options['pf_type_title_singular']) ) ? esc_attr($fablio_theme_options['pf_type_title_singular']) : esc_attr__('Portfolio', 'fablio') ;
$pf_cat_title           = ( !empty($fablio_theme_options['pf_cat_title']) ) ? esc_attr($fablio_theme_options['pf_cat_title']) : esc_attr__('Portfolio Categories', 'fablio') ;
$pf_cat_title_singular  = ( !empty($fablio_theme_options['pf_cat_title_singular']) ) ? esc_attr($fablio_theme_options['pf_cat_title_singular']) : esc_attr__('Portfolio Category', 'fablio') ;

$service_title           = ( !empty($fablio_theme_options['service_type_title']) ) ? esc_attr($fablio_theme_options['service_type_title']) : esc_attr__('Service', 'fablio') ;
$service_title_singular      = ( !empty($fablio_theme_options['service_type_title_singular']) ) ? esc_attr($fablio_theme_options['service_type_title_singular']) : esc_attr__('Service', 'fablio') ;
$service_cat_title           = ( !empty($fablio_theme_options['service_cat_title']) ) ? esc_attr($fablio_theme_options['service_cat_title']) : esc_attr__('Service Categories', 'fablio') ;
$service_cat_title_singular  = ( !empty($fablio_theme_options['service_cat_title_singular']) ) ? esc_attr($fablio_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'fablio') ;




/**
 *  FRAMEWORK SETTINGS
 */
$tm_framework_settings = array(
	'menu_title' 	  => esc_attr__('Fablio Options', 'fablio'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'themetechmount-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_attr($tm_theme_name).'  <small>'.esc_attr($tm_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
	/*
	Default: bottom of menu structure #Default: bottom of menu structure
	2 – Dashboard
	4 – Separator
	5 – Posts
	10 – Media
	15 – Links
	20 – Pages
	25 – Comments
	59 – Separator
	60 – Appearance
	65 – Plugins
	70 – Users
	75 – Tools
	80 – Settings
	99 – Separator
	For the Network Admin menu, the values are different: #For the Network Admin menu, the values are different:
	2 – Dashboard
	4 – Separator
	5 – Sites
	10 – Users
	15 – Themes
	20 – Plugins
	25 – Settings
	30 – Updates
	99 – Separator
	*/
);



/**
 *  FRAMEWORK OPTIONS
 */
$tm_framework_options = array();


// Layout Settings
$tm_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_attr__('Layout Settings', 'fablio'),
	'icon'   => 'fa fa-square-o',
	'fields' => array( // begin: fields
		
		array(
			'type'    	=> 'heading',
			'content'		=> esc_attr__('Specify theme pages layout, the skin coloring and background', 	'fablio'),
        ),
		array(
			'id'      => 'skincolor',
			'type'    => 'color_picker',
			'title'   => esc_attr__( 'Select Skin Color', 'fablio' ),
			'default' => '#c3002f',
        ),
		array(
			'id'         => 'secondarycolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Primary Dark BG Color', 'fablio' ),
			'default'    => '#222d35',	
		),
		array(
			'id'         => 'secondary-greycolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Primary Grey BG Color', 'fablio' ),
			'default'    => '#f8f8f8',	
		),
		array(
			'id'     	=> 'tm_one_click_demo_setup', //themetechmount_one_click_demo_content
			'type'    	=> 'themetechmount_one_click_demo_content',//themetechmount_one_click_demo_content
			'title'  	=> esc_attr__('Demo Content Setup', 'fablio'),
        ),
		array(
			'id'        => 'layout',
			'type'      => 'radio',
			'title'     => esc_attr__('Pages Layout', 'fablio'), 
			'options'  	=> array(
							'wide'     => esc_attr__('Wide', 'fablio'),
							'boxed'    => esc_attr__('Boxed', 'fablio'),
							'framed'   => esc_attr__('Framed', 'fablio'),
							'rounded'  => esc_attr__('Rounded', 'fablio'),
							'fullwide' => esc_attr__('Full Wide', 'fablio'),
						),
			'default'   => 'wide',
			'after'   	=> '<small>'.esc_attr__('Specify the layout for the pages', 'fablio').'</small>',
        ),
		array(
			'id'        => 'full_wide_elements',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Elements for Full Wide View (in above option)', 'fablio'),
			'options'   => array(
					'floatingbar' => esc_attr__('Floating Bar', 'fablio'),
					'topbar'      => esc_attr__('Topbar', 'fablio'),
					'header'      => esc_attr__('Header', 'fablio'),
					'content'     => esc_attr__('Content Area', 'fablio'),
					'footer'      => esc_attr__('Footer', 'fablio'),
					),
			'default'    => array( 'header' ),
			'after'    	 => '<small>'.esc_attr__('Select elements that you want to show in full-wide view', 'fablio').'</small>',
			'dependency' => array( 'layout_fullwide', '==', 'true' ),
		),
				array(
			'type'      	=> 'heading',
			'content'     	=> esc_attr__('Advance Background Colors Options', 'boldman'),
			'after'  		=> '<small>'.esc_attr__('Set below background colors options. this colors settings will be applied to website all pages', 'boldman').'</small>',
		),
		array(
			'id'        => 'advance_themecolors',
			'type'      => 'radio',
			'title'     => esc_attr__('Advanced Colors Options', 'boldman'), 
			'options'  	=> array(
							'default'     => esc_attr__('Default Colors', 'boldman'),
							'advance_color'    => esc_attr__('Advanced Colors', 'boldman'),
						),
			'default'   => 'default',
        ),
		array(
			'type'      	=> 'heading',
			'content'     	=> esc_attr__('Background Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Set below background options. Background settings will be applied to Boxed layout only', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'global_background',
			'type'   		=> 'themetechmount_background',
			'title' 		=> esc_attr__('Body Background Properties', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'fablio').'</div>',
			'default'		=> array(
			'color'			=> '#ffffff',
			),
			'output'        => 'body',
        ),
		array(
			'id'     		=> 'inner_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Content Area Background Properties', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for content area', 'fablio').'</div>',
			'default' 		=> array(
				'color' 	=> '#ffffff',
			),
			'output'        => 'body #main,.themetechmount-wide.themetechmount-sticky-footer .site-content-wrapper',
        ),	
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Gradient Color', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Select Gradient Color for the site', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'gradient_color_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Use Gradient Color', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide Gradient for site.', 'fablio') . '</div>',
		),
		array(
			'id'         => 'gradient_color_one',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Gradient Color One', 'fablio' ),
			'default'    => '#fe5603',	
		),
		array(
			'id'         => 'gradient_color_two',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Gradient Color Two', 'fablio' ),
			'default'    => '#ff7f00',	
		),
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Pre-loader Image', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'preloader_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Pre-loader animation', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide pre-loader animation.', 'fablio') . '</div>',
		),
		array(
			'id'          => 'loaderimg',
			'type'        => 'image_select',
			'title'       => esc_attr__('Page-loader Image', 'fablio'), 
			'options'     => array(
					''   	=> get_template_directory_uri() . '/images/loader-none.gif',
					'1'   	=> get_template_directory_uri() . '/images/loader1.gif',
					'2'   	=> get_template_directory_uri() . '/images/loader2.gif',
					'3'   	=> get_template_directory_uri() . '/images/loader3.gif',
					'4'   	=> get_template_directory_uri() . '/images/loader4.gif',
					'5'   	=> get_template_directory_uri() . '/images/loader5.gif',
					'6'   	=> get_template_directory_uri() . '/images/loader6.gif',
					'7'   	=> get_template_directory_uri() . '/images/loader7.gif',
					'8'   	=> get_template_directory_uri() . '/images/loader8.gif',
					'9'   	=> get_template_directory_uri() . '/images/loader9.gif',
					'10'   	=> get_template_directory_uri() . '/images/loader10.gif',
					'11'   	=> get_template_directory_uri() . '/images/loader11.gif',
					'12'   	=> get_template_directory_uri() . '/images/loader12.gif',
					'13'   	=> get_template_directory_uri() . '/images/loader13.gif',
					'14'   	=> get_template_directory_uri() . '/images/loader14.gif',
					'15'   	=> get_template_directory_uri() . '/images/loader15.gif',
					'16'   	=> get_template_directory_uri() . '/images/loader16.gif',
					'17'   	=> get_template_directory_uri() . '/images/loader17.gif',
					'18'   	=> get_template_directory_uri() . '/images/loader18.gif',
					'custom'=> get_template_directory_uri() . '/images/loader-custom.gif',
				),
			'radio'       => true,
			'default'     => '',
			'after'   	  => '<div class="cs-text-muted">' . esc_attr__('Please select site pre-loader image.', 'fablio') . '<br/><br/><em><strong>' . esc_attr__( 'NOTE:', 'fablio' ) . '</strong> ' . esc_attr__( 'Please note that if you uploaded pre-loader image (in below option) than this pre-defined loader image will be ignored.', 'fablio' ) . '</em></div>',
			'dependency' => array( 'preloader_show', '==', 'true' ),
        ),
		array(
			'id'       		=> 'loaderimage_custom',
			'type'      	=> 'image',
			'title'    		=> esc_attr__('Upload Page-loader Image', 'fablio'),
			'add_title' 	=> 'Select/Upload Page-loader image',
			'after'  		=> '<div class="cs-text-muted">' . esc_attr__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'fablio') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" target="_blank">' . esc_attr__('Click here to go to Anmizer website.', 'fablio') . '</a><br/><br/><em><strong>' . esc_attr__('NOTE:', 'fablio') . '</strong>' . esc_attr__('Please note that if you selected image here than the pre-defined loader image (in above option) will be ignored.', 'fablio') . '</em></div>',
			'dependency'    => array( 'loaderimg_custom', '==', 'true' ),
        ),
		array(
			'type'      => 'heading',
			'content'   => esc_attr__('One Page Website', 'fablio'),
			'after'  	=> '<small>'.esc_attr__('Options for One Page website', 'fablio').'</small>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_attr__('One Page Site', 'fablio'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted">'.esc_attr__('Set this option "ON" if your site is one page website', 'fablio').' <a target="_blank" href="#">'.esc_attr__('Click here to know more about how to setup one-page site.', 'fablio').'</a></div>',
        ),
		
	),
	
);


// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($fablio_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $fablio_theme_options['hide_demo_content_option'];
}

if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	$tm_framework_options_inner = $tm_framework_options[0];
	foreach( $tm_framework_options_inner['fields'] as $index => $option ){
		if( !empty($option['type']) && $option['type'] == 'themetechmount_one_click_demo_content' ){
			unset($tm_framework_options[0]['fields'][$index]);
		}
	}
}



// Font Settings
$tm_framework_options[] = array(
	'name'   => 'font_settings', // like ID
	'title'  => esc_attr__('Font Settings', 'fablio'),
	'icon'   => 'fa fa-text-height',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Font Settings', 'fablio'),
			'after'  	=> '<small>'.esc_attr__('General Element Fonts', 'fablio').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('General Font', 'fablio'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => 'body', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_attr__('Select font family, size etc. for H2 heading tag.', 'fablio'),
			'default'        => array (
				'family'			=> 'Rubik',
				'backup-family'		=> 'Tahoma, Geneva, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '26',
				'letter-spacing'	=> '0.2',
				'color'				=> '#555c63',
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
		),
		
		array(
			'id'         => 'blackish_buttoncolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Global Dark Text Color', 'fablio' ),
			'default'    => '#222d35',	
		),
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_attr__('Select Link Color', 'fablio'), 
			'options'  	=> array(
				'default'   => esc_attr__('Dark color as normal color and Skin color as hover color', 'fablio'),
				'darkhover' => esc_attr__('Skin color as normal color and Dark color as hover color', 'fablio'),
				'custom'    => esc_attr__('Custom color (select below)', 'fablio'),
				
			),
			'default'   => 'custom',
			'std'       => 'default',
			'after'   	=> '<div class="cs-text-muted">' . esc_attr__('Select normal link color effect. This will change normal text link color and hover color', 'fablio') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Regular)', 'fablio' ),
			'default'    => '#222d35',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Hover)', 'fablio' ),
			'default'    => '#c3002f',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('H1 Heading Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '40',
				'line-height'		=> '45',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H1 heading tag.', 'fablio').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H2 Heading Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '33',
				'line-height'		=> '43',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H2 heading tag.', 'fablio').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'themetechmount_typography',
			'chosen'      => false,
			'title'       => esc_attr__('H3 Heading Font', 'fablio'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h3', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '30',
				'line-height'		=> '35',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H3 heading tag.', 'fablio').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H4 Heading Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h4,.themetechmount-box-blog .themetechmount-box-content h4,.themetechmount-box-service .themetechmount-box-title h4,.themetechmount-iconbox-styleeleven .themetechmount-iconbox-heading .tm-vc_general h2,.elementor-element .themetechmount-iconbox-styleeleven .themetechmount-iconbox-heading .tm-custom-heading,.themetechmount-teambox-style2.style3 .themetechmount-box-title h4', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '21',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H4 heading tag.', 'fablio').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H5 Heading Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h5', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '18',
				'line-height'		=> '28',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H5 heading tag.', 'fablio').'</div>',
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H6 Heading Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h6', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '16',
				'line-height'		=> '21',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H6 heading tag.', 'fablio').'</div>',
		),
		
		
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Heading and Subheading Font Settings', 'fablio'),
			'after'  	  => '<small>'.esc_attr__('Select font settings for Heading and subheading of different title elements like Blog Box, Portfolio Box etc', 'fablio').'</small>',
		),
		
		array(
			'id'          => 'heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Heading Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.tm-element-heading-wrapper .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-content-header h2, .tm-element-heading-content-wrapper .tm-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '40',
				'line-height'		=> '50',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'fablio').'</div>',
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Subheading Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,							
			'output'         => '.tm-element-heading-wrapper .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-content-header h4, .tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-transparent.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-headers h4,.tm-element-heading-content-wrapper .tm-element-subheading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '15',
				'line-height'		=> '25',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '1',
				'color'				=> '#c3002f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'fablio').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Content Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.tm-element-heading-wrapper .tm-vc_general.tm-vc_cta3 .tm-vc_cta3-content p', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#555c63',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for content', 'fablio').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Specific Element Fonts', 'fablio'),
			'after'  	  => '<small>'.esc_attr__('Select Font for specific elements', 'fablio').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Widget Title Font', 'fablio'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .themetechmount-portfolio-details h2, .themetechmount-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '20',
				'line-height'		=> '25',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for widget title', 'fablio').'</div>',
		),
		
		array(
			'id'             => 'element_title',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Element Title Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_tta.vc_general .vc_tta-tab > a,.steps-style2 .tm-static-steps-num span,.tm-borderstyle-box span.tm-vc_label_units.vc_label_units,.themetechmount-progress-bar.vc_progress_bar.tm-borderstyle-box .vc_general.vc_single_bar .vc_label,.tm-list.tm-elementfont-style li,.countdown-box .time_circles > .textDiv_Seconds span, .countdown-box .time_circles > .textDiv_Minutes span, .countdown-box .time_circles > .textDiv_Hours span, .countdown-box .time_circles > .textDiv_Days span,.themetechmount-blogbox-style6 .tm-box-post-date,.wpb_text_column blockquote footer', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'		=> 'Rubik',
				'backup-family'	=> 'Arial, Helvetica, sans-serif',
				'variant'		=> '500',
				'font-size'		=> '16',
				'font'			=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'fablio').'</div>',
		),	
	)
);


// Floating Bar Settings
$tm_framework_options[] = array(
	'name'   => 'floatingbar_settings', // like ID
	'title'  => esc_attr__('Floating Bar Settings', 'fablio'),
	'icon'   => 'fa fa-arrow-circle-o-up',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Floating Bar Settings', 'fablio'),
        ),
		array(
			'id'     		=> 'fbar_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Floating Bar', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Floating Bar', 'fablio').'</div>',
        ),
		array(
			'id'      => 'fbar-position',
			'type'    => 'radio',
			'title'   => esc_attr__('Floating bar position', 'fablio'),
			'options' => array(
				'default' => esc_attr__('Top','fablio'),
				'right'   => esc_attr__('Right', 'fablio'),
			),
			'default'    => 'right',
			'after'      => '<div class="cs-text-muted"><br>'.esc_attr__('Position for Floating bar', 'fablio').'</div>',
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'            => 'fbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Background Color', 'fablio'),
			'options'  		=> array(
				'darkgrey'    => esc_attr__('Dark grey', 'fablio'),
				'grey'        => esc_attr__('Grey', 'fablio'),
				'white'       => esc_attr__('White', 'fablio'),
				'skincolor'   => esc_attr__('Skincolor', 'fablio'),
				'custom'      => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'skincolor',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Floating Bar background color', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'fbar_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Floating Bar Background Properties', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Floating bar. You can set color or image and also set other background related properties', 'fablio').'</div>',
			'color'			=> true,
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/floatingbar-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'left top',
				'attachment'	=> 'scroll',
				'color'			=> '#7eba03',
				'size'		  	=> 'cover',
			),
			'output' 	        => '.themetechmount-fbar-box-w',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
			
        ),
		array(
			'id'            => 'fbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Text Color', 'fablio'),
			'options' 		=> array(
				'white'			=> esc_attr__('White', 'fablio'),
				'darkgrey'		=> esc_attr__('Dark', 'fablio'),
				'custom'		=> esc_attr__('Custom color', 'fablio'),
							),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'fbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Custom Color for text', 'fablio' ),
			'default'		 => '#dd3333',
			'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar', 'fablio').'</div>',
        ),
		
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Floating Bar Open/Close Button Settings', 'fablio'),
			'after'		=> '<small>' . esc_attr__('Settings for Floating Bar Open/Close Button', 'fablio') . '</small>',
			
        ),
		array(
			'id'      => 'fbar_handler_icon',
			'type'    => 'themetechmount_iconpicker',
			'title'   => esc_attr__('Open Link Icon', 'fablio' ),
			'default' => array(
				'library'				=> 'themify',
				'library_fontawesome'	=> 'fa fa-arrow-down',
				'library_linecons'		=> 'vc_li vc_li-bubble',
				'library_themify'		=> 'themifyicon ti-menu',
			),
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'      => 'fbar_handler_icon_close',
			'type'    => 'themetechmount_iconpicker',
			'title'   => esc_attr__('Close Link Icon', 'fablio' ),
			'default' => array(
				'library'				=> 'themify',
				'library_fontawesome'	=> 'fa fa-arrow-up',
				'library_linecons'		=> 'vc_li vc_li-bubble',
				'library_themify'		=> 'themifyicon ti-close',
			),
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		
		array(
			'id'            => 'fbar_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open/Close Icon Color', 'fablio'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'fablio'),
					'grey'       => esc_attr__('Grey', 'fablio'),
					'white'      => esc_attr__('White', 'fablio'),
					'skincolor'  => esc_attr__('Skincolor', 'fablio'),
			),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'fablio').'</div>',
        ),
		
		array(
			'id'            => 'fbar_btn_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open/Close Button Background Color', 'fablio'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'fablio'),
					'grey'       => esc_attr__('Grey', 'fablio'),
					'white'      => esc_attr__('White', 'fablio'),
					'skincolor'  => esc_attr__('Skincolor', 'fablio'),
					'custom'	 => esc_attr__('Custom color', 'fablio'),
			),
			'default'		=> 'skincolor',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'fablio').'</div>',
        ),
		
		array(
			'id'     		 => 'fbar_btn_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Open/Close Button Custom Background Color', 'fablio' ),
			'default'		 => '#1e73be',
			'output' 	        => '.themetechmount-fbar-btn-link',
			'dependency'  	 => array( 'fbar_show|fbar_btn_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar Button', 'fablio').'</div>',
        ),

		array(
			'type'    	 => 'heading',
			'content'	 => esc_attr__('Floating Bar Widget Settings', 'fablio'),
			'after'		 => '<small>' . esc_attr__('Settings for Floating Bar Widgets', 'fablio') . '</small>',
			'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
        ),
		array(
			'id'			=> 'fbar_widget_column_layout',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Floating Bar Widget Columns', 'fablio'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '6_6',
			'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Floating Bar Column layout View for widgets.', 'fablio').'</div>',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Floating Bar in Small Devices', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Floating Bar in small devices like mobile, tablet etc.', 'fablio').'</small>',
			'dependency'     => array('fbar_show','==','true'),
		),
		array(
			'id'       => 'floatingbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Floating Bar in Responsive Mode', 'fablio'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Floating Bar.', 'fablio'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','fablio'),
				'1200'     => esc_attr__('Show only on large devices','fablio').' <small>'.esc_attr__('show only on desktops (>1200px)', 'fablio').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','fablio').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'fablio').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','fablio').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'fablio').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'fablio'),
			),
			'dependency' => array('fbar_show','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'floatingbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Floating Bar (in pixel)', 'fablio' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Floating Bar will be hidden.', 'fablio' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Topbar Settings
$tm_framework_options[] = array(
	'name'   => 'topbar_settings', // like ID
	'title'  => esc_attr__('Topbar Settings', 'fablio'),
	'icon'   => 'fa fa-tasks',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Topbar settings', 'fablio'),
        ),
		array(
			'id'     		=> 'show_topbar',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Topbar', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Topbar', 'fablio').'</div>',
        ),
		array(
			'id'            => 'topbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Background Color', 'fablio'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
								'grey'       => esc_attr__('Grey', 'fablio'),
								'white'      => esc_attr__('White', 'fablio'),
								'skincolor'  => esc_attr__('Skincolor', 'fablio'),
								'gradient'   => esc_attr__('Gradient Color', 'fablio'),
								'custom'     => esc_attr__('Custom Color', 'fablio'),
							),
			'default'       => 'darkgrey',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Topbar background color', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'topbar_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Background Color', 'fablio' ),
			'default'		 => 'rgba(0,0,0,0)',
			'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Topbar', 'fablio').'</div>',
        ),
		array(
			'id'            => 'topbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Text Color', 'fablio'),
			'options'  => array(
							'white'     => esc_attr__('White', 'fablio'),
							'dark'      => esc_attr__('Dark', 'fablio'),
							'skincolor' => esc_attr__('Skin Color', 'fablio'),
							'custom'    => esc_attr__('Custom color', 'fablio'),
						),
			'default'       => 'white',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'topbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Color for text', 'fablio' ),
			'default'		 => 'rgba(0, 0, 255, 0.25)',
			'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for Topbar Text', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'topbar_text_fontsize',
			'type'   		=> 'number',
			'title'         => esc_attr__('Topbar Text Size', 'fablio' ),
			'default'		=> '14',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
        ),
		array(
			'id'        	=> 'topbar_border_on_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Show Border at Bottom of Topabar', 'fablio'),
			'label'     	=> esc_attr__('YES', 'fablio'),
			'default'   	=> false,
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Yes if you want border at bottom of topbar)', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'topbar_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Button', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show search button in topbar. The icon will be at the right side (after menu)', 'fablio').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Topbar Content Options', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Content for Topbar', 'fablio').'</small>',
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
		),
		array(
			'id'       		 => 'topbar_left_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Left Content', 'fablio'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Left side of Topbar area', 'fablio').'</div>',
			'default'        => '<ul class="top-contact"><li><i class="fa fa-map-marker"></i>24 Tech Roqad st Ny 10023</li><li><i class="fa fa-envelope-o"></i><a href="mailto:info@example.com.com">info@example.com</a></li></ul>',
        ),
		array(
			'id'       		 => 'topbar_right_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Right Content', 'fablio'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Right side of Topbar area', 'fablio').'</div>',
			'after'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('HTML tags and shortcodes are allowed', 'fablio') . sprintf( esc_attr__('%1$s Click here to know more %2$s about shortcode description','fablio') , '<a href="'. esc_url('http://fablio.themetechmountthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
			'default'  => '[tm-social-links tooltip="no"]',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Topbar Bar in Small Devices', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Topbar Bar in small devices like mobile, tablet etc.', 'fablio').'</small>',
			'dependency'     => array('show_topbar','==','true'),
		),
		array(
			'id'       => 'topbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Topbar Bar in Responsive Mode', 'fablio'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Topbar Bar.', 'fablio'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','fablio'),
				'1200'     => esc_attr__('Show only on large devices','fablio').' <small>'.esc_attr__('show only on desktops (>1200px)', 'fablio').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','fablio').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'fablio').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','fablio').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'fablio').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'fablio'),
			),
			'dependency' => array('show_topbar','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'topbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Topbar (in pixel)', 'fablio' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Topbar will be hidden.', 'fablio' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Titlebar Settings
$tm_framework_options[] = array(
	'name'   => 'titlebar_settings', // like ID
	'title'  => esc_attr__('Titlebar Settings', 'fablio'),
	'icon'   => 'fa fa-align-justify',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Background Options', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'fablio').'</small>',
		),
		array(
			'id'            => 'titlebar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Background Color', 'fablio'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
							'grey'       => esc_attr__('Grey', 'fablio'),
							'white'      => esc_attr__('White', 'fablio'),
							'skincolor'  => esc_attr__('Skincolor', 'fablio'),
							'gradient'   => esc_attr__('Gradient Color', 'fablio'),
							'custom'     => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'darkgrey',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'titlebar_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Titlebar Background Image', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'fablio').'</div>',
			'color'			=> true,
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> 'rgba(17,24,30,0.01)',
			),
			'output' 	    => 'div.tm-titlebar-wrapper',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Font Settings', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'fablio').'</small>',
		),
		array(
			'id'            => 'titlebar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Color', 'fablio'),
			'options'  => array(
							'white'  => esc_attr__('White', 'fablio'),
							'dark'   => esc_attr__('Dark', 'fablio'),
							'custom' => esc_attr__('Custom Color', 'fablio'),
						),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
        ),
		array(
			'id'             => 'titlebar_heading_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Heading Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.tm-titlebar h1.entry-title, .tm-titlebar-textcolor-custom .tm-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '46',
				'line-height'		=> '55',
				'letter-spacing'	=> '1',
				'text-transform'	=> 'capitalize',
				'color'				=> '#20292f',
				'font'				=> 'google',
			),
			'after'			=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'fablio').'</div>',
		),
		array(
			'id'             => 'titlebar_subheading_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Sub-heading Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.tm-titlebar .entry-subtitle, .tm-titlebar-textcolor-custom .tm-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
			'units'			 => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '16',
				'line-height'		=> '22',
				'letter-spacing'	=> '0',
				'color'				=> '#20292f',
				'font'				=> 'google',
			),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'fablio').'</div>',
		),
		array(
			'id'             => 'titlebar_breadcrumb_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Breadcrumb Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.tm-titlebar .breadcrumb-wrapper, .tm-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '15',
				'line-height'		=> '19',
				'letter-spacing'	=> '0',
				'color'				=> '#686e73',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'fablio').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Content Options', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'fablio').'</small>',
		),
		array(
			'id'            => 'titlebar_view',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Align', 'fablio'),
			'options'       => array(
							'default'  => esc_attr__('All Center (default)', 'fablio'),
							'left'     => esc_attr__('Title Left / Breadcrumb Right', 'fablio'),
							'right'    => esc_attr__('Title Right / Breadcrumb Left', 'fablio'),
							'allleft'  => esc_attr__('All Left', 'fablio'),
							'allright' => esc_attr__('All Right', 'fablio'),
			),
			'default'       => 'default',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select text align in Titlebar', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'titlebar_height',
			'type'   		 => 'number',
			'title'          => esc_attr__( 'Titlebar Height', 'fablio' ),
			'after'  	  	 => ' px<br><div class="cs-text-muted">'.esc_attr__('Set height of the Titlebar. In pixel only', 'fablio').'</div>',
			'default'		 => '250',
        ),
		array(
			'id'        	=> 'breadcrumb_on_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Show Breadcrumb on bottom of Titlebar area', 'fablio'),
			'label'     	=> esc_attr__('YES', 'fablio'),
			'default'   	=> false,
			'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'fablio').'</div>',
		),
		array(
			'id'            => 'breadcum_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Breadcrumb Background Color', 'fablio'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
							'grey'       => esc_attr__('Grey', 'fablio'),
							'white'      => esc_attr__('White', 'fablio'),
							'skincolor'  => esc_attr__('Skincolor', 'fablio'),
							'custom'     => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'custom',
			'dependency' 	=> array( 'breadcrumb_on_bottom', '==|==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for breadcrumb background color', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'breadcrumb_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Breadcrumb Custom Background Color', 'fablio' ),
			'default'		 => 'rgba(0,0,0,0.50)',
			'dependency'  	 => array( 'breadcrumb_on_bottom|breadcum_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Breadcrumb', 'fablio').'</div>',
        ),
		array(
			'id'            => 'titlebar_hide_breadcrumb',
			'type'          => 'select',
			'title'         =>  esc_attr__('Hide Breadcrumb', 'fablio'),
			'options'  => array(
							'no'   => esc_attr__('NO, show the breadcrumb', 'fablio'),
							'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'fablio'),
			),
			'default'       => 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'fablio').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Extra Options', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Change settings for some extra options in Titlebar', 'fablio').'</small>',
		),
		array(
			'id'      => 'adv_tbar_catarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Category "Category Archives:" Label Text', 'fablio'),
			'default' => esc_attr__('Category Archives: ', 'fablio'),
		),
		array(
			'id'      => 'adv_tbar_tagarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Tag "Tag Archives:" Label Text', 'fablio'),
			'default' => esc_attr__('Tag Archives: ', 'fablio'),
		),
		array(
			'id'      => 'adv_tbar_postclassified',
			'type'    => 'text',
			'title'   => esc_attr__('Post Taxonomy "Posts classified under:" Label Text', 'fablio'),
			'default' => esc_attr__('Posts classified under: ', 'fablio'),
		),
		array(
			'id'      => 'adv_tbar_authorarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Author "Author Archives:" Label Text', 'fablio'),
			'default' => esc_attr__('Author Archives: ', 'fablio'),
		),

	)
);


// Header Settings
$tm_framework_options[] = array(
	'name'   => 'header_settings', // like ID
	'title'  => esc_attr__('Header Settings', 'fablio'),
	'icon'   => 'fa fa-arrow-up',
	'fields' => array( // begin: fields
	
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Header Settings', 'fablio'),
        ),
		array(
			'id'     		 => 'header_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Header Height (in pixel)', 'fablio' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area from here', 'fablio').'</div>',
			'default'		 => '100',
        ),
		array(
			'id'            => 'header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Background Color', 'fablio'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
							'grey'       => esc_attr__('Grey', 'fablio'),
							'white'      => esc_attr__('White', 'fablio'),
							'skincolor'  => esc_attr__('Skincolor', 'fablio'),
							'custom'     => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Header background color', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Custom Background Color', 'fablio' ),
			'default'		 => 'rgba(26,34,39,0.73)',
			'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'vertical_header_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Header Background Properties', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Header. You can set color or image and also set other background related properties', 'fablio').'</div>',
			'dependency'  	=> array( 'header_style', 'any', 'classic-vertical' ),
			'default'		=> array(
				'image'			=> '',
				'size'			=> 'cover',
				'color'			=> 'rgba(26,34,39,0.73)',
			),
			'output' 	    => '.tm-header-style-classic-vertical .site-header',
        ),
		array(
			'id'     		 => 'responsive_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Responsive Header Custom Background Color', 'fablio' ),
			'default'		 => '#1a2227',
			'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|classic,classic3,classic4,classic-overlay,centerlogo-overlay,toplogo-overlay,classic-box-overlay,classic-box-overlay-rtl,classic-overlay-rtl,infostack-overlay,infostack-overlay-rtl,classic-highlight' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'fablio').'</div>',
        ),
		array(
			'id'            => 'header_responsive_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Responsive Icon Color', 'fablio'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'fablio'),
							'white'  => esc_attr__('White', 'fablio'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'fablio').'</div>',
			'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
        ),
		array(
          'id'      	 	 => 'logotype',
          'type'     		 => 'radio',
          'title'    		 => esc_attr__('Logo type', 'fablio'), 
          'options' 		 => array( 
								'text' => esc_attr__('Logo as Text', 'fablio'), 
								'image' => esc_attr__('Logo as Image', 'fablio') 
							),
          'default'  		 => 'image',
          'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of logo. It can Text or Image', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'logotext',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Logo Text', 'fablio'),
			'default' 		 => 'Fablio',
			'dependency'  	 => array( 'logotype_text', '==', 'true' ),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Enter the text to be used instead of the logo image', 'fablio').'</div>',
		),
		array(
			'id'             => 'logo_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Logo Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
			'default'        => array(
				'family'		 => 'Arimo',
				'backup-family'	 => 'Arial, Helvetica, sans-serif',
				'variant'		 => 'regular',
				'font-size'		 => '26',
				'line-height'	 => '27',
				'letter-spacing' => '0',
				'color'			 => '#202020',
				'font'			 => 'google',
			),
			'dependency'  	=> array( 'logotype_text', '==', 'true' ),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This will be applied to logo text only. Select Logo font-style and size', 'fablio').'</div>',
		),
		
		array(
			'id'       		 => 'logoimg',
			'type'     		 => 'themetechmount_image',
			'title'    		 => esc_attr__('Logo Image', 'fablio'),
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'fablio') . sprintf(__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'fablio'),'<strong>', '</strong>').'</div>',
			'add_title'		 => esc_attr__('Upload Site Logo','fablio'),
			'default'		 => array(
					'thumb-url'	=> get_template_directory_uri() . '/images/logo.png',
					'full-url'	=> get_template_directory_uri() . '/images/logo.png',
			),
        ),
		array(
			'id'     		 => 'logo_max_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height', 'fablio' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'fablio').'</div>',
			'default'		 => '37',
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Sticky Header', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options for sticky header', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'sticky_header',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Enable Sticky Header', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select ON if you want the sticky header on page scroll', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'header_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Sticky Header Height (in pixel)', 'fablio' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area when it becomes sticky', 'fablio').'</div>',
			'default'		 => '80',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		array(
			'id'            => 'sticky_header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Background Color', 'fablio'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
							'grey'       => esc_attr__('Grey', 'fablio'),
							'white'      => esc_attr__('White', 'fablio'),
							'skincolor'  => esc_attr__('Skincolor', 'fablio'),
							'custom'     => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'white',
			'dependency'    => array( 'sticky_header', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Sticky Header background color', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Custom Background Color', 'fablio' ),
			'default'		 => 'rgba(21,21,21,0.96)',
			'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Sticky Header', 'fablio').'</div>',
        ),
		array(
			'id'       		 => 'logoimg_sticky',
			'type'     		 => 'themetechmount_image',
			'title'    		 => esc_attr__('Logo Image for Sticky Header', 'fablio'),
			'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for sticky header', 'fablio').'</div>',
			'add_title'		 => esc_attr__('Upload Sticky Logo','fablio'),
		),
		array(
			'id'     		 => 'logo_max_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height when Sticky Header', 'fablio' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set logo when the header is sticky', 'fablio').'</div>',
			'default'		 => '37',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Search Button in Header', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Option to show or hide search button in header area', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'header_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Button', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'search_input',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Input Word', 'fablio'),
			'default' 		 => esc_attr__('Type Word Then Enter..', 'fablio'),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'fablio').'</div>',
		),
		array(
			'id'     		 => 'searchform_title',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Title', 'fablio'),
			'default' 		 => 'Hi, How Can We Help You?',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the title for search form. Default: "Hi, How Can We Help You?"', 'fablio').'</div>',
		),
		array(
			'id'      			=> 'header_search_bgall',
			'type'    			=> 'themetechmount_background',
			'title'  			=> esc_attr__('Search Form Background', 'fablio' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Set Header Search Form background', 'fablio').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center center',
				'attachment'		=> 'fixed',
				'size'				=> 'cover',
				'color'			=> 'rgba(43,52,59,0.93)',
			),
			'output'			=> '.tm-search-overlay',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Header Style', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change header style', 'fablio').'</small>',
		),
		array(
			'id'			=> 'headerstyle',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Select Header Style', 'fablio'),
			'desc'     		=> esc_attr__('Please select header style', 'fablio'),
			'wrap_class'    => 'tm-header-style',
			'options'      	=> array(
				'classic'			=> get_template_directory_uri() . '/inc/images/header-classic.png',
				'classic2'			=> get_template_directory_uri() . '/inc/images/header-classic2.png',
				'infostack'			=> get_template_directory_uri() . '/inc/images/header-infostack.png',
				'infostack-overlay'	=> get_template_directory_uri() . '/inc/images/header-overlay-infostack.png',
				'classic-box-overlay' => get_template_directory_uri() . '/inc/images/header-elegant.png',
				'classic-overlay'	=> get_template_directory_uri() . '/inc/images/header-overlay.png',
				'classic3'			=> get_template_directory_uri() . '/inc/images/header-classic3.png',
				'classic4'			=> get_template_directory_uri() . '/inc/images/header-classic4.png',
			),
			'default'		=> 'classic',
			'attributes' 	=> array(
			'data-depend-id' => 'header_style'
			),
			'radio' 		=> true,//This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Special options for selected header', 'fablio'),
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic2,classic3,classic4,classic-overlay,classic-box-overlay,classic-rtl,classic-overlay-rtl,toplogo,toplogo-overlay,centerlogo,centerlogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl,classic-vertical,classic-highlight' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  	  	 => '<small>'.esc_attr__('These options will appear for selected header style only.', 'fablio').'</small>',
        ),
		array(
			'id'     		=> 'show_sitetagline',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Site Tagline', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide site tagline after logo.', 'fablio').'</div>',
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic3,classic4,classic-box-overlay' ),
        ),
		array(
			'id'       		 => 'header_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Text Area', 'fablio'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic2,classic3,classic4,classic-box-overlay,classic-overlay,classic-rtl,classic-overlay-rtl,classic-highlight' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear before Search/Cart icon in header area. This option will work for currently selected header style only', 'fablio').'</div>',
			'default'        => '',
        ),
		array(
			'id'       		 => 'slider_highlight_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Slider Left Text', 'fablio'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'classic-box-overlay' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear left side of  slider area. This option will work for currently selected header style only', 'fablio').'</div>',
			'default'        => '',
        ),
		array(
			'id'            => 'header_menu_position',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Position', 'fablio'),
			'options'  		=> array(
								'left'		=> esc_attr__('Left Align', 'fablio'),
								'right'		=> esc_attr__('Right Align', 'fablio'),
								'center'	=> esc_attr__('Center Align', 'fablio'),
							),
			'default'       => 'right',
			'dependency'  	=> array( 'header_style', 'any', 'classic,classic2,classic3,classic4,classic-overlay,classic-highlight,classicinfo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Menu Position. This option will work for currently selected header style only ', 'fablio').'</div>',
        ),
		
		array(
			'id'       		 => 'infostack_column_one',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack First Column Content', 'fablio'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on first column', 'fablio').'</div>',
			'default'        => '<div class="header-icon"> <div class="icon"><i class="kw_fablio flaticon-phone-call"></i></div></div><div class="header-content"><h3>Telephone</h3><h5>+123 795 9841</h5></div>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl,classicinfo' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_two',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Second Column Content', 'fablio'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on second column', 'fablio').'</div>',
			'default'        => '<div class="header-icon"> <div class="icon"><i class="kw_fablio flaticon-envelope"></i></div></div><div class="header-content"><h3>Email Address</h3><h5>info@example.com</h5></div>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl,classicinfo' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_three',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Third Column Content', 'fablio'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on third column', 'fablio').'</div>',
			'default'        => '<div class="header-icon"> <div class="icon"><i class="kw_fablio flaticon-placeholder"></i></div></div><div class="header-content"><h3>Office Address</h3><h5> 23 Belfast ave, Florida</h5></div>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl,classicinfo' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_phone_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Right Content', 'fablio'),
			'shortcode'		 => true,
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear after menu', 'fablio').'</div>',
			'default'        => '<a href="#">GET QUOTE</a>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl,classicinfo' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'header_left_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Left Content', 'fablio'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Left side of logo', 'fablio').'</div>',
			'default'        => esc_attr__('<p>Get A Estimate</p><h2 class="ph_no">900 145 7890</h2>', 'fablio'),
			'dependency'  	 => array( 'header_style', 'any', 'toplogo' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'header_right_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Right Content', 'fablio'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Right side of logo', 'fablio').'</div>',
			'default'        => esc_attr__('<p>Request an</p> <h2>Appointment</h2>', 'fablio'),
			'dependency'  	 => array( 'header_style', 'any', 'toplogo' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		
		array(
			'type'    		=> 'notice',
			'class'   		=> 'info',
			'content'		=> '<p><strong>' . esc_attr__('Change widget content of the header', 'fablio') . '</strong> <br> ' . esc_attr__('You can change widgets content in the header area from Widgets section. Just go to "Appearance > Widgets" and modify widgets under "InfoStack header widgets" position.', 'fablio') . '</p>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'id'            => 'header_widget_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Widget Text Color', 'fablio'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'fablio'),
							'white'  => esc_attr__('White', 'fablio'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for Widgets text for Overlay header style. This is because the background is transparent so you should set it.', 'fablio').'</div>',
			'dependency'    => array( 'header_bg_color|header_style', '==|any', 'custom|infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
        ),
		array(
			'id'     		 => 'header_menuarea_height',
			'type'    		 => 'number',
			'title'   		 => esc_attr__('Menu area height', 'fablio'),
			'default' 		 => '60',
			'after'          => esc_attr(' px'),
			'attributes'     => array(
			'min'       	 => 40,
			),
			'subtitle'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Height for menu area only', 'fablio').'</div>',
			'dependency'     => array( 'header_style', 'any', 'toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
		),
		array(
			'id'     		 => 'center_logo_width',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Area Width (pixel)', 'fablio' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You need to change this only when your menu overlays on the logo. This should be bigger that the logo width (ignore this if retina logo). Please set this and check your site for best results', 'fablio').'</div>',
			'default'		 => '370',
			'dependency'  	 => array( 'header_style', 'any', 'centerlogo,centerlogo-overlay' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'id'     		 => 'first_menu_margin',
			'type'   		 => 'number',
			'title'          => esc_attr__('Menu Left margin (pixel)', 'fablio' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You need to change this only when you feel your menu is not center aligned with logo. Please set this and check your site for best results', 'fablio').'</div>',
			'default'		 => '50',
			'dependency'  	 => array( 'header_style', 'any', 'centerlogo,centerlogo-overlay' ),//This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),		
		array(
			'id'            => 'header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Background Color', 'fablio'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
								'grey'       => esc_attr__('Grey', 'fablio'),
								'white'      => esc_attr__('White', 'fablio'),
								'skincolor'  => esc_attr__('Skincolor', 'fablio'),
								'custom'     => esc_attr__('Custom Color', 'fablio'),
							),
			'default'       => 'white',
			'dependency'	=> array( 'header_style', 'any', 'toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Menu Background Custom Background Color', 'fablio' ),
			'default'		 => 'rgba(0,0,0,0.31)',
			'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area', 'fablio').'</div>',
        ),
        array(
			'id'            => 'sticky_header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Menu Background Color', 'fablio'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
								'grey'       => esc_attr__('Grey', 'fablio'),
								'white'      => esc_attr__('White', 'fablio'),
								'skincolor'  => esc_attr__('Skincolor', 'fablio'),
								'custom'     => esc_attr__('Custom Color', 'fablio'),
							),
			'default'       => 'white',
			'dependency'	=> array( 'header_style', 'any', 'toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header when header is sticky', 'fablio').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Menu Background Custom Background Color', 'fablio' ),
			'default'		 => 'rgba(129,215,66,0.7)',
			'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area when header is sticky', 'fablio').'</div>',
        ),

		array(
			'id'            => 'header_logo_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Logo Background Color', 'fablio'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
								'grey'       => esc_attr__('Grey', 'fablio'),
								'white'      => esc_attr__('White', 'fablio'),
								'skincolor'  => esc_attr__('Skincolor', 'fablio'),
							),
			'default'       => 'darkgrey',
			'dependency'	=> array( 'header_style', 'any', 'classic-highlight' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Logo area in header', 'fablio').'</div>',
        ),
			
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Logo SEO', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options for Logo SEO', 'fablio').'</small>',
		),
		array(
			'id'      		=> 'logoseo',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Logo Tag for SEO', 'fablio'),
			'options' 		=> array(
								'h1homeonly' => esc_attr__('H1 for home, SPAN on other pages', 'fablio'),
								'allh1'      => esc_attr__('H1 tag everywhere', 'fablio'),
							),
			'default'		=> 'h1homeonly',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select logo tag for SEO purpose', 'fablio').'</div>',
        ),
	
		
	)
);


// Menu Settings
$tm_framework_options[] = array(
	'name'   => 'menu_settings', // like ID
	'title'  => esc_attr__('Menu Settings', 'fablio'),
	'icon'   => 'fa fa-bars',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Menu Settings', 'fablio'),
			'after'  	  	=> '<small>'.esc_attr__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'fablio').'</small>',
		),
		array(
			'id'      		=> 'menu_breakpoint',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Responsive Menu Breakpoint', 'fablio'),
			'options'  		=> array(
								'1200'   => esc_attr__('Large devices','fablio').' <small>'.esc_attr__('Desktops (>1200px)', 'fablio').'</small>',
								'992'    => esc_attr__('Medium devices','fablio').' <small>'.esc_attr__('Desktops and Tablets (>992px)', 'fablio').'</small>',
								'768'    => esc_attr__('Small devices','fablio').' <small>'.esc_attr__('Mobile and Tablets (>768px)', 'fablio').'</small>',
								'custom' => esc_attr__('Custom (select pixel below)', 'fablio'),
						),
			'default'		=> '1200',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Change options for responsive menu breakpoint', 'fablio').'</div>',
        ),
		
		array(
			'id'     		=> 'megamenu-override',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Override Max Mega Menu Style', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('We need to override some of the Max mega Menu plugin\'s settings to match with our theme. If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'fablio').'</div>',
        ),
		
		array(
			'id'     		 => 'menu_breakpoint-custom',
			'type'   		 => 'number',
			'title'          => esc_attr__('Custom Breakpoint for Menu (in pixel)', 'fablio' ),
			'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
			'default'		 => '1200',
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Select after how many pixels the menu will become responsive', 'fablio').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Main Menu Options', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options for main menu in header', 'fablio').'</small>',
		),
		array(
			'id'             => 'mainmenufont',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Main Menu Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '14',
				'line-height'		=> '26',
				'letter-spacing'	=> '0.3',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select main menu font, color and size', 'fablio').'</div>',
		),
		
		
		
		array(
			'id'     		 => 'stickymainmenufontcolor',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Font Color for Sticky Header', 'fablio' ),
			'default'		 => '#222d35',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Main menu font color when the header becomes sticky', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'mainmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Main Menu Active Link Color', 'fablio'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'fablio'),
				'custom'		=> esc_attr__('Custom color (select below)', 'fablio'),
			),
			'default'      	=> 'skin',
			'after'  		=> '<div class="cs-text-muted"><br>
									<strong>' . esc_attr__('Tips:', 'fablio') . '</strong>
									<ul>
										<li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'fablio') . '</li>
										<li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'fablio') . '</li>
									</ul>
								</div>',
        ),
		array(
			'id'     		 => 'mainmenu_active_link_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Active Link Custom Color', 'fablio' ),
			'default'		 => '#ffffff',
			'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for main menu active active link', 'fablio').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Drop Down Menu Options', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options for drop down menu in header', 'fablio').'</small>',
		),
		array(
			'id'             => 'dropdownmenufont',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Dropdown Menu Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '13',
				'line-height'		=> '14',
				'letter-spacing'	=> '0',
				'color'				=> '#555c63',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select dropdown menu font, color and size', 'fablio').'</div>',
		),
		
		
		array(
			'id'           	=> 'dropmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Dropdown Menu Active Link Color', 'fablio'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'fablio'),
				'custom'		=> esc_attr__('Custom color (select below)', 'fablio'),
			),
			'default'      	=> 'skin',
			'after'  		=> '<div class="cs-text-muted"><br>' . '<strong>' . esc_attr__('Tips:', 'fablio') . '</strong>' . '<ul><li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'fablio') . '</li><li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'fablio') . '</li></ul></div>',
        ),
		array(
			'id'     		=> 'dropmenu_active_link_custom_color',
			'type'   		=> 'color_picker',
			'title'  		=> esc_attr__('Dropdown Menu Active Link Custom Color', 'fablio' ),
			'default'		=> '#ffffff',
			'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for dropdown menu active menu text', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'dropmenu_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Dropdown Menu Background Properties (for all dropdown menus)', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'fablio').'</div>',
			'default'		=> array(
				'image'			=> '',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output' 	    => '.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
        ),
		array(
			'id'      		=> 'dropdown_menu_separator',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Separator line between dropdown menu links', 'fablio'),
			'options'  		=> array(
								'grey'  => esc_attr__('Grey color as border color (default)', 'fablio'),
								'white' => esc_attr__('White color as border color (for dark background color)', 'fablio'),
								'no'    => esc_attr__('No separator border', 'fablio'),
							),
			'default'		=> 'grey',
			'after'  	  	=> '<div class="cs-text-muted"><br> <strong>' . esc_attr__('Tips:', 'fablio') . '</strong>
								<ul>
									<li>' . esc_attr__('"Grey color as border color (default):" This is default border view.', 'fablio') . '</li>
									<li>' . esc_attr__('"White color:" Select this option if you are going to select dark background color (for dropdown menu)', 'fablio') . '</li>
									<li>' . esc_attr__('"No separator border:" Completely remove border. This will make your menu totally flat', 'fablio') . '</li>
								</ul></div>',
        ),
		array(
			'id'             => 'megamenu_widget_title',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('MegaMenu Widget Title Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '15',
				'line-height'		=> '20',
				'letter-spacing'	=> '0',
				'color'				=> '#222d35',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Font settings for mega menu widget title. NOTE: This will work only if you installed "Max Mega Menu" plugin and also activated in the main (primary) menu', 'fablio').'</div>',
		),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => '',
			'after'  	  	 => '<strong>'.esc_attr__('Individual Drop Down Menu Options', 'fablio').'</strong>',
		),
		array(
			'id'      		=> 'dropmenu_background_1',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('First dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for first dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_2',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Second dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for second dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_3',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Third dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for third dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_4',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Fourth dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fourth dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_5',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Fifth dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fifth dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_6',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Sixth dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for sixth dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_7',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Seventh dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for seventh dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_8',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Eighth dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for eighth dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_9',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Ninth dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for ninth dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_10',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Tenth dropdown menu background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for tenth dropdown menu.', 'fablio') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu:before',
        ),
		
	)
);

// Footer Settings
$tm_framework_options[] = array(
	'name'   => 'footer_settings', // like ID
	'title'  => esc_attr__('Footer Settings', 'fablio'),
	'icon'   => 'fa fa-arrow-down',
	'fields' => array( // begin: fields
		array(
			'type'			=> 'heading',
			'content'    	=> esc_attr__('Sticky Footer', 'fablio'),
			'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'fablio').'</small>',
        ),
		array(
			'id'     		=> 'stickyfooter',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Sticky Footer', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'fablio').'</div>',
        ),
		
		// Footer Call To Action Box 
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Call To Action Box', 'fablio'),
					'after'  	  	 => '<small>'.esc_attr__('Modify Title, SUb Title, icon, button link, button title etc in footer Call To Action Box here.', 'fablio').'</small>',
				),
				array(
					'id'     		=> 'footer_cta_box',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Footer Call To Action', 'fablio'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable call to action box in footer', 'fablio').'</div>',
				),
				array(
					'id'			=> 'footer_cta_column_layout',
					'type' 			=> 'image_select',//themetechmount_pre_color_packages
					'title'			=> esc_attr__('Footer CTA Columns', 'fablio'),
					'options'      	=> array(
							'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
							'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
							'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
							'5_4_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					),
					'default'		=> '6_6',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer CTA Column layout.', 'fablio').'</div>',
				),
				array(
					'id'     		=> 'footer_cta_box_column1',
					'type'    		=> 'textarea',
					'default' 		=> '',
					'shortcode'		=> true,
					'title'   		=> esc_attr__('CTA First Column Content', 'fablio'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on first column', 'fablio') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_box_column2',
					'type'    		=> 'textarea',
					'shortcode'		 => true,
					'title'   		=> esc_attr__('CTA Second Column Content', 'fablio'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on second column', 'fablio') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_box_column3',
					'type'    		=> 'textarea',
					'shortcode'		 => true,
					'title'   		=> esc_attr__('CTA Third Column Content', 'fablio'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on third column', 'fablio') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'            => 'footer_cta_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Background Color', 'fablio'),
					'options'  		=> array(
										'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
										'grey'       => esc_attr__('Grey', 'fablio'),
										'white'      => esc_attr__('White', 'fablio'),
										'skincolor'  => esc_attr__('Skincolor', 'fablio'),
										'custom'     => esc_attr__('Custom Color', 'fablio'),
									),
					'default'       => 'skincolor',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer CTA background color', 'fablio').'</div>',
				),
				array(
					'id'     		 => 'footer_cta_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Footer CTA Custom Background Color', 'fablio' ),
					'default'		 => 'grey',
					'dependency'  	 => array( 'footer_cta_box|footer_cta_bg_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Footer CTA', 'fablio').'</div>',
				),
				array(
					'id'            => 'footer_cta_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Text Color', 'fablio'),
					'options'  => array(
									'white'     => esc_attr__('White', 'fablio'),
									'dark'      => esc_attr__('Dark', 'fablio'),
									'skincolor' => esc_attr__('Skin Color', 'fablio'),
								),
					'default'       => 'white',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
				),
				array(
					'id'            => 'footer_cta_styles',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Style', 'fablio'),
					'options'  => array(
									'default'     => esc_attr__('Default', 'fablio'),
									'style1'      => esc_attr__('Style 1', 'fablio'),
								),
					'default'       => 'default',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
		// Footer common background
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Background (full footer elements)', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('This background property will apply to full footer area. You can add', 'fablio').'</small>',
		),
		array(
			'id'            => 'full_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color (all area)', 'fablio'),
			'options'		=> array(
				'transparent' => esc_attr__('Transparent', 'fablio'),
				'darkgrey'    => esc_attr__('Dark grey', 'fablio'),
				'grey'        => esc_attr__('Grey', 'fablio'),
				'white'       => esc_attr__('White', 'fablio'),
				'skincolor'   => esc_attr__('Skincolor', 'fablio'),
				'gradient'   => esc_attr__('Gradient Color', 'fablio'),
				'custom'      => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'darkgrey',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'fablio').'</div>',
        ),
		array(
			'id'      		 => 'full_footer_bg_all',
			'type'    		 => 'themetechmount_background',
			'title'  		 => esc_attr__('Footer Background (all area)', 'fablio' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'fablio').'</div>',
			'default'		 => array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
			),
			'output' 	     => '.footer',
			'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('First Footer Widget Area', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer widget area', 'fablio').'</small>',
		),
		array(
			'id'			=> 'first_footer_column_layout',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'fablio'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'9_3'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'5_2_5'   => get_template_directory_uri() . '/inc/images/footer_col_5_2_5.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
					'4_4_4_1'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4_1.png',
			),
			'default'		=> '9_3',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'fablio').'</div>',
        ),
		
		array(
			'id'            => 'first_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'fablio'),
			'options'  => array(
				'transparent' => esc_attr__('Transparent', 'fablio'),
				'darkgrey'    => esc_attr__('Dark grey', 'fablio'),
				'grey'        => esc_attr__('Grey', 'fablio'),
				'white'       => esc_attr__('White', 'fablio'),
				'skincolor'   => esc_attr__('Skincolor', 'fablio'),
				'gradient'   => esc_attr__('Gradient Color', 'fablio'),
				'custom'      => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'fablio').'</div>',
        ),
		array(
			'id'      			=> 'first_footer_bg_all',
			'type'    			=> 'themetechmount_background',
			'title'  			=> esc_attr__('Footer Background', 'fablio' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'fablio').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center bottom',
				'attachment'		=> 'scroll',
				'size'				=> 'cover',
				'color'				=> '#252d32',
			),
			'output'			=> '.first-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'first_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'fablio'),
			'options'  		=> array(
								'white'  => esc_attr__('White', 'fablio'),
								'dark'   => esc_attr__('Dark', 'fablio'),
							),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'first_footer_widget_seperator',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border Separator Between Widget', 'fablio'),
			'options'  		=> array(
								'no'  	=> esc_attr__('No', 'fablio'),
								'yes'   => esc_attr__('Yes', 'fablio'),
							),
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Yes" if you want to set border separator between widget', 'fablio').'</div>',
        ),
		
		// Second Footer Widget Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Second Footer Widget Area', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for second footer widget area', 'fablio').'</small>',
		),
		array(
			'id'			=> 'second_footer_column_layout',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'fablio'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'3_4_3_2' => get_template_directory_uri() . '/inc/images/footer_col_3_4_3_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '4_4_4',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'fablio').'</div>',
        ),
		array(
			'id'            => 'second_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'fablio'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'fablio'),
							'darkgrey'    => esc_attr__('Dark grey', 'fablio'),
							'grey'        => esc_attr__('Grey', 'fablio'),
							'white'       => esc_attr__('White', 'fablio'),
							'skincolor'   => esc_attr__('Skincolor', 'fablio'),
							'gradient'   => esc_attr__('Gradient Color', 'fablio'),
							'custom'      => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'second_footer_bg_all',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Footer Background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'fablio').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'auto',
				'color'			=> '#f5f8fa',
			),
			'output' 	    => '.second-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'second_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'fablio'),
			'options'  		=> array(
				'white'  		=> esc_attr__('White', 'fablio'),
				'dark'   		=> esc_attr__('Dark', 'fablio'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
        ),

		// Footer border betweeen Widget border Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Border Between Footer First And Second Footer Widget Area', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('This option will add Horizontal border between First and Second Footer Widget Area', 'fablio').'</small>',
		),
		array(
			'id'           	=> 'border_between_footerwidget_area',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border', 'fablio'),
			'options'  		=> array(
				'none'			=> esc_attr__('None', 'fablio'),
				'white'			=> esc_attr__('White', 'fablio'),
				'dark'			=> esc_attr__('Dark', 'fablio'),
			),
			'default'      	=> 'none',
        ),
		// Footer Text Area
		
		// Footer Text Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Text Area', 'fablio'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer text area. This contains copyright info', 'fablio').'</small>',
		),
		array(
			'id'            => 'bottom_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'fablio'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'fablio'),
							'darkgrey'    => esc_attr__('Dark grey', 'fablio'),
							'grey'        => esc_attr__('Grey', 'fablio'),
							'white'       => esc_attr__('White', 'fablio'),
							'skincolor'   => esc_attr__('Skincolor', 'fablio'),
							'gradient'   => esc_attr__('Gradient Color', 'fablio'),
							'custom'      => esc_attr__('Custom Color', 'fablio'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'bottom_footer_bg_all',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Footer Background', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'fablio').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'fixed',
				'color'			=> '#252d32',
			),
			'output' 	    => '.site-footer .bottom-footer-text',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'bottom_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'fablio'),
			'options'  		=> array(
				'white'			=> esc_attr__('White', 'fablio'),
				'dark'			=> esc_attr__('Dark', 'fablio'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'fablio').'</div>',
        ),
		array(
          'id'      		=> 'footer_copyright_left',
          'type'    		=> 'wysiwyg',
          'title'  			=>  esc_attr__('Footer Text Left', 'fablio'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'fablio')
		  . '<br>   <code>[tm-site-url]</code> <code>[tm-site-title]</code> <code>[tm-site-tagline]</code> <code>[tm-current-year]</code> <code>[tm-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','fablio') , '<a href="'. esc_url('https://themetechmount.com/wordpress/fablio/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
		  'default'         => themetechmount_wp_kses('Copyright &copy; 2021 <a href="' . site_url() . '">' . get_bloginfo('name') . '</a>. All rights reserved.'),
        ),
		
		
		array(
          'id'      		=> 'footer_copyright_center',
          'type'    		=> 'wysiwyg',
          'title'  			=>  esc_attr__('Footer Text Center', 'fablio'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'fablio')
		  . '<br>   <code>[tm-site-url]</code> <code>[tm-site-title]</code> <code>[tm-site-tagline]</code> <code>[tm-current-year]</code> <code>[tm-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','fablio') , '<a href="'. esc_url('https://themetechmount.com/wordpress/fablio/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
        ),
		
		
		
		array(
          'id'       		=> 'footer_copyright_right',
          'type'     		=> 'wysiwyg',
          'title'   		=>  esc_attr__('Footer Text Right', 'fablio'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'fablio')
		  . '<br>   <code>[tm-site-url]</code> <code>[tm-site-title]</code> <code>[tm-site-tagline]</code> <code>[tm-current-year]</code> <code>[tm-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s about details for each shortcode.','fablio') , '<a href="'. esc_url('https://themetechmount.com/wordpress/fablio/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
        ),
		array(
			'id'           	=> 'border_above_copyright_area',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border Above Copyright Text', 'fablio'),
			'options'  		=> array(
				'none'		=> esc_attr__('None', 'fablio'),
				'white'		=> esc_attr__('White', 'fablio'),
				'dark'		=> esc_attr__('Dark', 'fablio'),
			),
			'default'      	=> 'none',
        ),
	)
);


// Button Settings
$tm_framework_options[] = array(
	'name'   => 'button_settings', // like ID
	'title'  => esc_attr__('Button Settings', 'fablio'),
	'icon'   => 'fa fa-square-o',
	'fields' => array( // begin: fields
		array(
			'type'			=> 'heading',
			'content'    	=> esc_attr__('Global Button Settings', 'fablio'),
			'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'fablio').'</small>',
        ),
		array(
			'id'             => 'button_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Button Font', 'fablio'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.main-holder .site-content ul.products li.product .add_to_wishlist, .main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"], .woocommerce button.button, .woocommerce-page button.button, input, .tm-vc_btn, .tm-vc_btn3, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .themetechmount-post-readmore a,.themetechmount-servicebox-style5 .themetechmount-serviceboxbox-readmore a,.themetechmount-iconbox-styleeleven .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md,.tm-ptablebox .tm-vc_btn3-container.tm-vc_btn3-inline .tm-vc_btn3,.themetechmount-box-service .themetechmount-serviceboxbox-readmore a,.post.themetechmount-box-blog-classic .themetechmount-blogbox-footer-readmore a,.single-tm_portfolio .nav-links a, .comment-respond .tm-vc_btn3.tm-vc_btn3-shape-square,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .main-holder .site .woocommerce-cart-form__contents button, .main-holder .site .woocommerce-cart-form__contents button.button:disabled[disabled], .main-holder .site table.cart .coupon button,.themetechmount-blogbox-styleone .themetechmount-blogbox-footer-readmore a,.themetechmount-box-blog .themetechmount-blogbox-footer-readmore a,.themetechmount-blogbox-styletwo .themetechmount-blogbox-footer-left a,.themetechmount-box-blog.themetechmount-blog-box-view-left-image .themetechmount-blogbox-footer-left a,.themetechmount-iconbox .tm-vc_btn3-container a,.elementor-element.elementor-widget-button .elementor-button', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Rubik',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'letter-spacing'	=> '0',
				'text-transform'	=> 'uppercase',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to all buttons in this site', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'button_topbottom_padding',
			'type'   		=> 'number',
			'title'         => esc_attr__('Medium Button Top Bottom Padding', 'fablio' ),
			'default'		=> '17',
        ),
		array(
			'id'     		=> 'medium_button_fontsize',
			'type'   		=> 'number',
			'title'         => esc_attr__('Medium Button Font Size', 'fablio' ),
			'default'		=> '14',
        ),
	)
);

// Blog Settings
$tm_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_attr__('Blog Settings', 'fablio'),
	'icon'   => 'fa fa-pencil',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blog section', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blog Excerpt Limit (in words)', 'fablio' ),
			'default'		=> '0',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'fablio') . '<br><strong>' . esc_attr__('TIP:', 'fablio') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'fablio') . '</div>',
        ),
		array(
			'id'     		=> 'blogclassic_show_comment_number',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show "Total Comment" with icon', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Total Comment with icon. You can hide it if you don\'t want to show it.', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'fablio'),
			'default' 		=> esc_attr__('READ MORE', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Text for the Read More link on the Blog page', 'fablio').'</div>',
		),
		
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog view', 'fablio'),
			'options'  		=> array(
				'classic'			=> get_template_directory_uri() . '/inc/images/blog-view-style1.png',
				'box'				=> get_template_directory_uri() . '/inc/images/blog-view-style4.png',
			),
			'default'      	=> 'classic',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'fablio').'</div>',
			
        ),
		
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'fablio').'</small>',
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box column', 'fablio'),
			'options'  		=> array(
				'one'			=> esc_attr__('One Column View', 'fablio'),
				'two'			=> esc_attr__('Two Column view', 'fablio'),
				'three'			=> esc_attr__('Three Column view (default)', 'fablio'),
				'four'			=> esc_attr__('Four Column view', 'fablio'),
			),
			'default'      	=> 'one',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'fablio').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'           	=> 'blogbox_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog box template', 'fablio'),
			'options'  		=> array(
				'style1'		=> get_template_directory_uri() . '/inc/images/blogbox-style-one.png',
				'style4'		=> get_template_directory_uri() . '/inc/images/blogbox-style4.png',
				'style2'		=> get_template_directory_uri() . '/inc/images/blogbox-style2.png.png',
				'left-image'	=> get_template_directory_uri() . '/inc/images/blogbox-style3.png',
			),
			'default'      	=> 'style1',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'fablio').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'     		=> 'blogbox_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blogbox Excerpt Limit (in words)', 'fablio' ),
			'default'		=> '75',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'fablio') . '<br><strong>' . esc_attr__('TIP:', 'fablio') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'fablio') . '</div>',
        ),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Single Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Settings for single view of blog post.', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'fablio'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'fablio').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'fablio'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'fablio'),
					'twitter'     => esc_attr__('Twitter', 'fablio'),
					'gplus'       => esc_attr__('Google Plus', 'fablio'),
					'pinterest'   => esc_attr__('Pinterest', 'fablio'),
					'linkedin'    => esc_attr__('LinkedIn', 'fablio'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'fablio'),
					'tumblr'      => esc_attr__('Tumblr', 'fablio'),
					'reddit'      => esc_attr__('Reddit', 'fablio'),
					'digg'        => esc_attr__('Digg', 'fablio'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>'.esc_attr__('The selected social service icon will be visible on single Post so user can share on social sites.', 'fablio').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Classic Meta Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Settings for meta data for Blog classic view.', 'fablio').'</small>',
		),
		array(
			'id'      => 'blogclassic_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','fablio'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'fablio').'</div>',
			'default' => array(
				'enabled' => array(
					'cat'       => esc_attr__('Categories', 'fablio'),	
					'author'	=> esc_attr__('Author', 'fablio'),
					'comment'   => esc_attr__('Comments', 'fablio'),
					),
				'disabled' => array(
					'tag'		=> esc_attr__('Tags', 'fablio'),
					'date'		=> esc_attr__('Date', 'fablio'),				
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'fablio'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'fablio'),
		),
		array(
			'id'     		=> 'blogclassic_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'fablio'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'fablio'). ' <a href="' . esc_url('https://codex.wordpress.org/Formatting_Date_and_Time') . '" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'fablio') . '</a></div>',
		),
		array(
			'id'     		=> 'blogclassic_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'fablio').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blogbox (Visual Composer element)', 'fablio').'</small>',
		),
		array(
			'id'      => 'blogbox_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','fablio'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'fablio').'</div>',
			'default' => array(
				'enabled' => array(					
					'date'    	=> esc_attr__('Date', 'fablio'),
					'comment' 	=> esc_attr__('Comments', 'fablio'),	
				),
				'disabled' => array(					
					'tag'  		=> esc_attr__('Tags', 'fablio'),	
					'author'	=> esc_attr__('Author', 'fablio'),	
					'cat'    	=> esc_attr__('Categories', 'fablio'),		
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'fablio'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'fablio'),
		),
		array(
			'id'     		=> 'blogbox_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'fablio'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'fablio'). ' <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'fablio') . '</a></div>',
		),
		array(
			'id'     		=> 'blogbox_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'fablio').'</div>',
        ),
		
	)
);



// Portfolio Settings
$tm_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'fablio'), $pf_title_singular ),
	'icon'   => 'fa fa-th-large',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'fablio'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'fablio'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'default' 		=> esc_attr__('Project Information', 'fablio'),
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'fablio'), $pf_title_singular ),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'fablio'), $pf_title_singular ) . '</div>',
		),
		array(
			'id'      		=> 'portfolio_viewstyle',
			'type'   		=> 'radio',
			'title'   		=> sprintf( esc_attr__('Single %s View Style', 'fablio'), $pf_title_singular ),
			'options' 		=> array( 
				'left'			=> esc_attr__('Left image and right content (default)', 'fablio'),
				'left-style2' 	=> esc_attr__('Left image and right content Style2', 'fablio'),
				'top'			=> esc_attr__('Top image and bottom content', 'fablio'),
				'full'			=> esc_attr__('No image and full-width content (without details box)', 'fablio'),
				'full-withimg'  => esc_attr__('Top image and full-width content (without details box)', 'fablio'),
			),
			'default'		=> 'left',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'fablio'), $pf_title_singular ) . '</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Related %1$s (on single %2$s) Settings', 'fablio'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for related %1$s section on single %2$s page.', 'fablio'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_attr__('Show Related %s', 'fablio'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select ON to show related %1$s on single %2$s page', 'fablio'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Related %s Title', 'fablio'), $pf_title ),
			'default' 		=> esc_attr__('Related Work', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Releated %1$s area. (For single %2$s only)', 'fablio'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Related %s Boxes template', 'fablio'), $pf_title ),
			'options'  		=> array(
				'style1'			=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
				'style2'			=> get_template_directory_uri() . '/inc/images/portfolio-style2.png',
			),
			'default'      	=> 'style2',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'fablio'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_attr__('Select column', 'fablio'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'fablio'),
					'three'   => esc_attr__('Three column', 'fablio'),
					'four'    => esc_attr__('Four column', 'fablio'),
					'five'    => esc_attr__('Five column', 'fablio'),
					'six'     => esc_attr__('Six column', 'fablio'),
				),
			//'class'        	=> 'chosen',
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'fablio'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('Show %s', 'fablio'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %2$s Boxes you like to show in Related %1$s area.', 'fablio'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s List Details Settings', 'fablio'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'fablio'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'fablio'),
			'info'            => sprintf( esc_attr__('This will be added a new line in DETAILS box on single %s view.', 'fablio'), $pf_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'fablio'),
			'accordion_title' => esc_attr__('Details for the line', 'fablio'),
			
			'default'		 =>  array (
				array (
					'pf_details_line_title' => 'Project',
					'pf_details_line_icon'  => array (
						'library' => 'fontawesome',
						'library_fontawesome' => 'fa fa-tachometer',
						'library_linecons'    => 'vc_li-note',
						'library_themify'     => 'ti-notepad',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => ' Category',
					'pf_details_line_icon'  => array (
						'library'             => 'themify',
						'library_fontawesome' => 'fa fa-calendar',
						'library_linecons'    => 'vc_li-tag',
						'library_themify'     => 'ti-panel',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => '  Clients',
					'pf_details_line_icon'  => array (
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-user',
						'library_linecons'    => 'vc_li-user',
						'library_themify'     => 'ti-user',
					),
					'data' => 'custom',
				),				
			),



			'fields'          => array(
				array(
					'id'     		=> 'pf_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'fablio'),
					'default' 		=> esc_attr__('Location', 'fablio'),
					'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the first line of the details in single %s', 'fablio'), $pf_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'fablio').'</div>',
				),
				array(
					'id'      => 'pf_details_line_icon',
					'type'    => 'themetechmount_iconpicker',
					'title'  		=> esc_attr__('Line Icon', 'fablio' ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select icon for the first Line of the details in single %s', 'fablio'), $pf_title_singular ) . '</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_attr__('Line Input Type', 'fablio'),
					'options' 		=> array(
							'custom'        => esc_attr__('Custom text (single line)', 'fablio'),
							'multiline'     => esc_attr__('Custom text with multiline', 'fablio'),
							'date'          => sprintf( esc_attr__('Show date of the %s', 'fablio'), $pf_title_singular ),
							'category'      => sprintf( esc_attr__('Show Category (without link) of the %s', 'fablio'), $pf_title_singular ),
							'category_link' => sprintf( esc_attr__('Show Category (with link) of the %s', 'fablio'), $pf_title_singular ),
							'tag'           => sprintf( esc_attr__('Show Tags (without link) of the %s', 'fablio'), $pf_title_singular ),
							'tag_link'      => sprintf( esc_attr__('Show Tags (with link) of the %s', 'fablio'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'fablio'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Select social sharing service for single %s', 'fablio'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Select social service so site visitors can share the single %s on different social services', 'fablio'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Social Share box', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide social share box.', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'fablio'),
			'default' 		=> esc_attr__('Share', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'fablio').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'fablio'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'fablio'),
					'twitter'     => esc_attr__('Twitter', 'fablio'),
					'gplus'       => esc_attr__('Google Plus', 'fablio'),
					'pinterest'   => esc_attr__('Pinterest', 'fablio'),
					'linkedin'    => esc_attr__('LinkedIn', 'fablio'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'fablio'),
					'tumblr'      => esc_attr__('Tumblr', 'fablio'),
					'reddit'      => esc_attr__('Reddit', 'fablio'),
					'digg'        => esc_attr__('Digg', 'fablio'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('The selected social service icon will be visible on single %s so user can share on social sites.', 'fablio'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'fablio'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'fablio'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'fablio'), $pf_title_singular ),
			'options'       => themetechmount_global_portfolio_template_list(),
			'options'  		=> array(
				'style1'			=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
				'style2'			=> get_template_directory_uri() . '/inc/images/portfolio-style2.png',
			),
			'default'      	=> 'style2',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'fablio'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'fablio'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'fablio'),
					'three'   => esc_attr__('Three column', 'fablio'),
					'four'    => esc_attr__('Four column', 'fablio'),
					'five'    => esc_attr__('Five column', 'fablio'),
					'six'     => esc_attr__('Six column', 'fablio'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'fablio'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'fablio' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'fablio'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);


// Team Member Settings
$tm_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'fablio'), $team_member_title_singular ),
	'icon'   => 'fa fa-users',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr_x('%s\'s Extra Details Settings', 'Team Member', 'fablio'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_attr_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'fablio'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'fablio'),
			'info'            => sprintf( esc_attr_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'fablio'), $team_member_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'fablio'),
			'accordion_title' => esc_attr__('Details for the line', 'fablio'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'fablio'),
					'default' 		=> esc_attr__('Experiance', 'fablio'),
					'after'  		=> '<div class="cs-text-muted"><br>'. sprintf( esc_attr_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'fablio'), $team_member_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'fablio').'</div>',
				),
				array(
					'id'      => 'team_extra_details_line_icon',
					'type'    => 'themetechmount_iconpicker',
					'title'   => esc_attr__('Line Icon', 'fablio' ),
					'after'   => '<div class="cs-text-muted"><br>' . sprintf( esc_attr_x('Select icon for the Line of the details in single %s', 'Team Member', 'fablio'), $team_member_title_singular ) . '</div>',
					'default' => array(
						'library'             => 'themify',
						'library_themify'	  => 'ti-calendar',
					),
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Line Data Type', 'fablio'),
					'options' 		=> array(
							'custom'  => esc_attr__('Custom text (add anything)', 'fablio'),
							'url'     => esc_attr__('URL link', 'fablio'),
							'email'   => esc_attr__('Email address', 'fablio'),
							'phone'   => esc_attr__('Phone number', 'fablio'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>'.sprintf( esc_attr_x('Select view for single %s', 'Team Member', 'fablio'), $team_member_title_singular ).'</div>',
				),
			),
			'default' =>   array (
				array (
					'team_extra_details_line_title' => 'Age ',
					'team_extra_details_line_icon' => array (
						'library' => 'themify',
						'library_fontawesome' => 'empty',
						'library_linecons' => 'vc_li vc_li-bubble',
						'library_themify' => 'themifyicon ti-time',
					),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Experience ',
					'team_extra_details_line_icon' => array (
						'library' => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
						'library_linecons' => 'vc_li vc_li-bubble',
						'library_themify' => 'themifyicon ti-time',
					),
					'data' => 'custom',
				),
				),
			
        ),
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'fablio'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s page', 'fablio'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'fablio'), $team_member_title_singular ),
			'options'  		=> array(
				'style1'			=> get_template_directory_uri() . '/inc/images/teambox-style1.png',
				'style2'			=> get_template_directory_uri() . '/inc/images/teambox-style2.png',
			),
			'default'      	=> 'style2',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s\'s Box view on %2$s page.', 'fablio'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'fablio'),
			'options'  => array(
					'two'   => esc_attr__('Two column', 'fablio'),
					'three' => esc_attr__('Three column', 'fablio'),
					'four'  => esc_attr__('Four column', 'fablio'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf(esc_attr__('Select column to show %s', 'fablio'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to Show', 'fablio' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %s you like to show on category page', 'fablio'), $team_member_title  ) . '</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'fablio'), $team_member_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'fablio'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'teammember_detailsbox_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'fablio'), $team_member_title_singular ),
			'default' 		=> esc_attr__('Personal Information', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Member "%1$s Details" area. (For single %1$s only)', 'fablio'), $team_member_title_singular ) . '</div>',
		),
		
	)
);


// Service CPT Settings
$tm_framework_options[] = array(
	'name'   => 'service_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'fablio'), $service_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'fablio'), $service_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'fablio'), $service_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'services_cat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'fablio'), $service_title_singular ),
			'options'  		=> array(
				'styleone'			=> get_template_directory_uri() . '/inc/images/service-view-style1.png',
				'styletwo'			=> get_template_directory_uri() . '/inc/images/service-view-style2.png',
				'stylethree'		=> get_template_directory_uri() . '/inc/images/service-view-style3.png',
			),
			'default'      	=> 'styleone',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'fablio'), $service_title_singular, $service_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'services_cat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'fablio'),
			'options'  => array(
				'two'     => esc_attr__('Two column', 'fablio'),
				'three'   => esc_attr__('Three column', 'fablio'),
				'four'    => esc_attr__('Four column', 'fablio'),
				'five'    => esc_attr__('Five column', 'fablio'),
				'six'     => esc_attr__('Six column', 'fablio'),
			),
			'default'      	=> 'two',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'fablio'), $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'services_cat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'fablio' ), $service_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'fablio'), $service_title_singular, $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'service_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"MORE DETAILS" Link Text', 'fablio'),
			'default' 		=> esc_attr__('More Details', 'fablio'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Text for the More Details link on the Servicebox', 'fablio').'</div>',
		),
	)
);



// Creating Client Groups array 
$client_groups = array();
if( isset($fablio_theme_options['client_groups']) && is_array($fablio_theme_options['client_groups']) ){

foreach( $fablio_theme_options['client_groups'] as $key => $val ){

	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}

}




// Error 404 Page Settings
$tm_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_attr__('Error 404 Page Settings', 'fablio'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Error 404 Page Settings', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Settings that determine how the error page will be looking', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'error404_big_iconcode',
			'type'    		=> 'textarea',
			'title'   		=> esc_attr__('Big icon', 'boldman'),
			'default' 		=> esc_attr__('<i class="fa fa-thumbs-o-down"></i>', 'boldman'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This icon that appear in top with big size', 'boldman').'</div>',
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Big heading text', 'fablio'),
			'default' 		=> esc_attr__('404 Error', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This text will be shown with big font size below icon', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Description text', 'fablio'),
			'default' 		=> esc_attr__('This page may have been moved or deleted. Be sure to check your spelling.', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This file may have been moved or deleted. Be sure to check your spelling', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Form', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "YES" to show search form on the 404 page', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'error404_page_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Content area background for 404 page only', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for 404 page content area only.', 'fablio').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'right bottom',
				'size'			=> 'cover',
				'color'			=> '#f8f8f8',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),	
		
	)
);


// Search Page Settings
$tm_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_attr__('Search Page Settings', 'fablio'),
	'icon'   => 'fa fa-search',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Search Page Settings', 'fablio'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Content of the search page if no results found', 'fablio'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted"><br>'. esc_attr__('Specify the content of the page that will be displayed if while search no results found', 'fablio') . '<br> ' . esc_attr__('HTML tags and shortcodes are allowed', 'fablio').'</div>',
			'default'  		 => themetechmount_wp_kses( urldecode('%3Ch3%3ENothing+found%3C%2Fh3%3E%3Cp%3ESorry%2C+but+nothing+matched+your+search+terms.+Please+try+again+with+some+different+keywords.%3C%2Fp%3E') ),
        ),
		
	)
);


// Sidebar Settings
$tm_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_attr__('Sidebar Settings', 'fablio'),
	'icon'   => 'fa fa-pause',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Settings', 'fablio'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_attr__('Custom Sidebars', 'fablio'),
			'info'            => esc_attr__('Specify the custom sidebars that can be used in the pages for a widgets', 'fablio'),
			'button_title'    => esc_attr__('Add New Sidebar', 'fablio'),
			'accordion_title' => esc_attr__('Custom Sidebar Properties', 'fablio'),
			'fields'          => array(
					array(
						'id'     		=> 'custom_sidebar',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Custom Sidebar Name', 'fablio'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write custom sidebar name here', 'fablio').'</div>',
					),

			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Position', 'fablio'),
			'after'  		=> '<small>'.esc_attr__('Select sidebar position for different sections', 'fablio').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Blog Post/Category Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Standard Pages Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for standard pages', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Group Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'fablio'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'fablio'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'fablio'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'fablio'), $pf_cat_title_singular ) . '</div>',
        ),
				array(
			'id'           	=> 'sidebar_service',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'fablio'), $service_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'fablio'), $service_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_service_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'fablio'), $service_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'fablio'), $service_cat_title_singular ) . '</div>',
        ),
		
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Search Page Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for search page', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('WooCommerce Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for WooCommerce Shop', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_singlepage_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('WooCommerce Single Product page', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for Single Product page', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_bbpress',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('BBPress Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for BBPress pages', 'fablio').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_events',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Events Sidebar', 'fablio'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for Events pages.', 'fablio') . ' ' . sprintf( esc_attr__('This is valid for %s plugin only','fablio') , '<a href="'. esc_url('https://wordpress.org/plugins/the-events-calendar/') .'" target="_blank">' . esc_attr__('The Events Calendar', 'fablio').'</a>' ).'</div>',
        ),
	)
);


// Getting social list
$global_social_list = themetechmount_shared_social_list();
	
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);

// Social Links
$tm_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_attr__('Social Links', 'fablio'),
	'icon'   => 'fa fa-share-square-o',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Social Links', 'fablio'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[tm-social-links]%2$s shortcode to show social links.', 'fablio'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_attr__('Social Links', 'fablio'),
			'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'fablio'),
			'button_title'    => esc_attr__('Add New Social Service', 'fablio'),
			'accordion_title' => esc_attr__('Social Service Properties', 'fablio'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_attr__('Social Service', 'fablio'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Social icon from here', 'fablio').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Link to Social icon selected above', 'fablio'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Paste URL only', 'fablio').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),

			),
			'default' => array (
				
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
				
			),
        ),
		
		
		
	),	
);

// WooCommerce Settings
$tm_framework_options[] = array(
	'name'   => 'woocommerce_settings', // like ID
	'title'  => esc_attr__('WooCommerce Settings', 'fablio'),
	'icon'   => 'fa fa-shopping-cart',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('WooCommerce Settings', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'wc-header-icon',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Cart Icon in Header', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'fablio') . ' <br><br> ' . '<strong>' . esc_attr__('NOTE:','fablio') . '</strong> ' . esc_attr__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('WooCommerce Product List Column', 'fablio'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'fablio'),
								'2' => esc_attr__('Two Columns', 'fablio'),
								'3' => esc_attr__('Three Columns', 'fablio'),
								'4' => esc_attr__('Four Columns', 'fablio'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list view', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-product-per-page',
			'type'   		=> 'number',
			'title'         => esc_attr__('Products Per Page', 'fablio' ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many product you want to show on SHOP page', 'fablio').'</div>',
        ),
		array(
			'id'       => 'show-hot-label',
			'type'     => 'switcher',
			'title'    => esc_attr__( 'Show Hot Label ', 'fablio' ),
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show hot label on product box', 'fablio').'</div>',
			'default'  => true,
		),
		array(
			'id'       		=> 'hot-label-text',
			'type'     		=> 'text',
			'title'    		=> esc_attr__( 'Hot Label Text', 'fablio' ),
			'default'  		=> esc_attr__( 'Hot', 'fablio' ),
			'dependency' 	=> array( 'show-hot-label', '==', true ),	
		),
		array(
			'id'      => 'show-sale-label',
			'type'    => 'switcher',
			'title'   => esc_attr__( 'Show Sale Label', 'fablio' ),
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show sale label on product box', 'fablio').'</div>',
			'default' => true,
		),
		array(
			'id'       => 'product_sale_lebtype',
			'type'     => 'select',
			'title'    =>  esc_attr__('Select Sale label type', 'fablio'),
			'options'  => array(
							'text'  	   => esc_attr__('Text', 'fablio'),
							'percentage'   => esc_attr__('Percentage', 'fablio'),
						),
			'default'  => 'text',
			'dependency' => array( 'show-sale-label', '==', true ),	
		),
		array(
			'id'       => 'sale-label-text',
			'type'     => 'text',
			'title'    => esc_attr__( 'Sale Text', 'fablio' ),
			'default'  => esc_attr__( 'Sale', 'fablio' ),
			'dependency'  	 => array( 'product_sale_lebtype|show-sale-label', '==|==', 'text|true' ),//Multiple dependency			
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Single Product Page Settings', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Options for Single product page', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'wc-single-show-related',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Related Products', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "ON" to show Related Products below the product description on single page', 'fablio').'</div>',
        ),
		array(
			'id'     		=> 'wc-single-related-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('Column for Related Products', 'fablio'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'fablio'),
								'2' => esc_attr__('Two Columns', 'fablio'),
								'3' => esc_attr__('Three Columns', 'fablio'),
								'4' => esc_attr__('Four Columns', 'fablio'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list of related products', 'fablio').'</div>',
			'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'wc-single-related-count',
			'type'   		=> 'number',
			'title'         => esc_attr__('Related Products Show', 'fablio' ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many products you want to show in the Related prodcuts area on single product page', 'fablio').'</div>',
			'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
        ),
	)
);


// Under Construction
$tm_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_attr__('Under Construction', 'fablio'),
	'icon'   => 'fa fa-send',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Under Construction', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Under Construciton Message', 'fablio'),
			'default' 		=> false,
			'label'  		=> esc_attr__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'fablio'). '<br>' . esc_attr__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'fablio'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Title for Under Construction page', 'fablio'),
			'default'  		=> esc_attr__('This site is Under Construction', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write TITLE for the Under Construction page', 'fablio').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Page Content', 'fablio'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => themetechmount_wp_kses( urldecode('%3Cdiv+class%3D%22un-main-page-content%22%3E%0D%0A%3Cdiv+class%3D%22un-page-content%22%3E%0D%0A%3Cdiv%3E%5Btm-logo%5D%3C%2Fdiv%3E%0D%0A%3Cdiv+class%3D%22sepline%22%3E%3C%2Fdiv%3E%0D%0A%3Ch1+class%3D%22heading%22%3EUNDER+CONSTRUCTION%3C%2Fh1%3E%0D%0A%3Ch4+class%3D%22subheading%22%3ESomething+awesome+this+way+comes.+Stay+tuned%21%3C%2Fh4%3E%0D%0A%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E') ),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your HTML code for Under Construction page body content', 'fablio').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Background Properties', 'fablio' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background options. This is for main body background', 'fablio').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#f8f8f8',
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Under Construction page', 'fablio'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'fablio').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => urldecode('%40import+url%28%22https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DOpen%2BSans%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%22%29%3B%0D%0Abody%7B%0D%0Apadding%3A+0%3B%0D%0Amargin%3A+0%3B%0D%0A%7D+%0D%0A.heading%2C+.subheading%7B+%0D%0Afont-family%3A+%22%22Open+Sans%22%2C+Arial%2C+Helvetica%2C+sans-serif%3B%0D%0A%7D+%0D%0A.heading%7B%0D%0Afont-size%3A+60px%3B%0D%0Aline-height%3A+65px%3B+%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Amargin-bottom%3A%0D%0A0px%3B+margin-bottom%3A+18px%3B%0D%0Afont-weight%3A+600%3B%0D%0Aletter-spacing%3A+2px%3B%0D%0Acolor%3A+%23283d58%3B%0D%0A+%7D+%0D%0A.subheading%7B%0D%0Afont-size%3A+23px%3B%0D%0Aline-height%3A+30px%3B%0D%0Acolor%3A+%23828c96%3B%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Afont-weight%3A+normal%3B%0D%0A%7D+%0D%0A.un-main-page-content%7B+%0D%0Aposition%3A+absolute%3B%0D%0Aleft%3A+50%25%3B%0D%0Atop%3A+45%25%3B%0D%0A-khtml-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-moz-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B+%0D%0A-ms-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-o-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0Atransform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A+%7D%0D%0A.tm-sc-logo%7B+%0D%0Amargin-bottom%3A+40px%3B%0D%0Adisplay%3A+inline-block%3B%0D%0A%7D'),
        ),
		
		
	)
);

// Login Page Settings
$tm_framework_options[] = array(
	'name'   => 'login_page_settings', // like ID
	'title'  => esc_attr__('Login Page Settings', 'fablio'),
	'icon'   => 'fa fa-lock',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Login Page Settings', 'fablio'),
		),
		array(
			'id'      		=> 'login_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Background Properties', 'fablio' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of background object', 'fablio').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'right bottom',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#f8f8f8',
			),
			'output'   		=> '.loginpage',
        ),
	)
);


// Seperator
$tm_framework_options[] = array(
	'name'   => 'tm_seperator_1',
	'title'  => esc_attr__('Advanced', 'fablio'),
	'icon'   => 'fa fa-ellipsis-h'
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;



// Advanced Settings
$tm_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_attr__('Advanced Settings', 'fablio'),
	'icon'   => 'fa fa-wrench',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Portfolio) Settings', 'fablio'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Portfolio custom post type', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio) Post Type', 'fablio'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Portfolio) Post Type', 'fablio'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section. Only for singular title.', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio) Post Type', 'fablio'), $pf_title_singular ),
			'default'  		=> esc_attr('portfolio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio post type section', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio Category) List', 'fablio'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Categories', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Portfolio Category) List', 'fablio'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Category', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio Category) Link', 'fablio'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('portfolio-category', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio Category link', 'fablio').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Service) Settings', 'fablio'), $service_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Service custom post type', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'service_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service) Post Type', 'fablio'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Service post type section', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'service_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Service) Post Type', 'fablio'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Service post type section. Only for singular title.', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'service_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service) Post Type', 'fablio'), $service_title_singular ),
			'default'  		=> esc_attr('service'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Service post type section', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service Category) List', 'fablio'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Categories', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Service Category) List', 'fablio'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Category', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'service_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service Category) Link', 'fablio'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('service-category', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Service Category link', 'fablio').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Team member) Settings', 'fablio'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Team Member custom post type', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Member) Post Type', 'fablio'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Members', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Team Member) Post Type', 'fablio'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Member', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section. Only for singular title.', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Member) Post Type', 'fablio'), $team_member_title_singular ),
			'default'  		=> esc_attr__('team-member', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Member post type section', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Group) List', 'fablio'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Groups', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Team Group) List', 'fablio'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Group', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'fablio').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Group) Link', 'fablio'), $team_group_title_singular ),
			'default'  		=> esc_attr__('team-group', 'fablio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Group link', 'fablio').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Minify Options', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Options to minify HTML/JS/CSS files', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Minify JS and CSS files', 'fablio'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'fablio').'</div>',
        ),
		
		// Thumb Image Size Options
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Box Image Size Options', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Set Image size for Portfolio, Team Member and Blog boxes.', 'fablio').'</small>',
		),
		array(
			'id'     	=> 'img-size-blog',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size', 'fablio' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'fablio' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'fablio') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'fablio') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'fablio') . '</a></p>',
			'default' 	=> array(
				'width'		=> '1200',
				'height'	=> '800',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-left',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Left Image and Right Content Only)', 'fablio' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'fablio' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'fablio') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'fablio') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'fablio') . '</a></p>',
			'default' 	=> array(
				'width'		=> '520',
				'height'	=> '300',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-top',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Top Image Bottom Content Content Only)', 'fablio' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'fablio' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'fablio') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'fablio') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'fablio') . '</a></p>',
			'default' 	=> array(
				'width'		=> '600',
				'height'	=> '430',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-portfolio',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Portfolio) Box - Thumb image size', 'fablio' ), $pf_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'fablio' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'fablio') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'fablio') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'fablio') . '</a></p>',
			'default' 	=> array(
				'width'		=> '600',
				'height'	=> '700',
				'crop'		=> 'yes',
			),
        ),
		array(
			'id'     	=> 'img-size-team-member',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Team Member) Box - Thumb image size', 'fablio' ), $team_member_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'fablio' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'fablio') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'fablio') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'fablio') . '</a></p>',
			'default' 	=> array(
				'width'		=> '450',
				'height'	=> '500',
				'crop'		=> 'yes',
			),
        ),
		
		/* Icon library selector - Only selected libraries will be loaded in VC element */
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Enabled Icon Library', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Select icon library that you like to load in Visual Composer elements like "ThemetechMount Icon", "ThemetechMount Call to Action", "ThemetechMount Service Box" etc.', 'fablio').'</small>',
		),
		array(
			'id'        => 'icon_library',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select icon library to load', 'fablio'),
			'options'   => array(
					'linecons'       => esc_attr__( 'Linecons', 'fablio' ),
					'themify'        => esc_attr__( 'Themify icons', 'fablio' ),
					'kw_fablio'        => esc_attr__( 'Fablio icons', 'fablio' ),
			),
			'default'   => array( 'linecons', 'themify', 'kw_fablio' ),
			'after'    	=> '<small>'.esc_attr__('Select icon library that you want to load. This will reduce load time of Visual Composer elements. But you can see only selected libraries in the icon dropdown.', 'fablio').'</small>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Show or hide Demo Content Setup option', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'fablio').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Hide "Demo Content Setup" option', 'fablio'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'fablio').'</div>',
        ),
		
		
	)
);


// Custom Code
$tm_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_attr__('Custom Code', 'fablio'),
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array( // begin: fields
		
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Add custom JS and CSS code', 'fablio').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code', 'fablio'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'fablio').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('JS Code', 'fablio'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('Paste your JS code here', 'fablio').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom HTML Code', 'fablio'),
			'after'  		=> '<small>'. sprintf(__('Custom HTML Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'fablio'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code for &lt;head&gt; tag', 'fablio'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'default'  		=> '<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">',
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'fablio').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code after &lt;body&gt; tag', 'fablio'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear after &lt;body&gt; tag. You can add your custom tracking code here', 'fablio').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code before &lt;/body&gt; tag', 'fablio'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'fablio').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code for Login page', 'fablio'),
			'after'  		=> '<small>'. esc_attr__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'fablio').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Login Page', 'fablio'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'fablio').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Advanced Custom CSS Code Option', 'fablio'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code (at top of the file)', 'fablio'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'fablio').'</div>',
        ),
		
		
	)
);


// Backup
$tm_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_attr__('Backup / Restore', 'fablio'),
	'icon'     => 'fa fa-shield',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_attr__('You can save your current options. Download a Backup and Import', 'fablio'),
		),
		array(
			'type'    => 'backup',
		),
	)
);
