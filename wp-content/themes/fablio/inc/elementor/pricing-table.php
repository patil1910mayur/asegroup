<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  ThemetechMount Price Table
*/

class Fablio_Pricetable_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_ptable_element';
	}

	public function get_title() {
		return esc_attr__( 'Pricing Table', 'fablio' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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
				'label'			=> esc_attr__( 'Select Pricetable Style', 'fablio' ),
				'description'	=> esc_attr__( 'Select Pricetable style.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
						'style-1' => esc_attr( 'Style 1' ),	
					],
				'default' => esc_attr( 'style-1' ),
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
				'default' => esc_attr__( 'Enter Your Heading', 'fablio' ),
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
            'highlight_col_section',
            [
                'label' => esc_attr__( 'Featured Column', 'fablio' ),
            ]
        );
        $this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Featured Column', 'fablio' ),
				'description' => esc_attr__( 'Select whith column will be with featured style.', 'fablio' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'fablio' ),
                    '2'	=> esc_attr__( 'Second Column', 'fablio' ),
					'3'	=> esc_attr__( 'Third Column', 'fablio' ),
					'4'	=> esc_attr__( 'Fourth Column', 'fablio' ),
					'5'	=> esc_attr__( 'Fifth Column', 'fablio' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Feature Column Heading', 'fablio' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Featured', 'fablio' ),
				'placeholder' => esc_attr__( 'Enter text used as main heading for feature column. Some HTML tags are allowed.', 'fablio' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		for( $x=1; $x<=5; $x++ ){

			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'fablio' ) , tm_ordinal($x) ) ,
				]
			);

		
		$this->add_control(
			$x.'_icon',
			[
				'label' => __( 'Icon', 'fablio' ),
				'type' => \Elementor\Controls_Manager::ICONS,
            ]

		);

			$this->add_control(
				$x.'_heading',
				[
					'label'         => esc_attr__( 'Heading', 'fablio' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'fablio' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);
			$this->add_control(
				$x.'_description',
				[
					'label'         => esc_attr__( 'Description', 'fablio' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter description text', 'fablio' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'         => esc_attr__( 'Price', 'fablio' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter Price.', 'fablio' ),
				]
			);
			
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'         => esc_attr__( 'Currency symbol', 'fablio' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency symbol', 'fablio' ),
				]
			);
			
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'fablio' ),
					'description'	=> esc_html__( 'Select currency position.', 'fablio' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> 'after',
					'options' => [
						'after'		=> __( 'After Price', 'fablio' ),
						'before'	=> __( 'Before Price', 'fablio' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'         => esc_attr__( 'Price Frequency', 'fablio' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'fablio' ),
					'separator'     => 'after',
				]
			);
			
			$this->add_control(
				$x.'_btn_text',
				[
					'label'         => esc_attr__( 'Button Text', 'fablio' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'fablio' ),
				]
			);
			
			$this->add_control(
				$x.'_btn_link',
				[
					'label'         => esc_attr__( 'Button Link', 'fablio' ),
					'type'          => Controls_Manager::URL,
					'description'   => esc_attr__( 'Set link for button', 'fablio' ),
					'separator'     => 'after',
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Line Label', 'fablio' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'fablio' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'fablio' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'This is label one', 'fablio' ),
						],
						[
							'text'		=> esc_attr__( 'This is label two', 'fablio' ),
						],
						[
							'text'		=> esc_attr__( 'This is label three', 'fablio' ),
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);

			$this->end_controls_section();

		}

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>
		<?php tm_heading_subheading($settings, true); ?>
		<div class="tm-ptablebox tm-ptablebox-<?php echo esc_attr($style); ?>">

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}

			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($columns) ){
				switch( count($columns) ){
					case 1:
						$col_start_div	= '<div class="ttm-pricetable-column-w tm-ptable-col col-md-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="ttm-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="ttm-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="ttm-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="ttm-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;
				}
			}

			if( !empty($columns) ){

				$return .= '<div class="themetechmount-ptables-w wpb_content_element">';

				foreach( $columns as $col => $highlight_col ){


					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="tm-ptablebox-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_text']) ) ? '<div class="ttm-featured-title">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="tm-ptablebox-featured-col ', 'class="', $col_start_div );
					}

					$heading = ( !empty($settings[$col.'_heading']) ) ? '<div class="tm-ptablebox-title"><h3>'.$settings[$col.'_heading'].'</h3></div>' : '' ;
					
					$description = ( !empty($settings[$col.'_description']) ) ? '<div class="tm-ptablebox-description">'.$settings[$col.'_description'].'</div>' : '' ;

					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="tm-ptablebox-cur-symbol-'.$settings[$col.'_cur_symbol_position'].'">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;

					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="tm-ptablebox-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;
				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="tm-ptablebox-price">'.$settings[$col.'_price'].'</div>' : '' ;
					
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;
		
					$icon       = ( !empty($settings[$col.'_icon']['value']) ) ? '<div class="tm-sbox-icon-wrapper"><i class="' . $settings[$col.'_icon']['value'] . '"></i></div>' : '';
					$icon_type_class = 'icon';

					wp_enqueue_style( 'elementor-icons-'.$settings[$col.'_icon']['library']);
							
					
					
					$lines_html = '';
					$values     = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {

				
							$lines_html .= isset( $data['text'] ) ? '<li class="tm-ptable-line">'.$data['text'].'</li>' : '';
						}
					}

					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="tm-vc_btn3-container tm-vc_btn3-inline"><div class="tm-vc_general tm-vc_btn3 tm-vc_btn3-size-md tm-vc_btn3-shape-square tm-vc_btn3-style-flat tm-vc_btn3-weight-no tm-vc_btn3-color-skincolor">' . tm_link_render($settings[$col.'_btn_link'], 'start' ) . themetechmount_wp_kses($settings[$col.'_btn_text']) . tm_link_render($settings[$col.'_btn_link'], 'end' ) . '</div></div>';
					}

					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/template-parts/pricingtable/pricetable-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo themetechmount_wp_kses($return);
			?>

		</div>

		<?php

	}
	
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Fablio_Pricetable_Widget() );