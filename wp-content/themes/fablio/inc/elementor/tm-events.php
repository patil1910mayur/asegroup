<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Teambox Box
*/

class Fablio_Eventbox_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_event_element';
	}
	
	public function get_title() {
		return esc_attr__( 'Event Box', 'fablio' );
	}

	public function get_icon() {
		return 'eicon-kit-parts';
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
				'label'			=> esc_attr__( 'Select Eventbox Style', 'fablio' ),
				'description'	=> esc_attr__( 'Select box design.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'top-image'	=> esc_attr( 'Default Style' ),
					'top-image-details'	=> esc_attr( 'Detailed Style' ),
				],
				'default' => esc_attr( 'top-image' ),
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
				'default' => esc_attr__( 'Events', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text for heading text.', 'fablio' ),
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
				'placeholder' => esc_attr__( 'Enter text for subheading text.', 'fablio' ),
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
				'placeholder' => esc_attr__( 'Type your description text', 'fablio' ),
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
				'label' => esc_attr__( 'Box Design', 'fablio' ),
			]
		);
		
		$this->add_control(
			'from_category',
			[
				'label' => esc_attr__( 'From Category ?', 'fablio' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_category(),
				'multiple' => true,
				'label_block'	=> true,
				'placeholder' => esc_attr__( 'All Categories', 'fablio' ),
			]
		);
		
		$this->add_control(
			'show',
			[
				'label' => esc_attr__( 'Post to show', 'fablio' ),
				'description' => esc_attr__( 'How many item you want to show.', 'fablio' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
			]
		);
		$this->add_control(
			'sortable',
			[
				'label' => esc_attr__( 'Show Sortable Category Links', 'fablio' ),
				'description' => esc_attr__( 'Show sortable category links above items so user can sort by just single click.', 'fablio' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'fablio' ),
				'label_off' => esc_attr__( 'No', 'fablio' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_control(
			'allword',
			[
				'label' => esc_attr__( 'Replace ALL word', 'fablio' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'All', 'fablio' ),
				'placeholder' => esc_attr__( 'Replace ALL word in sortable group links. Default is ALL word.', 'fablio' ),
				'label_block' => true,
				'condition' => [
					'sortable' => 'yes',
				],
			]
		);
		$this->add_control(
			'order',
			[
				'label' => esc_attr__( 'Order', 'fablio' ),
				'description' => esc_attr__( 'Designates the ascending or descending order.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'DESC',
				'options' => [
					'ASC'		=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'fablio' ),
					'DESC'		=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'fablio' ),
				]
			]
		);
		
		$this->add_control(
			'orderby',
			[
				'label' => esc_attr__( 'Order By', 'fablio' ),
				'description' => esc_attr__( ' Sort retrieved posts by parameter.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'none'		=> esc_attr__( 'No order', 'fablio' ),
					'ID'		=> esc_attr__( 'ID', 'fablio' ),
					'title'		=> esc_attr__( 'Title', 'fablio' ),
					'date'		=> esc_attr__( 'Date', 'fablio' ),
					'rand'		=> esc_attr__( 'Random', 'fablio' ),
				]
			]
		);
		
		$this->add_control(
			'gap',
			[
				'label' => esc_attr__( 'Box Gap', 'fablio' ),
				'description' => esc_attr__( 'Gap between each Post box.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'default' => '30px',
				'options' => [
					'0px'		=> esc_attr__( 'No Gap (0px)', 'fablio' ),
					'5px'		=> esc_attr__( '5px', 'fablio' ),
					'10px'		=> esc_attr__( '10px', 'fablio' ),
					'15px'		=> esc_attr__( '15px', 'fablio' ),
					'20px'		=> esc_attr__( '20px', 'fablio' ),
					'25px'		=> esc_attr__( '25px', 'fablio' ),
					'30px'		=> esc_attr__( '30px', 'fablio' ),
					'35px'		=> esc_attr__( '35px', 'fablio' ),
					'40px'		=> esc_attr__( '40px', 'fablio' ),
					'45px'		=> esc_attr__( '45px', 'fablio' ),
					'50px'		=> esc_attr__( '50px', 'fablio' ),
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Box Design', 'fablio' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
	
		$this->add_control(
			'column',
			[
				'label'			=> esc_attr__( 'Select Column', 'fablio' ),
				'description'	=> esc_attr__( 'Select column.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'three',
				'options'		=> [
					'one'				=> esc_attr__( 'One Column', 'fablio' ),
					'two'				=> esc_attr__( 'Two Column', 'fablio' ),
					'three'				=> esc_attr__( 'Three Column', 'fablio' ),
					'four'				=> esc_attr__( 'Four Column', 'fablio' ),
					'five'				=> esc_attr__( 'Five Column', 'fablio' ),
					'six'				=> esc_attr__( 'Six Column', 'fablio' ),
				],
			]
		);
		
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'Box View', 'fablio' ),
				'description'	=> esc_attr__( 'Select box view. Show as normal row and column or show with carousel effect.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'default',
				'options'		=> [
					'default'	=> esc_attr__( 'Row and Column', 'fablio' ),
					'carousel'	=> esc_attr__( 'Carousel effect', 'fablio' ),
				]
			]
		);

		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Settings', 'fablio' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
				]
			]
		);

		$this->add_control(
			'tm-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'fablio' ),
				'description'	=> esc_attr__( 'Carousel Effect: Slide/Fade animation speed.', 'fablio' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '4500',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'tm-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop Item', 'fablio' ),
				'description'	=> esc_attr__( 'Carousel Effect: Infinite loop sliding.', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'fablio' ),
					'0'				=> esc_attr__( 'No', 'fablio' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'tm-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'fablio' ),
				'description'	=> esc_attr__( 'Carousel Effect: Enable/disable Autoplay', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'fablio' ),
					'0'				=> esc_attr__( 'No', 'fablio' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'tm-centermode',
			[
				'label'			=> esc_attr__( 'Carousel: centerMode', 'fablio' ),
				'description'	=> esc_attr__( 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'fablio' ),
					'0'				=> esc_attr__( 'No', 'fablio' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_nav',
			[
				'label'			=> esc_attr__( 'Carousel: Next/Prev Arrows', 'fablio' ),
				'description'	=> esc_attr__( 'Carousel Effect: Show dots navigation.', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'fablio' ),
					'0'				=> esc_attr__( 'No', 'fablio' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_arrowtype',
			[
				'label'			=> esc_attr__( 'Carousel:Button Type', 'fablio' ),
				'description'	=> esc_attr__( 'Carousel button type.', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'square'			=> esc_attr__( 'Square', 'fablio' ),
					'round'				=> esc_attr__( 'Round', 'fablio' ),
				],
				'default'		=> 'square',
				'condition'		=> [
					'view-type'		=> 'carousel',
					'carousel_nav'		=> '1',
				]
			]
		);
		
		$this->add_control(
			'carousel_dots',
			[
				'label'			=> esc_attr__( 'Carousel: dots', 'fablio' ),
				'description'	=> esc_attr__( 'Carousel Effect: Show dots navigation.', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'fablio' ),
					'0'				=> esc_attr__( 'No', 'fablio' ),
				],
				'default'		=> '0',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'carousel_slidestoscroll',
			[
				'label'			=> esc_attr__( 'Carousel: slidesToScroll', 'fablio' ),
				'description'	=> esc_attr__( '# of slides to scroll', 'fablio' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( '1 Slide', 'fablio' ),
					'column'		=> esc_attr__( 'Same as column', 'fablio' ),
				],
				'default'		=> '1',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
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

		$start_div = ttm_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'tribe_events',
			'data'		=> $settings
		) );

		echo themetechmount_wp_kses($start_div);

		$args = array(
			'post_type'				=> 'tribe_events',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
		);

		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}

		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field'    => 'slug',
					'terms'    => $from_category,
				),
			);
		};

		$posts = new \WP_Query( $args );
		
		$headingclass= '';
		if( empty($settings['heading']) ){
			$headingclass = 'tm-boxwithout-heading';
		}	

		if ( $posts->have_posts() ) {
			
			?>

			<div class="themetechmount-box-heading-wrapper <?php echo themetechmount_wp_kses($headingclass); ?>">
				<?php tm_heading_subheading($settings, true); ?>
				<?php
				if( function_exists('themetechmount_get_filterbutton') ){
					$sortable_category_html = themetechmount_get_filterbutton( $settings, 'tm_team_group' );
					echo themetechmount_wp_kses($sortable_category_html);
				}
				?>
			</div>

			<div class="themetechmount-boxes-row-wrapper row multi-columns-row">

			<?php
			while ( $posts->have_posts() ) {
				$return = '';
				$posts->the_post();
				if( file_exists( locate_template( '/template-parts/eventsbox/eventsbox-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= ttm_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'team',
						'taxonomy'	=> 'tribe_events_cat',
						'style'		=> $style,
					) );

					ob_start();
					$r = include( locate_template( '/template-parts/eventsbox/eventsbox-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= ttm_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				echo themetechmount_wp_kses($return);

			}
			?>

			</div>

			<?php
		}

		wp_reset_postdata();
		
		$end_div = ttm_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'team',
			'data'		=> $settings
		) );
		echo themetechmount_wp_kses($end_div);

	}

	
	protected function select_category() {
	  	$category = get_terms( array( 'taxonomy' => 'tribe_events_cat', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

	     	if( $item ) {
	        	$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
	     	}
	  	}
	  	return $cat;
	}

	
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Fablio_Eventbox_Widget() );