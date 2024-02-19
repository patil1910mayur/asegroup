<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $fablio_theme_options;

	
if ( $product && ( $product->is_featured() || $product->is_on_sale() ) ) {

	$featured_text  = '';
	$sale_text = '';
	
	$featured_label = ( isset( $fablio_theme_options['hot-label-text'] ) && $fablio_theme_options['hot-label-text'] ) ? $fablio_theme_options['hot-label-text'] : esc_attr__( 'Hot', 'fablio' );
	
	if( isset($fablio_theme_options['show-hot-label']) && $fablio_theme_options['show-hot-label']=='1' ){
		$featured_text = '<span class="featured product-label">' . esc_attr( $featured_label ) . '</span>';
	}
	

	$product_sale_lebtype = ( isset( $fablio_theme_options['product_sale_lebtype'] ) && $fablio_theme_options['product_sale_lebtype'] ) ? $fablio_theme_options['product_sale_lebtype'] : 'text';
	$sale_label    = ( isset( $fablio_theme_options['sale-label-text'] ) && $fablio_theme_options['sale-label-text'] ) ? $fablio_theme_options['sale-label-text'] : esc_attr__( 'Sale', 'fablio' );

if ( $product_sale_lebtype === 'percentage' ) {

		$percentage = 0;

		if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {

			$regular_price = intval( $product->get_regular_price() );
			$sale_price    = intval( $product->get_sale_price() );

			if ( $regular_price ) {
				$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
			}
			$percentage = '-' . $percentage;

		} elseif ( $product->is_type( 'variable' ) ) {

			$available_variations = $product->get_available_variations();

			if ( $available_variations ) {

				$percents = array();
				foreach ( $available_variations as $variations ) {

					$regular_price = $variations['display_regular_price'];
					$sale_price    = $variations['display_price'];

					if ( $regular_price ) {
						$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
						$percents[] = $percentage;
					}
				}

				$max_discount = max( $percents );
				$percentage   = 'Up to -' . $max_discount;
			}
		}

		$sale_label = $percentage . '%';

		if ( 0 <= $percentage ) {
			$sale_label = '';
		}
	} else {
		$sale_label = $sale_label;
	}

	if( isset($fablio_theme_options['show-sale-label']) && $fablio_theme_options['show-sale-label']=='1' ){
		$sale_text = '<span class="onsale product-label">' . esc_attr( $sale_label ) . '</span>';
	}
	?>

	<div class="product-labels">

		<?php if ( $product->is_on_sale() && $sale_label ) : ?>

			<?php echo apply_filters( 'woocommerce_sale_flash', $sale_text, $post, $product );  ?>

		<?php endif; ?>
		
		<?php if ( $product->is_featured() && $featured_text ) : ?>

			<?php
				echo apply_filters( 'themetechmount_featured', $featured_text, $post, $product ); 
			?>

		<?php endif; ?>

	</div>
	
<?php
}

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
