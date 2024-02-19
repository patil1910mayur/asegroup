<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Icon Heading Box
*/
class Fablio_IconHeadingbox_Widget  extends Widget_Base{
	
	public function get_name() {
		return 'tm_icon_heading';
	}
	
	public function get_title() {
		return esc_attr__( 'Icon Box', 'fablio' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'fablio_category' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Content', 'fablio' ),
			]
		);
		
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'Box Design', 'fablio' ),
				'description'	=> esc_attr__( 'Select IconBox style.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'styletwo',
				'prefix'		=> 'themetechmount-iconbox themetechmount-iconbox-',
				'options' => [
					'styleone'	=> esc_attr( 'Style 1' ),
					'styletwo'	=> esc_attr( 'Style 2' ),
					'stylethree'=> esc_attr( 'Style 3' ),
					'stylefour' => esc_attr( 'Style 4' ),
					'styleseven' => esc_attr( 'Style 7'),
					'stylenine' => esc_attr( 'Style 9' ),
					'styleeleven' => esc_attr( 'Style 11'),
					'styletwelve' => esc_attr( 'Style 12'),
				],
			]
		);

		 $this->add_control(
			'tm_highlight_box',
			[
				'label' => esc_attr__( 'Highlight BoX', 'fablio' ),
				'description'      => esc_attr__( 'Highlight this iconbox', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'yes'	=> esc_attr__( 'Yes' ),
					'no'	=> esc_attr__( 'No'),
				],
				'condition' => [
					'view' => [ 'styleeleven']
				],
		
			]
		);

        $this->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'fablio' ),
					'image'	=> esc_attr__( 'Image', 'fablio' ),
					'text'	=> esc_attr__( 'Text', 'fablio' ),
				],
				'default' => esc_attr( 'icon' ),
			]
		);
		
        $this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'fablio' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);

        $this->add_control(
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
		
        $this->add_control(
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
		
		$this->add_control(
			'icon_color',
			[
				'label' => esc_attr__( 'Icon Color', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'skincolor'	=> esc_attr( 'Skin color' ),
					'darkgrey'	=> esc_attr( 'Dark Color' ),
					'grey'		=> esc_attr( 'Grey Color' ),	
					'white'		=> esc_attr( 'White Color' ),
					'default'	=> esc_attr( 'Default Color' ),	
				],
				'default' => esc_attr( 'skincolor' ),
			]
		);
		
		$this->add_control(
			'icon_shape',
			[
				'label' => esc_attr__( 'Icon Background shape', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none'	=> esc_attr( 'None' ),	
					'boxed'	=> esc_attr( 'Square' ),
					'rounded-less'	=> esc_attr( 'Rounded' ),
					'rounded'		=> esc_attr( 'Round' ),		
					'outline-boxed'	=> esc_attr( 'Outline Square' ),
					'outline-rounded-less'	=> esc_attr( 'Outline Rounded' ),
					'outline-rounded'		=> esc_attr( 'Outline Round' ),			
				],
				'default' => esc_attr( 'none' ),
				'condition' => [
					'view' => [ 'styletwo']
				],
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_attr__( 'Background color', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'skincolor'	=> esc_attr( 'Skin color' ),
					'darkgrey'	=> esc_attr( 'Dark Color' ),
					'grey'		=> esc_attr( 'Grey Color' ),	
					'white'		=> esc_attr( 'White Color' ),
					'none'		=> esc_attr( 'None' ),	
				],
				'default' => esc_attr( 'none' ),
				'condition' => [
					'view' => [ 'styletwo','styleseven' ]
				],
			]
		);
		
		$this->add_control(
			'icon_size',
			[
				'label' => esc_attr__( 'Icon Size', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'small'		=> esc_attr( 'Small' ),
					'default'	=> esc_attr( 'Default' ),
					'large'		=> esc_attr( 'Large' ),	
				],
				'default' => esc_attr( 'default' ),
				'condition' => [
					'view' => ['styletwo' ]
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
			'subheading',
			[
				'label' => esc_attr__( 'Subheading', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'This is Subtitle', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text for subheading line.', 'fablio' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'fablio' ),
				'type' => Controls_Manager::URL,
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
			]
		);
		$this->add_control(
			'iconbox_bg_number',
			[
				'label' => esc_attr__( 'Number Text', 'fablio' ),
				'description' => esc_attr__( 'Text will appear as number', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'fablio' ),
                'label_block' => true,
				'condition' => [
					'view' => 'two',
				],
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label' => esc_attr__( 'Button Title', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Read More', 'fablio' ),
				'separator'		=> 'before',
				'placeholder' => esc_attr__( 'Enter button title text', 'fablio' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'fablio' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
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
		
		$this->add_control(
			'smallicon_link',
			[
				'label' => esc_attr__( 'URL (Link)', 'fablio' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'description' => esc_attr__( 'Add link to Bottom icon.', 'fablio' ),
				'condition' => [
					'view' => 'stylethree',
				],
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
						'{{WRAPPER}} .themetechmount-iconbox-heading .tm-custom-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .themetechmount-iconbox-heading .tm-custom-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .tm-custom-heading',
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
						'{{WRAPPER}} .tm-custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .themetechmount-iconbox .tm-cta3-content-wrapper' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .themetechmount-iconbox .tm-cta3-content-wrapper',
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
						'{{WRAPPER}} .themetechmount-iconbox .tm-cta3-content-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		extract($settings);


		global $tm_global_iconbox_element_values;
		$tm_global_iconbox_element_values = array();
		
		$icon_html = $heading_html = $subheading_html = $content_html = $nav_html = $button_html = $icon_color_html = $iconbox_bg_number = '';
		
		
		if( file_exists( locate_template( '/template-parts/iconsbox/iconbox-'.esc_attr($view).'.php', false, false ) ) ){
			$icon_type_class = '';

			if( !empty($settings['icon_type']) ){

				if( $settings['icon_type']=='text' ){
					$icon_html = '<div class="tm-icon-type-text">' . $settings['icon_text'] . '</div>';
					$icon_type_class = 'text';

				} else if( $settings['icon_type']=='image' ){
					$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Icon', 'fablio') ;
					$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
					$icon_html	= '<div class="tm-icon-type-image">' . $icon_image . '</div>';
					$icon_type_class = 'image';
				} else if( $settings['icon_type']=='none' ){
					$icon_html = '';
					$icon_type_class = 'none';
				} else {

					$icon_html       = '<div class="tm-box-icon"><i class="' . $settings['icon']['value'] . '"></i></div>';
					$icon_type_class = 'icon';

					wp_enqueue_style( 'elementor-icons-'.$settings['icon']['library']);
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

			if( !empty($settings['subheading']) ) {
				$subheading_tag	= ( !empty($settings['subheading_tag']) ) ? $settings['subheading_tag'] : 'h5' ;
				$subheading_html	= '<'. themetechmount_wp_kses($subheading_tag) . ' class="tm-element-subheading">
					'.tm_link_render($settings['subheading_link'], 'start' ).'
						'.themetechmount_wp_kses($settings['subheading']).'
					'.tm_link_render($settings['subheading_link'], 'end' ).'
					</'. themetechmount_wp_kses($subheading_tag) . '>
				';
			}

			if( !empty($settings['desc']) ){
				$content_html = '<div class="tm-cta3-content-wrapper">'.themetechmount_wp_kses($settings['desc']).'</div>';
			}
			
			if( !empty($settings['iconbox_bg_number']) ){
				$iconbox_bg_number = '<div class="tm-number-wrapper">'.themetechmount_wp_kses($settings['iconbox_bg_number']).'</div>';
			}
			
			if( !empty($icon_color) ){
				$icon_color_html = esc_attr($icon_color);
			}
			if( !empty($icon_size) ){
				$icon_size_html = esc_attr($icon_size);
			}
			if( !empty($icon_shape) ){
				$icon_shape_html = esc_attr($icon_shape);
			}
						
			if( !empty($icon_bg_color) ){
				$icon_bg_color_html = esc_attr($icon_bg_color);
			}

			$tm_global_iconbox_element_values['tm_highlight_box']= $tm_highlight_box;
			

			$boxstyle	= $view;
			$mainclass	= '';
			
			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_html = '<div class="tm-vc_btn3-container tm-vc_btn3-inline tm-iocnbox-btn">' . tm_link_render($settings['btn_link'], 'start' ) . themetechmount_wp_kses($settings['btn_title']) . tm_link_render($settings['btn_link'], 'end' ) . '</div>';
			}
				 include( locate_template( '/template-parts/iconsbox/iconbox-'.esc_attr($view).'.php', false, false ) ); 							
		}

	}
	
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Fablio_IconHeadingbox_Widget() );

