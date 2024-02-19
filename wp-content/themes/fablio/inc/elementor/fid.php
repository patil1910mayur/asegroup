<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Fact & Digit Widget.
*/
 
class Fablio_Fidbox_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_fid_element';
	}

	public function get_title() {
		return esc_attr__( 'Facts in digits', 'fablio' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'fablio_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'numinate' );
		wp_enqueue_script( 'jquery-circle-progress' );
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
				'default'		=> 'topicon',
				'options' => [
					'topicon'	=> esc_attr( 'Top Center icon' ),
					'lefticon'	=> esc_attr( 'Left Icon' ),
					'righticon'	=> esc_attr( 'Right Icon' ),
					'circle-progress'	=> esc_attr( 'Circle Progress Style' ),
					'lefticon-style2'	=> esc_attr( 'Left icon Style2' ),
					'style6'	=> esc_attr( 'Style 6' ),
					'style7'	=> esc_attr( 'Style 7' ),
					'style8'	=> esc_attr( 'Style 8' ),
				],
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'fablio' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
                ],
            ]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_attr__( 'Header ', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Title Text. ', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text for the title. ', 'fablio' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description Text', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter description text', 'fablio' ),
				'label_block' => true,
				'condition' => [
					'view' => 'style6',
				],
			]
		);

		$this->add_control(
			'digit',
			[
				'label' => esc_attr__( 'Rotating Number', 'fablio' ),
				'description' => esc_attr__( 'Enter rotating number digit here.', 'fablio' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '50',
			]
		);

		$this->add_control(
			'interval',
			[
				'label' => esc_attr__( 'Rotating digit Interval', 'fablio' ),
				'description' => esc_attr__( 'Enter rotating interval number here.', 'fablio' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
			]
		);

		$this->add_control(
			'before',
			[
				'label' => esc_attr__( 'Text Before Number', 'fablio' ),
				'description' => esc_attr__( 'Enter text which appear just before the rotating numbers.', 'fablio' ),
				'separator' => 'before',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'beforetextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'fablio' ),
				'description' => esc_attr__('Select text style for the before text.', 'fablio'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'fablio' ),
					'sub'		=> esc_attr__( 'Subscript', 'fablio' ),
					'span'		=> esc_attr__( 'Normal', 'fablio' ),
				]
			]
		);

		$this->add_control(
			'after',
			[
				'label' => esc_attr__( 'Text After Number', 'fablio' ),
				'description' => esc_attr__( 'Enter text which appear just after the rotating numbers.', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'aftertextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'fablio' ),
				'description' => esc_attr__('Select text style for the after text.', 'fablio'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'fablio' ),
					'sub'		=> esc_attr__( 'Subscript', 'fablio' ),
					'span'		=> esc_attr__( 'Normal', 'fablio' ),
				]
			]
		);
		
		$this->add_control(
			'circle_fill_color',
			[
				'label' => esc_attr__( 'Circle fill color', 'fablio' ),
				'description'	=> esc_attr__( 'Select circle fill color..', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'skincolor',
				'options' => [
					'skincolor'		=> esc_attr__( 'Skincolor', 'fablio' ),
					'20292f'		=> esc_attr__( 'Dark Grey', 'fablio' ),
					'#fff'			=> esc_attr__( 'White', 'fablio' ),
				],
				'condition' => [
					'view' => 'circle-progress',
				],
			]
		);
		$this->add_control(
			'circle_empty_color',
			[
				'label' => esc_attr__( 'Circle empty color', 'fablio' ),
				'description'	=> esc_attr__( 'Select circle empty color..', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'default' => '20292f',
				'options' => [
					'skincolor'		=> esc_attr__( 'Skincolor', 'fablio' ),
					'20292f'		=> esc_attr__( 'Dark Grey', 'fablio' ),
					'#fff'		=> esc_attr__( 'White', 'fablio' ),
				],
				'condition' => [
					'view' => 'circle-progress',
				],
			]
		);
		

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		
		global $tm_global_fid_element_values;
		$tm_global_fid_element_values = array();
		
		$tm_global_fid_element_values['circle_fill_color']  = $circle_fill_color;
		$tm_global_fid_element_values['circle_empty_color']  = $circle_empty_color;

		$return = $icon = '';

		$lefticoncode  = '';
		$righticoncode = '';
		if( !empty($settings['icon']['value']) ){ 
			$lefticoncode = '<div class="tm-fid-icon-wrapper"><i class="' . esc_attr($settings['icon']['value']) . '"></i></div>';
		} 
		$class         = array();
		$class_icon         = 'tm-fid-without-icon';
		if( !empty($settings['icon']['value']) ){ 
			$class_icon = 'tm-fid-with-icon';	
			
		}  // if( $add_icon=='true' )
		
		// icon exists class
		$class[] = $class_icon;
		
		if( !empty($view) ){
			$class[] = 'tm-fid-view-'.$view;
		}
			
		$before_text = '';
		$after_text  = '';
		
		if( trim($before)!='' ){
			if( $beforetextstyle=='sup' || $beforetextstyle=='sub' || $beforetextstyle=='span' ){
				$before_text = '<'.$beforetextstyle.'>'.trim($before).'</'.$beforetextstyle.'>';
			}
		}
		
		if( trim($after)!='' ){
			if( $aftertextstyle=='sup' || $aftertextstyle=='sub' || $aftertextstyle=='span' ){
				$after_text = '<'.$aftertextstyle.'>'.trim($after).'</'.$aftertextstyle.'>';
			}
		}
			$view_class=implode(' ', $class);

		if( file_exists( locate_template( '/template-parts/fidbox2/fidbox-'.esc_attr($view).'.php', false, false ) ) ){

			ob_start();
			include( locate_template( '/template-parts/fidbox2/fidbox-'.esc_attr($view).'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

		}
		
		echo themetechmount_wp_kses($return);

	}


}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Fablio_Fidbox_Widget() );