<?php
// [tm-woocategory-block]
if (!function_exists('themetechmount_sc_woocategory_block'))
{
    function themetechmount_sc_woocategory_block($atts, $content = NULL)
    {

        $return = '';

        if (function_exists('vc_map'))
        {
            global $themetechmount_sc_params_woocategory_block;
            $options_list = themetechmount_create_options_list($themetechmount_sc_params_woocategory_block);

            extract(shortcode_atts($options_list, $atts));

            $category_ids_array = explode(",", 'product_cat');
            $name = '';

			// Starting wrapper of the whole arear
			$return .= themetechmount_box_wrapper( 'start', 'woocatbox', get_defined_vars() );
		
            $args = array(
                'parent' => $display_category,
                'hide_empty' => $hide_empty,
                'taxonomy' => 'product_cat',
            );
            $categories = get_categories($args);

			$return .= '<div class="row multi-columns-row themetechmount-boxes-row-wrapper">';
            foreach ($categories as $cat)
            {
                $category_ids = get_term($cat, 'product_cat');
                $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                if (empty($thumbnail_id)):
                    $image = get_template_directory_uri() . "/images/placeholder.png";
                else:
                    $image = wp_get_attachment_url($thumbnail_id);
                endif;
				$return .= themetechmount_column_div('start', $column );	
                $return .= '<div class="ttmcat-wrap"><div class="ttmcat-imgblock"><a class="ttmcat-img" href="' . get_category_link($category_ids) . '" title="' . $cat->name . '"><img src="' . $image . '" title="' . $cat->name . '" alt="' . $cat->name . '" height="' . $height . '" width="' . $width . '"/></a>';
                $return .= '</div>';

                $return .= '<div class="ttmcat_description"><h5><a class="ttmcat_name" href="' . get_category_link($category_ids) . '"  title="' . $cat->name . '">' . $cat->name . '</a></h5></div>';
                $return .= '</div>';
				$return .= themetechmount_column_div('end', $column );
            }
			$return .= '</div>';
            $return .= themetechmount_box_wrapper( 'end', 'static', get_defined_vars() );
			/* Restore original Post Data */
			wp_reset_postdata();
			
        }
        else
        {
            $return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
        }

        return $return;

    }
}
add_shortcode('tm-woocategory-block', 'themetechmount_sc_woocategory_block');

