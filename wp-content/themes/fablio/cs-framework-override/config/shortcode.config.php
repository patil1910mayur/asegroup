<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => 'ThemetechMount Special Shortcodes',
  'shortcodes' => array(
	
	//Site Tagline
	array(
		'name'      => 'tm-site-tagline',
		'title'     => esc_attr__('Site Tagline', 'fablio'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'fablio'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'tm-site-title',
		'title'     => esc_attr__('Site Title', 'fablio'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'fablio'),
			),

      ),
    ),
	// Site URL
	array(
		'name'      => 'tm-site-url',
		'title'     => esc_attr__('Site URL', 'fablio'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'fablio'),
			),

      ),
    ),
	// Site LOGO
	array(
		'name'      => 'tm-logo',
		'title'     => esc_attr__('Site Logo', 'fablio'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'fablio'),
			),

      ),
    ),
	// Current Year
	array(
		'name'      => 'tm-current-year',
		'title'     => esc_attr__('Current Year', 'fablio'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'fablio'),
			),

      ),
    ),
	// Footer Menu
	array(
		'name'      => 'tm-footermenu',
		'title'     => esc_attr__('Footer Menu', 'fablio'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'fablio'),
			),

      ),
    ),
	// Skin Color
	array(
		'name'      => 'tm-skincolor',
		'title'     => esc_attr__('Skin Color', 'fablio'),
		'fields'    => array(

			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This shortcode will show the Text in Skin Color', 'fablio'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_attr__('Skin Color Text', 'fablio'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_attr__('The content is this box will be shown in Skin Color', 'fablio').'</div>', 
			),

      ),
    ),
	// Dropcaps
	array(
		'name'      => 'tm-dropcap',
		'title'     => esc_attr__('Dropcap', 'fablio'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This will show text in dropcap style.', 'fablio'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_attr__('Style', 'fablio'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/inc/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/inc/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/inc/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/inc/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Background Color', 'fablio'),
				'options'    	=> array(
									'white' 	    => esc_attr__('White', 'fablio'),
									'skincolor'     => esc_attr__('Skin Color', 'fablio'),
									'grey' 			=> esc_attr__('Grey', 'fablio'),
									'dark' 		    => esc_attr__('Dark', 'fablio'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Color', 'fablio'),
				'options'    	=> array(
									'skincolor'     => esc_attr__('Skin Color', 'fablio'),
									'white' 	    => esc_attr__('White', 'fablio'),
									'grey' 			=> esc_attr__('Grey', 'fablio'),
									'dark' 		    => esc_attr__('Dark', 'fablio'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_attr__('Text', 'fablio'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_attr__('The Letter in this box will be shown Dropcapped', 'fablio').'</div>', 
			),

      ),
    ),
	
	
 
  ),
);



CSFramework_Shortcode_Manager::instance( $options );
