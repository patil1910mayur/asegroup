<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *  Meta Boxes
 */
$tm_metabox_options = array();


/************************* Common Meta Boxes *****************************/



// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_attr__('No Slider', 'fablio');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_attr__('Slider Revolution', 'fablio'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_attr__('Layer Slider', 'fablio'); }
$slider_list_array['custom']   = esc_attr__('Custom Slider', 'fablio');

$tm_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_attr__('Select Slider Type', 'fablio'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('Select slider which you want to show on this page. The slider will appear in header area.', 'fablio').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$tm_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'fablio'),
	'after'    	 => ( themetechmount_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="tm-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Slider Revolution section.', 'fablio') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_attr__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'fablio') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Revolution Slider. The slider will appear in header area.', 'fablio').'</div>',
	'options' 	 => themetechmount_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$tm_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'fablio'),
	'after'    	 => ( themetechmount_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="tm-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Layer Slider section.', 'fablio') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_attr__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'fablio') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Layer Slider. The slider will appear in header area.', 'fablio').'</div>',
	'options' 	 => themetechmount_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$tm_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_attr__('Custom Slider code', 'fablio'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_attr__('You can paste custom slider shortcode or HTML code here. The output code will appear in header area.', 'fablio').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$tm_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_attr__('Boxed or Wide Slider', 'fablio'),
	'info'       => esc_attr__('Select slider width.', 'fablio'),
	'options'    => array(
		'wide'      => esc_attr__('Wide Slider', 'fablio'),
		'boxed'     => esc_attr__('Boxed Slider', 'fablio'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);
$tm_metabox_slider_area[] = array(
	'id'        => 'slider_sociallinks',
	'type'      => 'checkbox',
	'title'     => esc_attr__('Show Social Links in Slider', 'fablio'),
	'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('This option worked only for Classic 2 Header', 'fablio').'</div>',
	'label'		=>  esc_attr__( 'YES, Show Social Links in Slider', 'fablio' ),
	'after'   	=> '<div class="cs-text-muted">'.esc_attr__('If you want to show social links inside slider then check this option', 'fablio').'</div>',
);
$tm_metabox_slider_area[] = array(
	'id'		   		=> 'social_linktitle',
	'type'     			=> 'text',
	'title'    		 	=>  esc_attr__('Social link title', 'fablio'),
	'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill Sociallinks title', 'fablio').'</div>',
	'dependency'        => array( 'slider_sociallinks', '!=', false ),//Multiple dependency
);





// Background metabox options array
$tm_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_attr__('Custom Background', 'fablio'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'fablio').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'themetechmount_background',
		'title'		 => esc_attr__('Body Background Properties', 'fablio'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'fablio').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
	array(
		'id'		 => 'custom_inner_background',
		'type'		 => 'themetechmount_background',
		'title'		 => esc_attr__('Content Area Background Properties', 'fablio'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for content area', 'fablio').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);






// Topbar metabox options array
$tm_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_attr__('Show Topbar', 'fablio'),
		'info'    => esc_attr__('For this page only.', 'fablio'),
		'options' => array(
			''      => esc_attr__('Global', 'fablio'),
			'yes'   => esc_attr__('Yes, show Topbar', 'fablio'),
			'no'    => esc_attr__('No, hide Topbar', 'fablio'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_attr__('Background Color', 'fablio'),
		'info'   	 => esc_attr__('Please select color for background', 'fablio'),
		'options' 	 => array(
			''           => esc_attr__('Global', 'fablio'),
			'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
			'grey'       => esc_attr__('Grey', 'fablio'),
			'white'      => esc_attr__('White', 'fablio'),
			'skincolor'  => esc_attr__('Skincolor', 'fablio'),
			'custom'     => esc_attr__('Custom Color', 'fablio'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_attr__('Select Background Color', 'fablio'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_attr__('Text Color', 'fablio'),
		'info'		 => esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option.', 'fablio'),
		'options'	 => array(
			''          => esc_attr__('Global', 'fablio'),
			'white'     => esc_attr__('White', 'fablio'),
			'dark'      => esc_attr__('Dark', 'fablio'),
			'skincolor' => esc_attr__('Skin Color', 'fablio'),
			'custom'    => esc_attr__('Custom color', 'fablio'),
		),
		'default' 	 => esc_attr__('Global', 'fablio'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_attr__('Custom Text Color', 'fablio' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Please select custom color for text', 'fablio').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_attr__('Topbar Left Content (overwrite default text)', 'fablio'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for left area. This will overwrite default text set in Theme Options', 'fablio').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_attr__('Topbar Right Content (overwrite default text)', 'fablio'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for right area. This will overwrite default text set in Theme Options', 'fablio').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);





// Titlebar metabox options array
$tm_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar', 'fablio'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'fablio' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'fablio').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Title', 'fablio'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'fablio').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Subtitle', 'fablio'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill page subtitle', 'fablio').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Background Options', 'fablio'),
		'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'fablio').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_attr__('Titlebar Background Options', 'fablio'),
		'options'	 => array(
			''       	=> esc_attr__('Use global settings', 'fablio'),
			'custom' 	=> esc_attr__('Set custom settings', 'fablio'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'fablio').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Background Color', 'fablio'),
		'options'  => array(
			''           => esc_attr__('Global', 'fablio'),
			'darkgrey'   => esc_attr__('Dark grey', 'fablio'),
			'grey'       => esc_attr__('Grey', 'fablio'),
			'white'      => esc_attr__('White', 'fablio'),
			'skincolor'  => esc_attr__('Skincolor', 'fablio'),
			'custom'     => esc_attr__('Custom Color', 'fablio'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'fablio').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'themetechmount_background',
		'title'  		=> esc_attr__('Titlebar Background Properties', 'fablio' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'fablio').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Font Settings', 'fablio'),
		'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'fablio').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Font Options', 'fablio'),
		'options'  => array(
						''       => esc_attr__('Use global settings', 'fablio'),
						'custom' => esc_attr__('Set custom settings', 'fablio'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Ude global settings" to load global font settings.', 'fablio').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
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
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option', 'fablio').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'fablio').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'fablio').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'fablio').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Content Options', 'fablio'),
		'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'fablio').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_attr__('Titlebar Text Align', 'fablio'),
		'options'       	=> array (
						''         => esc_attr__('Global', 'fablio'),
						'default'  => esc_attr__('All Center', 'fablio'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'fablio'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 	'fablio'),
						'allleft'  => esc_attr__('All Left', 'fablio'),
						'allright' => esc_attr__('All Right', 'fablio'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_attr__('Select text align in Titlebar', 'fablio').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_attr__( 'Titlebar Height', 'fablio' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set height of the Titlebar. In pixel only', 'fablio').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_attr__('Hide Breadcrumb', 'fablio'),
		'options'  => array(
						''     => esc_attr__('Global', 'fablio'),
						'no'   => esc_attr__('NO, show the breadcrumb', 'fablio'),
						'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'fablio'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'fablio').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	
	
);


// Other Options
$tm_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_attr__('Skin Color', 'fablio' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'fablio').'<br><br> <strong>' . esc_attr__( 'NOTE: ' ,'fablio') . '</strong> ' . esc_attr__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'fablio') . '</div>',
	),
);









/**** Metabox options - Sidebar ****/

// Getting custom sidebars 
$all_sidebars = themetechmount_get_all_registered_sidebars();



$tm_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_attr__('Select Sidebar Position', 'fablio'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/inc/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/inc/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/inc/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/inc/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/inc/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/inc/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/inc/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Left Sidebar', 'fablio'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Right Sidebar', 'fablio'),
		'options' => $all_sidebars,
		'default' => '',
	),
);



// Getting name of CPT from Theme Options
$fablio_theme_options		  = get_option('fablio_theme_options');
$pf_type_title_singular   = ( !empty($fablio_theme_options['pf_type_title_singular']) ) ? $fablio_theme_options['pf_type_title_singular'] : 'Portfolio' ;
$service_type_title_singular   = ( !empty($fablio_theme_options['service_type_title_singular']) ) ? $fablio_theme_options['service_type_title_singular'] : 'Service' ;
$team_type_title_singular = ( !empty($fablio_theme_options['team_type_title_singular']) ) ? $fablio_theme_options['team_type_title_singular'] : 'Team Member' ;


// CPT list
$tm_cpt_list = array(
	'page'           => esc_attr__('Page', 'fablio'),
	'post'           => esc_attr__('Post', 'fablio'),
	'tm_portfolio'   => esc_attr($pf_type_title_singular),
	'tm_service'   => esc_attr($service_type_title_singular),
	'tm_team_member' => esc_attr($team_type_title_singular),
	'tm_testimonial' => esc_attr__('Testimonials', 'fablio'),
);

// Foreach loop
foreach( $tm_cpt_list as $cpt_id=>$cpt_name ){
	
	$tm_metabox_options[] = array(
		'id'        => '_themetechmount_metabox_group',
		'title'     => sprintf( esc_attr__('Fablio - %s Single view Elements Options', 'fablio'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
		
		
			array(
				'name'   => '_themetechmount_slider_area_options',
				'title'  => esc_attr__('Header Slider Options', 'fablio'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $tm_metabox_slider_area,
			),
			
			
			array(
				'name'   => '_themetechmount_background_options',
				'title'  => esc_attr__(' Background Options', 'fablio'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $tm_metabox_background,
			),
			
			
			array(
				'name'   => '_themetechmount_page_topbar_options',
				'title'  => esc_attr__('Topbar Options', 'fablio'),
				'icon'   => 'fa fa-tasks',
				'fields' => $tm_metabox_topbar,
			),
			
			
			
			array(
				'name'   => '_themetechmount_titlebar_options',
				'title'  => esc_attr__('Titlebar Options', 'fablio'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $tm_metabox_titlebar,
			),
			
			
			array(
				'name'   => '_themetechmount_page_customize',
				'title'  => esc_attr__('Other Options', 'fablio'),
				'icon'   => 'fa fa-cog',
				'fields' => $tm_other_options,
			),
			
			
		),
	);
	
	
	
	/**
	 *  CPT - Sidebar
	 */
	$tm_metabox_options[]    = array(
		'id'        => '_themetechmount_metabox_sidebar',
		'title'     => esc_attr__('Fablio - Sidebar Options', 'fablio'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'tm_sidebar_options',
				'fields' => $tm_metabox_sidebar,
			),
		),
	);
	
	$tm_metabox_options[]    = array(
		'id'        => 'themetechmount_page_row_settings',
		'title'     => esc_attr__('Fablio - Content ROW settings', 'fablio'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'tm_content_row_settings',
				'fields' => array(
					array(
						'id'      => 'row_lower_padding',
						'title'   => esc_attr__('Lower ROW Spacing', 'fablio'),
						'type'    => 'switcher',
						'default' => false,
						'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'fablio').'</div>',
					)
				)
			)
		)
	);
	
	
	
	
	
} // foreach




/* Blog Post Format - Gallery meta box */
$tm_metabox_options[] = array(
	'id'        => '_themetechmount_metabox_gallery',
	'title'     => esc_attr__('Fablio - Gallery Images', 'fablio'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themetechmount_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					'type'        => 'gallery',
					'title'       => esc_attr__('Slider Images', 'fablio'),
					'add_title'   => esc_attr__('Add Images', 'fablio'),
					'edit_title'  => esc_attr__('Edit Gallery', 'fablio'),
					'clear_title' => esc_attr__('Remove Gallery', 'fablio'),
					'after'       => '<br><div class="cs-text-muted">'.esc_attr__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'fablio').'</div>',
				),
			)
		)
	),
);
