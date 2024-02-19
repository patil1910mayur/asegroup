<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Fact & Digit Widget.
*/
 
class Fablio_Imagebox_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_imagebox_element';
	}

	public function get_title() {
		return esc_attr__( 'Image Box', 'fablio' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return [ 'fablio_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}  
	
	protected function register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content', 'fablio' ),
			]
        );
		
		
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'Design', 'fablio' ),
				'description'	=> esc_attr__( 'Select box design.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'one',
				'options' => [
					'one'	=> esc_attr( 'Style 1' ),
					'two'	=> esc_attr( 'Style 2' ),
					'three'	=> esc_attr( 'Style 3' ),
					'four'	=> esc_attr( 'Style 4' ),
					'five'	=> esc_attr( 'Style 5' ),
					'six'	=> esc_attr( 'Style 6' ),
					'seven'	=> esc_attr( 'Style 7' ),
				],
			]
		);

		$this->add_control(
			'tm_highlight_box',
			[
				'label' => esc_attr__( 'Highlight BoX', 'fablio' ),
				'description'      => esc_attr__( 'Highlight this imagebox', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'yes'	=> esc_attr__( 'Yes' ),
					'no'	=> esc_attr__( 'No'),
				],
				'condition' => [
					'view' => [ 'six']
				],
		
			]
		);

		$this->add_control(
			'image',
			[
				'label'			=> esc_attr__( 'Choose Image', 'fablio' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'default' => 'large',
				'separator' => 'none',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'fablio' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'fablio' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'fablio' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'fablio' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_attr__( 'Heading', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text for heading line.', 'fablio' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_link',
			[
				'label' => esc_attr__( 'Heading Link', 'fablio' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_tag',
			[
				'label' => esc_attr__( 'Heading Tag', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);

   	    $this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		
		global $tm_global_imagebox_element_values;
		$tm_global_imagebox_element_values = array();
		
		$return = '';
		$tm_img_boxstyle = '';

		$class = array();

		if( !empty($view) ){
			$class[] = 'tm-imgbox-'.$view;
		}
        $tm_global_imagebox_element_values['tm_highlight_box']= $tm_highlight_box;
		
		// Media image
			$image_html		= '' ;
			if( defined('ELEMENTOR_VERSION') ){
				$image_html = Group_Control_Image_Size::get_attachment_image_src( $settings['image']['id'], 'image', $settings );
				if( !empty($image_html) ){
					$image_html = '<img src="'.esc_url($image_html).'" class="tm-single-image-img" alt="Image"/>';
				}

			}


			if( !empty($settings['heading']) ) {
				$heading_tag	= ( !empty($settings['heading_tag']) ) ? $settings['heading_tag'] : 'h2' ;
				$heading_html	= '<'. themetechmount_wp_kses($heading_tag) . ' class="tm-custom-heading">
					'.tm_link_render($settings['heading_link'], 'start' ).'
						'.themetechmount_wp_kses($settings['heading']).'
					'.tm_link_render($settings['heading_link'], 'end' ).'
					</'. themetechmount_wp_kses($heading_tag) . '>
				';
			}


			

			if( !empty($tmimage_rtext) && ($tm_img_boxstyle == 'imagestyle-six') ){
			$return .= '<div class="tm-highlight-box tm-wrap">' . $tmimage_rnumber_sec . '<div class="tm-wrap-cell right-text">' . $tmimage_rtext . '</div></div>';
		}
		
		if ( $tm_img_boxstyle == 'imagestyle-four') {
			if ( strlen( $playbox_boxlink ) > 0 && strlen( $url['url'] ) > 0 ) {	
				$icon_boxdiv      = '<div class="tm-box-icon"><a class="tm_element-link tm_prettyphoto" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"><i class="kw_fablio flaticon-play"></i></a></div>';
				
				$icon_textlink      = '<h4><a class="tm_element-link tm_prettyphoto" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . $tmimage_rtext . '</a></h4>';				
			}
			
				$return .= '<div class="tm-playvideobox tm-wrap"><div class="tm-wrap-cell left-text">' . $icon_boxdiv . '</div>' . $icon_textlink . '</div>';	
			
		}
		
			
			
		if( file_exists( locate_template( '/template-parts/imagebox/imagebox.php', false, false ) ) ){

			ob_start();
			include( locate_template( '/template-parts/imagebox/imagebox.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

		}
		
		echo themetechmount_wp_kses($return);

	}


}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Fablio_Imagebox_Widget() );