<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class Fablio_Stepsbox_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_staticbox_element';
	}

	public function get_title() {
		return esc_attr__( 'Step Box', 'fablio' );
	}

	public function get_icon() {
		return ' eicon-menu-toggle';
	}

	public function get_categories() {
		return [ 'fablio_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'General', 'fablio' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select StepBox Style', 'fablio' ),
				'description'	=> esc_attr__( 'Select StepBox style.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'style1'	=> esc_attr( 'Style 1' ),
					'style2'	=> esc_attr( 'Style 2' ),
					'style3'	=> esc_attr( 'Style 3' ),
				],
				'default' => esc_attr( 'style1' ),
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
				'placeholder' => esc_attr__( 'Enter text for heading line.', 'fablio' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'subheading',
			[
				'label' => esc_attr__( 'Subheading', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text for subheading line.', 'fablio' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'reverse_heading',
			[
				'label' => esc_attr__( 'Reverse heading order', 'fablio' ),
				'description' => esc_attr__( 'Show sub-heading before heading.', 'fablio' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'fablio' ),
				'label_off' => esc_attr__( 'No', 'fablio' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Enter description text', 'fablio' ),
			]
		);
		
		$this->add_control(
			'heading_sep',
			[
				'label' => esc_attr__( 'Seperator', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none'		=> esc_attr( 'None' ),
					'solid'		=> esc_attr( 'Solid' ),
					'style-one'	=> esc_attr( 'Subheading Border' ),
				],
				'default' => esc_attr( 'solid' ),
			]
		);
		
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_attr__( 'Text alignment', 'fablio' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_attr__( 'Left', 'fablio' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'fablio' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'fablio' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'tm-align-',
				'selectors' => [
					'{{WRAPPER}} .tm-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => 'left',
			]
		);
		
		$this->add_control(
			'heading_style',
			[
				'label'			=> esc_attr__( 'Heading Style', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'vertical'	=> esc_attr( 'Vertical (Default)' ),
					'horizontal'	=> esc_attr( 'Horizontal' ),
				],
				'default' => esc_attr( 'vertical' ),
			]
		);

		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'fablio' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
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
		$this->add_control(
			'subheading_tag',
			[
				'label' => esc_attr__( 'Subheading Tag', 'fablio' ),
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
				'default' => esc_attr( 'h4' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Content', 'fablio' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'fablio' ),
					'image'	=> esc_attr__( 'Image', 'fablio' ),
					'text'	=> esc_attr__( 'Text', 'fablio' ),
				],
				'default' => esc_attr( 'image' ),
			]
		);
		
		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'fablio' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);
		
		 $repeater->add_control(
			'icon_image',
			[
				'label' => __( 'Select Image for Icon', 'fablio' ),
				'description' => __( 'image will appear at icon position', 'fablio' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ]
			]
		);
		
		$repeater->add_control(
			'icon_text',
			[
				'label' => esc_attr__( 'Text for Icon', 'fablio' ),
				'description' => esc_attr__( 'Text will appear at icon position', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text here', 'fablio' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'text',
                   
                ]
			]
		);

		$repeater->add_control(
			'label',
			[
				'label' => esc_attr__( 'Box Title', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( 'Box Title', 'fablio' ),
				'placeholder' => esc_attr__( 'Box Title', 'fablio' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'smalltext',
			[
				'label' => esc_attr__( 'Box Content', 'fablio' ),
				'default' => esc_attr__( 'Box Content', 'fablio' ),
				'placeholder' => esc_attr__( 'Box Content', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'process_number',
			[
				'label' => esc_attr__( 'Number', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => esc_attr__( 'Like 01, 02).', 'fablio' ),
				'placeholder' => esc_attr__( '01', 'fablio' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'fablio' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is first box', 'fablio' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'fablio' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'fablio' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'fablio' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Typo Settings', 'fablio' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'heading_title',
				[
					'label' => esc_attr__( 'Heading', 'fablio' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'heading_color',
				[
					'label' => esc_attr__( 'Color', 'fablio' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tm-element-content-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tm-element-content-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .tm-element-content-heading',
				]
			);
			$this->add_responsive_control(
				'heading_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'fablio' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tm-element-content-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_subheading',
				[
					'label' => esc_attr__( 'Sub Heading', 'fablio' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'stitle_color',
				[
					'label' => esc_attr__( 'Color', 'fablio' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tm-element-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tm-element-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'subheading_typography',
					'selector' => '{{WRAPPER}} .tm-element-subheading',
				]
			);
			$this->add_responsive_control(
				'subheading_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'fablio' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tm-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_desc',
				[
					'label' => esc_attr__( 'Description', 'fablio' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_attr__( 'Color', 'fablio' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tm-element-content-desctxt' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .tm-element-content-desctxt',
				]
			);
			$this->add_responsive_control(
				'desc_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'fablio' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tm-element-content-desctxt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$link_html = '';
		$image_html		= '' ;

		?>

		<?php
			tm_heading_subheading($settings, true);
		?>

		<!-- <div class="themetechmount-boxes-row-wrapper tm-processbox-wrapper"> -->
			<div class="themetechmount-boxes-row-wrapper tm-processbox-wrapper tm-processbox-<?php echo esc_attr($style); ?>">

		<?php
			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($boxes) ){
				switch( count($boxes) ){
					case 1:
						$col_start_div	= '<div class="tm-processbox">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="tm-processbox">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="tm-processbox">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="tm-processbox">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="tm-processbox">';
						$col_end_div	= '</div>';
						break;
				}
			} ?>

		<?php

		foreach( $settings['boxes'] as $box ){

			$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="themetechmount-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
			$label_html		= ( !empty($box['label']) ) ? '<div class="tm-box-title"><h5>'.esc_html($box['label']).'</h5></div>' : '' ;
		
					$icon = '';
					if( !empty($box['icon_type']) ){

						if( $box['icon_type']=='text' ){
							$icon = '<div class="tm-stepbox-main-icon"><div class="tm-ptable-icon-wrapper tm-ptable-icon-type-text">' . $box['icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if($box['icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" />';
							$icon = '<div class="tm-process-image"><div class="tm-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $box['icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {
							$icon       = ( !empty($box['icon']['value']) ) ? '<div class="tm-stepbox-main-icon"><div class="tm-ptable-icon-wrapper"><i class="' . $box['icon']['value'] . '"></i></div></div>' : '';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$box['icon']['library']);
						}
					}
					
					$process_number = '';
				if( !empty($box['process_number'])){
					$process_number = '<div class="process-num"><span class="number">' . $box['process_number'] . '</span></div>';

				}
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/template-parts/stepbox/stepbox-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;

		}		
		
		echo themetechmount_wp_kses($return);
		
		?>

		</div>

	    <?php
	}


}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Fablio_Stepsbox_Widget() );