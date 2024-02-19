<?php

/**
 * Add group in Elementor editor
 */
if( !function_exists('tm_elements_manager') ){
function tm_elements_manager() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'fablio_category',
		[
			'title' => esc_attr__( 'Fablio Special Elements', 'fablio' ),
			'icon' => 'fa fa-plug',
		],
		1 // tab position
	);
}
}
add_action( 'elementor/init', 'tm_elements_manager' );

define( 'FABLIO_ICON_URL',  get_template_directory( __FILE__ )  ); 

/**
 * Adding custom theme icons
 */
 
if( !function_exists('tm_elementor_add_custom_icons_tab') ){
function tm_elementor_add_custom_icons_tab( $icons_tabs = array() ) {

	if( defined('FABLIO_ICON_URL') ){

		$tm_fablio_icons_array = array(
			'textile',
			'textiles',
			'water-resistant',
			'moisture-wicking-fabric',
			'fabric',
			'textiles-1',
			'knitting',
			'flameproof-fabric',
			'fabric-1',
			'rug',
			'fabric-2',
			'textile-1',
			'silk',
			'textile-2',
			'iron',
			'print',
			'silk-1',
			'wool',
			'yarn',
			'knitting-1',
			'wool-1',
			'yarn-1',
			'needlework',
			'suit',
			'sewing',
			'dressmaker',
			'phone-call',
			'play',
			'placeholder',
			'email',
			'email-1',
			'botton',
			'coat',
			'jacket',
			'jeans',
			'tshirt',
			't-shirt',
			'socks',
			'sewing-machine',
			'measuring-tape',
			'tshirt-1',
			'vest',
			'factory',
			'warehouse',
			'warehouse-1',
			'telephone',
			'telephone-1',
			'clock',
			'email-2',
			'shipped',
			'delivery-truck',
			'wallet',
			'returning',
			'chat',
			
		);
		
		$icons_tabs['kw_fablio'] = array(
			'name'          => 'kw_fablio',
			'label'         => esc_html__( 'Fablio Special Icons', 'fablio' ),
			'labelIcon'     => 'kw_fablio flaticon-workspace',
			'prefix'        => 'flaticon-',
			'displayPrefix' => 'kw_fablio',
			'url'           => wp_enqueue_style( 'themetechmount-fablio-extra-icons', get_template_directory_uri() . '/assets/themetechmount-fablio-extra-icons/font/flaticon.css' ),
			'icons'         => $tm_fablio_icons_array,
			'ver'           => '1.0.0',
		);
		
	}
	
	
	return $icons_tabs;
}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'tm_elementor_add_custom_icons_tab' );


/**
 *  Add preview js for Elementor
 */
function tm_elementor_preview_scripts(){
	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script(  'fablio-elementor-preview', get_template_directory_uri() . '/inc/elementor-preview.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'tm_elementor_preview_scripts' );

function tm_elementor_enqueue_base_scripts(){
	wp_enqueue_script(  'fablio-functions', get_template_directory_uri() . '/js/functions.js' );
	wp_enqueue_script(  'fablio-elementor-main', get_template_directory_uri() . '/inc/elementor-main.js' );
}
add_action('elementor/editor/before_enqueue_scripts', 'tm_elementor_enqueue_base_scripts');


/**
 * Creating element widgets now*/
 
add_action( 'elementor/widgets/widgets_registered', 'tm_elementor_register_widgets',1,1 );
function tm_elementor_register_widgets() {

    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {

        require_once( get_template_directory() . '/inc/elementor/heading-subheading.php' );
		require_once( get_template_directory() . '/inc/elementor/icon-heading.php' );
		require_once( get_template_directory() . '/inc/elementor/fid.php' );
		require_once( get_template_directory() . '/inc/elementor/tm-testimonial.php' );
		require_once( get_template_directory() . '/inc/elementor/tm-blog.php' );
		require_once( get_template_directory() . '/inc/elementor/tm-team.php' );
		require_once( get_template_directory() . '/inc/elementor/tm-client.php' );
		require_once( get_template_directory() . '/inc/elementor/tm-portfolio.php' );
		require_once( get_template_directory() . '/inc/elementor/pricing-table.php' );
		require_once( get_template_directory() . '/inc/elementor/static-box.php' );
		require_once( get_template_directory() . '/inc/elementor/imagebox.php' );
		require_once( get_template_directory() . '/inc/elementor/tm-service.php' );
		if( class_exists('Tribe__Events__Main') ){
			require_once( get_template_directory() . '/inc/elementor/tm-events.php' );
		}
    }
}

if( !function_exists('tm_link_render') ){
function tm_link_render( $value=array(), $type='start' ) {
	if( !empty($value) && is_array($value) && !empty($value['url']) ){
		if( $type=='start' ){
			$target		= $value['is_external'] ? ' target="_blank"' : '';
			$nofollow	= $value['nofollow'] ? ' rel="nofollow"' : '';
			return themetechmount_wp_kses( '<a href="' . $value['url'] . '"' . $target . $nofollow . '><span>' ); 
		} else {
			return themetechmount_wp_kses( '</span></a>' ); 
		}
	}
}
}

/***Themetechmount Iconbox Element code***/

if( !function_exists('themetechmount_iconbox_ele') ){
function themetechmount_iconbox_ele( $settings, $echo=false ){
	$return = '';
	
	if( !empty($settings['icon_type']) ){

		switch( $settings['icon_type'] ){

			case 'icon':
				if( !empty($ttm_data['icon']['value']) ){
					$return = '<i class="'.esc_attr( $settings['icon']['value'] ).'"></i>';

				}
				break;

			case 'image':
				if( !empty($settings['icon_image']['url']) ){
					$return = '<img src="'.esc_attr( $settings['icon_image']['url'] ).'" />';
				}
			break;

			case 'text':
				if( !empty($settings['icon_text']) ){
					$return = '<div class="tm-iheading-icontext">'.esc_attr($settings['icon_text']).'</div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = themetechmount_wp_kses('<div class="tm-iheading-icon tm-iheading-icon-type-'.esc_attr($settings['icon_type']).'">'.$return.'</div>');
	}

	if( $echo == true ){
		echo themetechmount_wp_kses($return);
	} else {
		return themetechmount_wp_kses($return);
	}

}
}

/**
 *  Heading Sub Heading Element.
 */

if( !function_exists('tm_heading_subheading') ){
function tm_heading_subheading( $settings = array(), $echo = false ){

	// Reverse heading class
	$reverse_class = '';
	if( !empty($settings['reverse_heading']) && $settings['reverse_heading']=='yes' ){
		$reverse_class = 'tm-reverse-heading-yes';
	}
	
	// desc heading class
	$desc = '';
	if( !empty($settings['desc'] )){
		$desc = 'tm-content-with-desc';
	}
	
	$heading_style = '';
	
	$return = '<div class="tm-element-heading-content-wrapper ' . themetechmount_wp_kses($settings['text_align']) . '-align '.esc_attr($reverse_class).' tm-seperator-'. themetechmount_wp_kses($settings['heading_sep']) .' '.esc_attr($desc).' tm-heading-style-'. themetechmount_wp_kses($settings['heading_style']) .' ">';
	
	$heading = '';
	
	// icon
	$return .= themetechmount_iconbox_ele($settings);
	
	$return .= themetechmount_wp_kses('<div class="tm-content-header">');
	
	// Heading
	if( !empty($settings['heading']) ) {
		$heading_tag = ( !empty($settings['heading_tag']) ) ? $settings['heading_tag'] : 'h2' ;

		$heading .= '<'. themetechmount_wp_kses($heading_tag) . ' class="tm-element-content-heading tm-custom-heading ">
				'.themetechmount_wp_kses($settings['heading']).'
			</'. themetechmount_wp_kses($heading_tag) . '>
		';
	}

	// reverse before heading
	if( empty($settings['reverse_heading']) && !empty($heading) ){
		$return .= themetechmount_wp_kses($heading);
	}

	// subheading
	if( !empty($settings['subheading']) ) {
		$subheading_tag	= ( !empty($settings['subheading_tag']) ) ? $settings['subheading_tag'] : 'h4' ;
		$subheading		= '<'. themetechmount_wp_kses($subheading_tag) . ' class="tm-element-subheading tm-custom-heading ">
				'.themetechmount_wp_kses($settings['subheading']).'
			</'. themetechmount_wp_kses($subheading_tag) . '>
		';
		$return .= themetechmount_wp_kses($subheading);
	}

	// Heading after sub-title
	if( !empty($settings['reverse_heading']) && !empty($heading) ){
		$return .= themetechmount_wp_kses($heading);
	}

	$return .= themetechmount_wp_kses('<div class="heading-seperator"><span></span></div></div>');
	if( !empty($settings['desc']) ){
		$desc = '<div class="tm-element-content-desctxt">'.themetechmount_wp_kses($settings['desc']).'</div>';
		$return .= themetechmount_wp_kses($desc);
	}
	// closing div
	$return .= themetechmount_wp_kses('</div>');

	// final output
	if( $echo == true ){
		echo themetechmount_wp_kses($return);
	} else {
		return themetechmount_wp_kses($return);
	}

}
}

add_action('elementor/element/section/section_layout/before_section_start', 'tm_elementor_section_options', 10);
if( !function_exists('tm_elementor_section_options') ){
function tm_elementor_section_options( $element ){

	$element->start_controls_section(
		'tm_element_section_title',
		[
			'label' => __('Fablio Special Options', 'fablio'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
	
	$element->add_control(
		'tm_break_col',
		[
			'label'			=> esc_html__( 'Break Column in Ipad Screen', 'fablio' ),
			'description'	=> esc_html__( 'Pre-defined Break Column', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'no',
			'prefix_class'	=> 'tm-column-break-ipad-',
			'options' => [
				'no' 			=> __( 'No', 'fablio' ),
				'yes'		=> __( 'Yes', 'fablio' ),
			],
		]
	);

	$element->add_control(
		'tm-extended-column',
		[
			'label'			=> esc_attr__( 'Exapand Column Background', 'fablio' ),
			'description'	=> esc_attr__( 'Exapand Column BG to left or right. This will expand the Background image/color visibility to border of the browser border.', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'label_block'	=> true,
			'hide_in_inner' => true,
			'default'		=> 'none',
			'prefix_class'	=> 'tm-col-stretched-',
			'options'		=> [
				'none' 			=> __( 'No expand (default)', 'fablio' ),
				'left'		=> __( 'Exapand Column background to left', 'fablio' ),
				'right'		=> __( 'Exapand Column background to right', 'fablio' ),	
				'both'		=> __( 'Exapand Column background to both', 'fablio' ),				
			],
		]
	);


	$element->add_control(
		'tm-strech-content-left',
		[
			'label'			=> esc_attr__( 'Also stretch left content too?', 'fablio' ),
			'description'	=> esc_attr__( 'Also stretch left content too?', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'tm-left-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'fablio' ),
			'label_off'		=> esc_attr__( 'No', 'fablio' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'tm-extended-column' => array('left', 'both'),
			]
		]
	);
	$element->add_control(
		'tm-strech-content-right',
		[
			'label'			=> esc_attr__( 'Also stretch right content too?', 'fablio' ),
			'description'	=> esc_attr__( 'Also stretch right content too?', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'tm-right-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'fablio' ),
			'label_off'		=> esc_attr__( 'No', 'fablio' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'tm-extended-column' => array('right', 'both'),
			]
		]
	);
	
	
	$element->add_control(
		'tm-left-margin',
		[
			'label'			=> esc_html__( 'Left Content Area Margin', 'fablio' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'separator'		=> 'before',
			'selectors' => [
				'{{WRAPPER}} .tm-stretched-div.tm-stretched-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$element->add_control(
		'tm-right-margin',
		[
			'label'			=> esc_html__( 'Right Content Area Margin', 'fablio' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .tm-stretched-div.tm-stretched-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$element->add_control(
		'tm_bg_color',
		[
			'label'			=> esc_html__( 'Background Color', 'fablio' ),
			'description'	=> esc_html__( 'Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'separator'		=> 'before',
			'prefix_class'	=> 'tm-bgcolor-',
			"weight"      => 1,
			'options'		=> [
				'' 		=> esc_attr__( 'Transparent (From Design Options tab)', 'fablio' ),
				'darkgrey'		=> esc_attr__( 'Dark grey color as background color', 'fablio' ),
				'grey'			=> esc_attr__( 'Grey color as background color', 'fablio' ),
				'white'	        => esc_attr__( 'White color as background color', 'fablio' ),
				'skincolor'  	=> esc_attr__( 'Skincolor color as background color', 'fablio' ),				
			],
		]
	);

	$element->add_control(
		'tm_text_color',
		[
			'label'			=> esc_html__( 'Section Text Color', 'fablio' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Section (ROW)', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'tm-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'fablio' ),
				'white'		=> __( 'White Color', 'fablio' ),
				'dark'		=> __( 'Dark Color', 'fablio' ),
				'skincolor'	=> __( 'Skin Color', 'fablio' ),
			],
		]
	);

	$element->end_controls_section();
}
}


/**
 * Elementor column options
 */
add_action('elementor/element/column/layout/before_section_start', 'tm_elementor_column_options', 10);
if( !function_exists('tm_elementor_column_options') ){
function tm_elementor_column_options( $element ){

	$element->start_controls_section(
		'tm_element_section_title',
		[
			'label' => __('Fablio Special Options', 'fablio'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'tm_bg_color',
		[
			'label'			=> esc_html__( 'Column Background Color', 'fablio' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Column', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'tm-bgcolor-yes tm-col-bgcolor-',
			"weight"      => 1,
			'options'		=> [
				'' 			=> esc_attr__( 'Transparent (From Design Options tab)', 'fablio' ),
				'darkgrey'		=> esc_attr__( 'Dark grey color as background color', 'fablio' ),
				'grey'			=> esc_attr__( 'Grey color as background color', 'fablio' ),
				'white'	        => esc_attr__( 'White color as background color', 'fablio' ),
				'skincolor'  	=> esc_attr__( 'Skincolor color as background color', 'fablio' ),				
			],
		]
	);

	$element->add_control(
		'tm_text_color',
		[
			'label'			=> esc_html__( 'Column Text Color', 'fablio' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Column', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'tm-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'fablio' ),
				'white'		=> __( 'White Color', 'fablio' ),
				'dark'		=> __( 'Dark Color', 'fablio' ),
				'skincolor'	=> __( 'Skin Color', 'fablio' ),
			],
		]
	);

	$element->end_controls_section();
}
}



/**
 * Elementor button options
 */
add_action('elementor/element/button/section_button/before_section_start', 'tm_elementor_button_options', 10);
if( !function_exists('tm_elementor_button_options') ){
function tm_elementor_button_options( $element ){

	$element->start_controls_section(
		'tm_element_section_title',
		[
			'label' => __('Fablio Special Options', 'fablio'),
			'tab' => Elementor\Controls_Manager::TAB_CONTENT,
		]
	);
		
	$element->add_control(
		'btnstyle',
		[
			'label'			=> esc_html__( 'Button Design Style', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Style for Button', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'none',
			'label_block'	=> true,
			'prefix_class'	=> 'tm-btn-style-',
			'options' => [
				'none'		=> esc_attr__( 'Default', 'devfox' ),
				'one'			=> esc_attr__( 'Button Style 1', 'devfox' ),
				
				
			],
		]
	);	
		
		
		
	$element->add_control(
		'color',
		[
			'label'			=> esc_html__( 'Button Color', 'fablio' ),
			'description'	=> esc_html__( 'Pre-defined Color for Button', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'skincolor',
			'label_block'	=> true,
			'prefix_class'	=> 'tm-btn-color-',
			'options' => [
				'darkgrey'		=> esc_attr__( 'Dark Grey', 'fablio' ),
				'grey'			=> esc_attr__( 'Grey Color', 'fablio' ),
				'white'	        => esc_attr__( 'White Color', 'fablio' ),
				'skincolor'  	=> esc_attr__( 'Skin Color', 'fablio' ),
			],
		]
	);
	$element->add_control(
		'style',
		[
			'label'			=> esc_html__( 'Select Button Style', 'fablio' ),
			'description'	=> esc_html__( 'Button style', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'flat',
			'label_block'	=> true,
			'prefix_class'	=> 'tm-btn-style-',
			'options' => [
				'flat' 			=> esc_attr__( 'Flat', 'fablio' ),
				'outline'		=> esc_attr__( 'Outline', 'fablio' ),
				'text'			=> esc_attr__( 'Simple text', 'fablio' ),
			],
		]
	);
	
	$element->add_control(
		'shape',
		[
			'label'			=> esc_attr__( 'Select button shape.', 'fablio' ),
			'description'	=> esc_attr__( 'Select button shape.', 'fablio' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'label_block'	=> true,
			'prefix_class'	=> 'tm-btn-shape-',
			'default'		=> 'square',
			'options' => [
				'square' 		=> esc_attr__( 'Square', 'fablio' ),
				'rounded'		=> esc_attr__( 'Rounded', 'fablio' ),
				'round'			=> esc_attr__( 'Round', 'fablio' ),
			],
		]

	);
	
	$element->add_control(
			'icon-pos',
			[
				'label' => __( 'Icon Position', 'fablio' ),
				'type' => Elementor\Controls_Manager::SELECT,
				'label_block'	=> true,
				'prefix_class'	=> 'tm-icon-align-',
				'default' => 'left',
				'options' => [
					'left'  => __( 'Before', 'fablio' ),
					'right' => __( 'After', 'fablio' ),
				],
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);
		
		
	$element->end_controls_section();
}
}
	
/* enable builder for custom cpt */

if( !function_exists('tm_elementor_enable_cpt_support') ){
function tm_elementor_enable_cpt_support() {

	$cpt_support  = array( 'page', 'post', 'tm_portfolio', 'tm_service', 'tm_team_member' );
	update_option( 'elementor_cpt_support', $cpt_support  );

}
}
add_action( 'after_switch_theme', 'tm_elementor_enable_cpt_support' );