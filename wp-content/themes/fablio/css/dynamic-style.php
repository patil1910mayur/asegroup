<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Getting skin color */
$skincolor = themetechmount_get_option('skincolor');

/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}

/* Dark BG color */
$secondarycolor = themetechmount_get_option('secondarycolor');

/* Grey BG color */
$secondarygreycolor = themetechmount_get_option('secondary-greycolor');

/* Blackish Button Color */
$blackish_buttoncolor = themetechmount_get_option('blackish_buttoncolor');

/*
 *  Setting variables for different Theme Options
 */
$header_height        = themetechmount_get_option('header_height');
$first_menu_margin    = themetechmount_get_option('first_menu_margin');
$titlebar_height      = themetechmount_get_option('titlebar_height');
$header_height_sticky = themetechmount_get_option('header_height_sticky');
$center_logo_width    = themetechmount_get_option('center_logo_width');

$header_bg_color                   = themetechmount_get_option('header_bg_color');
$responsive_header_bg_custom_color = themetechmount_get_option('responsive_header_bg_custom_color');
$header_bg_custom_color            = themetechmount_get_option('header_bg_custom_color');
$sticky_header_bg_color            = themetechmount_get_option('sticky_header_bg_color');
$sticky_header_bg_custom_color     = themetechmount_get_option('sticky_header_bg_custom_color');
$sticky_header_bg_color            = ( empty($sticky_header_bg_color) ) ? $header_bg_color : $sticky_header_bg_color ;
$sticky_header_bg_custom_color     = ( empty($sticky_header_bg_custom_color) ) ? $header_bg_custom_color : $sticky_header_bg_custom_color ;

$sticky_header_menu_bg_color        = themetechmount_get_option('sticky_header_menu_bg_color');
$sticky_header_menu_bg_custom_color = themetechmount_get_option('sticky_header_menu_bg_custom_color');

$general_font = themetechmount_get_option('general_font');


$titlebar_bg_color          = themetechmount_get_option('titlebar_bg_color');
$titlebar_bg_custom_color   = themetechmount_get_option('titlebar_bg_custom_color');
$titlebar_text_color        = themetechmount_get_option('titlebar_text_color');
$titlebar_text_custom_color = themetechmount_get_option('titlebar_heading_font', 'color');
$titlebar_subheading_text_custom_color = themetechmount_get_option('titlebar_subheading_font', 'color');
$titlebar_breadcrumb_text_custom_color = themetechmount_get_option('titlebar_breadcrumb_font', 'color');
$breadcum_bg_color    = themetechmount_get_option('breadcum_bg_color');
$breadcum_bg_custom_color    = themetechmount_get_option('breadcrumb_bg_custom_color');

$topbar_text_color        = themetechmount_get_option('topbar_text_color');
$topbar_text_custom_color = themetechmount_get_option('topbar_text_custom_color');
$topbar_bg_color          = themetechmount_get_option('topbar_bg_color');
$topbar_bg_custom_color   = themetechmount_get_option('topbar_bg_custom_color');
$topbar_text_fontsize		= themetechmount_get_option('topbar_text_fontsize');
$topbar_breakpoint        = themetechmount_get_option('topbar-breakpoint');
$topbar_breakpoint_custom = themetechmount_get_option('topbar-breakpoint-custom');


$mainmenufont            = themetechmount_get_option('mainmenufont');
$mainMenuFontColor       = $mainmenufont['color'];
$stickymainmenufontcolor = themetechmount_get_option('stickymainmenufontcolor');
$stickymainmenufontcolor = ( empty($stickymainmenufontcolor) ) ? $mainmenufont['color'] : $stickymainmenufontcolor ;

$dropdownmenufont = themetechmount_get_option('dropdownmenufont');

$mainmenu_active_link_color        = themetechmount_get_option('mainmenu_active_link_color');
$mainmenu_active_link_custom_color = themetechmount_get_option('mainmenu_active_link_custom_color');
$dropmenu_active_link_color        = themetechmount_get_option('dropmenu_active_link_color');
$dropmenu_active_link_custom_color = themetechmount_get_option('dropmenu_active_link_custom_color');

$dropmenu_background = themetechmount_get_option('dropmenu_background');

$logoMaxHeight       = themetechmount_get_option('logo_max_height');
$logoMaxHeightSticky = themetechmount_get_option('logo_max_height_sticky');

$inner_background = themetechmount_get_option('inner_background');

$headerbg_color       = themetechmount_get_option('header_bg_color');
$headerbg_customcolor = themetechmount_get_option('header_bg_custom_color');

$header_menu_bg_color        = themetechmount_get_option('header_menu_bg_color');
$header_menu_bg_custom_color = themetechmount_get_option('header_menu_bg_custom_color');


$menu_breakpoint        = themetechmount_get_option('menu_breakpoint');
$menu_breakpoint_custom = themetechmount_get_option('menu_breakpoint-custom');

$breakpoint = $menu_breakpoint;
$breakpoint = ( $menu_breakpoint=='custom' && !empty($menu_breakpoint_custom) ) ? $menu_breakpoint_custom : $breakpoint ;

$logo_font = themetechmount_get_option('logo_font');

$loaderimg          = themetechmount_get_option('loaderimg');
$loaderimage_custom = themetechmount_get_option('loaderimage_custom');

$fbar_breakpoint        = themetechmount_get_option('floatingbar-breakpoint');
$fbar_breakpoint_custom = themetechmount_get_option('floatingbar-breakpoint-custom');

$logo_box_bgcolor          = themetechmount_get_option('logo_box_bgcolor');

$floating_text_height       = themetechmount_get_option('header_floating_area_height');
$footer_cta_bg_color    = themetechmount_get_option('footer_cta_bg_color');
$footer_cta_bg_custom_color   = themetechmount_get_option('footer_cta_bg_custom_color');

$button_topbottom_padding	= themetechmount_get_option('button_topbottom_padding');
$medium_button_fontsize		= themetechmount_get_option('medium_button_fontsize');

/* Gradient Color */
$show_gradientcolor = themetechmount_get_option('gradient_color_show');
$first_gradientcolor = themetechmount_get_option('gradient_color_one');
$second_gradientcolor = themetechmount_get_option('gradient_color_two');


$subheading_font     	= themetechmount_get_option('subheading_font');
$subheading_fontColor   = $subheading_font['color'];

$special_element_font  = themetechmount_get_option('element_title');
$special_element_fontfamily   = $special_element_font['family'];
$special_element_fontweight   = $special_element_font['variant'];

$widget_font_font  = themetechmount_get_option('widget_font');
$widget_font_fontweight   = $widget_font_font['variant'];

if( $special_element_fontweight == 'regular' ){
	$special_element_fontweight  = '400';
}
if( $widget_font_fontweight == 'regular' ){
	$widget_font_fontweight  = '400';
}

$bodyptagelement_font  = themetechmount_get_option('general_font');
$bodyptagelement_fontfamily  = $bodyptagelement_font['family'];

/* Output start
------------------------------------------------------------------------------*/ ?>

<?php
/* Custom CSS Code at top */
$custom_css_code_top = themetechmount_get_option('custom_css_code_top');
if( !empty($custom_css_code_top) ){
	echo do_shortcode($custom_css_code_top);
}
?>

/*------------------------------------------------------------------
* dynamic-style.php index *
[Table of contents]

1.  Background color
2.  Topbar Background color
3.  Element Border color
4.  Textcolor
5.  Boxshadow
6.  Header / Footer background color
7.  Footer background color
8.  Logo Color
9.  Genral Elements
10. "Center Logo Between Menu" options
11. Floating Bar
-------------------------------------------------------------------*/

:root {
  --tm-skincolor-bg:<?php echo esc_attr($skincolor); ?>;
  --tm-secondary-bg:<?php echo esc_attr($secondarycolor); ?>;
  --tm-greycolor-bg:<?php echo esc_attr($secondarygreycolor); ?>;
  --tm-skincolor-text:<?php echo esc_attr($skincolor); ?>;
  --tm-secondary-text:<?php echo esc_attr($secondarycolor); ?>;
  --body-fonts-color:<?php echo esc_attr($general_font['color']); ?>;
  --body-blackfont-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
  --border-radius:<?php echo esc_attr($global_button_shape); ?>;
}

/**
 * 0. Background properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themetechmount_get_all_background_css());
?>

/* Font properties */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themetechmount_get_all_font_css());
?>
/* Text link and hover color properties */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themetechmount_a_color());
?>
<?php
if( $header_bg_color=='custom' && !empty($header_bg_custom_color) ){
	?>
/* Header bg color */
	.site-header.tm-bgcolor-custom:not(.is_stuck),
	.tm-header-style-classic-box.tm-header-overlay .site-header.tm-bgcolor-custom:not(.is_stuck) .tm-container-for-header{
		background-color:<?php echo esc_attr($header_bg_custom_color); ?> !important;
	}
	<?php
}
?>
<?php
if( $sticky_header_bg_color=='custom' && !empty($sticky_header_bg_custom_color) ){
	?>
/* Sticky header bg color */
	.is_stuck.site-header.tm-sticky-bgcolor-custom{
		background-color:<?php echo esc_attr($sticky_header_bg_custom_color); ?> !important;
	}
	<?php
}
?>
<?php
if( $header_menu_bg_color=='custom' && !empty($header_menu_bg_custom_color) ){
	?>
/* header menu bg color  */
	.tm-header-menu-bg-color-custom {
		background-color:<?php echo esc_attr($header_menu_bg_custom_color); ?>;
	}
	<?php
}
?>
/* Sticky menu bg color */
<?php
if( $sticky_header_menu_bg_color=='custom' && !empty($sticky_header_menu_bg_custom_color) ){
	?>
	.is_stuck.tm-sticky-bgcolor-custom,
	.is_stuck .tm-sticky-bgcolor-custom {
		background-color:<?php echo esc_attr($sticky_header_menu_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/* breadcum bg color */
<?php
if( $breadcum_bg_color=='custom' && !empty($breadcum_bg_custom_color) ){
	?>
	
	.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar .breadcrumb-wrapper .container,
	.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .breadcrumb-wrapper .container:before, 
	.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .breadcrumb-wrapper .container:after {
		background-color:<?php echo esc_attr($breadcum_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/* Footer CTA bg color */
<?php
if( $footer_cta_bg_color=='custom' && !empty($footer_cta_bg_custom_color) ){
	?>
	.site-footer .tm-footer-cta-wrapper.tm-bgcolor-custom{
		background-color:<?php echo esc_attr($footer_cta_bg_custom_color); ?>;
	}
	<?php
}
?>

/* List style special style */
.wpb_row .vc_tta.vc_general.vc_tta-color-white:not(.vc_tta-o-no-fill) .vc_tta-panel-body .wpb_text_column, 
.tm-list.tm-list-icon-color- li,
.tm-list-li-content{
	color:<?php echo esc_attr($general_font['color']); ?>;
}
/* Page loader css */
<?php echo themetechmount_get_page_loader_css(); ?>

/* Floating bar */
<?php echo themetechmount_floatingbar_inline_css(); ?>

/**
 * 1. Background color
 * ----------------------------------------------------------------------------
 */ 
 
.ttm-pricetable-column-w.tm-ptablebox-featured-col .tm-ptablebox .tm-ptablebox-content:before,
.sidebar .widget.fablio_category_list_widget ul>li a:hover:before, 
.sidebar .widget.fablio_all_post_list_widget ul>li a:hover:before,
.tm-heading-highlight,
.tm-quote-form input[type="submit"]:hover,
.tm-processbox-wrapper .tm-processbox .process-num span:before,
.tm-iconbox-hoverstyle .tm-sbox:hover,
.steps-style2 .tm-static-steps-num span,
.tm-fidbox-custom-style2.tm-fid-without-icon.inside,
.tm-ptablebox .themetechmount-ptable-icon:before,
.ttm-pricetable-column-w:hover .tm-ptablebox .tm-vc_btn3-container.tm-vc_btn3-inline:before,

.themetechmount-teambox-style1 .themetechmount-team-icon,

.steps-style5:hover .tm-static-steps-num span,

/*Heading Seperator Style*/

.tm-seperator-solid:not(.tm-heading-style-horizontal) .tm-vc_general.tm-vc_cta3 .tm-vc_cta3-content-header:after,

.slick-dots li.slick-active button,
.widget.fablio_category_list_widget li.current-cat a:after,
.widget.fablio_category_list_widget li a:hover:after, 
.widget.fablio_all_post_list_widget li.tm-post-active a:after,
.widget.fablio_all_post_list_widget li a:hover:after, 
.widget.tm_widget_nav_menu li.current_page_item a:after,
.widget.tm_widget_nav_menu li a:hover:after,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:after,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover:after,
#totop,
.tm-site-searchform button,

.main-holder .rpt_style_basic .rpt_recommended_plan.rpt_plan .rpt_head,
.main-holder .rpt_style_basic .rpt_recommended_plan.rpt_plan .rpt_title,

.tm-row .vc_toggle_color_skincolor.vc_toggle_round.vc_toggle.vc_toggle_active .vc_toggle_title .vc_toggle_icon:before,
.tm-row .vc_toggle_color_skincolor.vc_toggle.vc_toggle_active .vc_toggle_title,
.mc_form_inside .mc_merge_var:after,
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon, 
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:before, 
.vc_toggle_round.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_round.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_round.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_rounded.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_square.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_title:hover .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:before,

/*Woocommerce Section*/
.woocommerce .main-holder #content .woocommerce-error .button:hover, 
.woocommerce .main-holder #content .woocommerce-info .button:hover, 
.woocommerce .main-holder #content .woocommerce-message .button:hover,

.sidebar .widget .tagcloud a:hover,
.woocommerce .widget_shopping_cart a.button:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.main-holder .site table.cart .coupon button:hover,
.main-holder .site .woocommerce-cart-form__contents button:hover,
.woocommerce .woocommerce-form-login .woocommerce-form-login__submit:hover,
.main-holder .site .return-to-shop a.button:hover,
.main-holder .site .woocommerce-MyAccount-content a.woocommerce-Button:hover,
.main-holder .site-content #review_form #respond .form-submit input:hover,
.woocommerce div.product form.cart .button:hover,
table.compare-list .add-to-cart td a:hover,
.woocommerce-cart #content table.cart td.actions input[type="submit"]:hover,
.main-holder .site .woocommerce-form-coupon button:hover,
.main-holder .site .woocommerce-form-login button.woocommerce-Button:hover,
.main-holder .site .woocommerce-ResetPassword button.woocommerce-Button:hover,
.main-holder .site .woocommerce-EditAccountForm button.woocommerce-Button:hover,

.single .main-holder div.product .woocommerce-tabs ul.tabs li.active,
.main-holder .site table.cart .coupon input:hover,
.woocommerce #payment #place_order:hover,
.wishlist_table td.product-price ins,
.widget .product_list_widget ins,
.woocommerce .widget_shopping_cart a.button.checkout,
.woocommerce .wishlist_table td.product-add-to-cart a,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.main-holder .site-content nav.woocommerce-pagination ul li .page-numbers.current, 
.main-holder .site-content nav.woocommerce-pagination ul li a:hover, 
 
.sidebar .widget .tagcloud a:hover,
.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md.tm-vc_btn3-icon-left:not(.tm-vc_btn3-o-empty) .tm-vc_btn3-icon,

.top-contact.tm-highlight-left:after,
.top-contact.tm-highlight-right:after,
.tm-social-share-links ul li a:hover,

article.post .more-link-wrapper a.more-link,
.themetechmount-blog-box-view-right-image .themetechmount-box-content .tm-post-categories>.tm-meta-line.cat-links a:hover,
.themetechmount-blog-box-view-left-image .themetechmount-box-content .tm-post-categories>.tm-meta-line.cat-links a:hover,

.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-flat,
.tm-sortable-list .tm-sortable-link a.selected,
.tm-sortable-list .tm-sortable-link a:hover,

.tm-col-bgcolor-skincolor .tm-bg-layer-inner,
.tm-bg .tm-bgcolor-skincolor > .tm-bg-layer,
.tm-bgcolor-skincolor > .tm-bg-layer,
footer#colophon.tm-bgcolor-skincolor > .tm-bg-layer,
.tm-titlebar-wrapper.tm-bgcolor-skincolor .tm-titlebar-wrapper-bg-layer,
.themetechmount-iconbox-stylefour:not(.styletwelve):not(.style15):hover .themetechmount-iconbox-icon .tm-box-icon,
/* Events Calendar */
.themetechmount-post-item-inner .tribe-events-event-cost,
.tribe-events-day .tribe-events-day-time-slot h5,
.tribe-events-button, 
#tribe-events .tribe-events-button, 
.tribe-events-button.tribe-inactive, 
#tribe-events .tribe-events-button:hover, 
.tribe-events-button:hover, 
.tribe-events-button.tribe-active:hover,
.single-tribe_events .tribe-events-schedule .tribe-events-cost,
.tribe-events-list .tribe-events-event-cost span,
#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
#tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, 
#tribe_events_filters_wrapper input[type=submit], 
.tribe-events-button, .tribe-events-button.tribe-active:hover, 
.tribe-events-button.tribe-inactive, .tribe-events-button:hover, 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,
.themetechmount-box-blog .themetechmount-box-content .themetechmount-box-post-date:after,
article.themetechmount-box-blog-classic .themetechmount-post-date-wrapper,

body .datepicker table tr td span.active.active, 
body .datepicker table tr td.active.active,
.datepicker table tr td.active.active:hover, 
.datepicker table tr td span.active.active:hover,

.widget .widget-title::before,

.datepicker table tr td.day:hover, 
.datepicker table tr td.day.focused,

.tm-bgcolor-skincolor.tm-rowborder-topcross:before,
.tm-bgcolor-skincolor.tm-rowborder-bottomcross:after,
.tm-bgcolor-skincolor.tm-rowborder-topbottomcross:before,
.tm-bgcolor-skincolor.tm-rowborder-topbottomcross:after,

/* Testimonals */
.themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-title:after,

/*Iconbox element*/
.themetechmount-iconbox.themetechmount-iconbox-styleone:before,
.themetechmount-iconbox.themetechmount-iconbox-styleone .box-plus-icon,
.themetechmount-iconbox.themetechmount-iconbox-stylethree:hover .themetechmount-iconbox-inner .themetechmount-iconbox-button .tm-vc_btn3-container:before,
.themetechmount-iconbox-stylefive .themetechmount-iconbox-icon:before,

/* Tourtab with image */
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-left.vc_tta-style-outline .vc_tta-tab>a:hover,
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-left.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-right.vc_tta-style-outline .vc_tta-tab>a:hover,
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-right.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.wpb-js-composer .tm-tourtab-round.vc_tta.vc_general .vc_active .vc_tta-panel-title a, 
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus,
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover,

/* pricetable */
.tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3.tm-vc_btn3-color-white,

.themetechmount-servicebox-styleone .themetechmount-box-bottom-content:before,
.themetechmount-teambox-style2 ul.tm-team-social-links,
.steps-style1 .tm-static-steps-num span,
.tm-arrow-style2 .slick-dots li.slick-active,
.themetechmount-iconbox-styleeight:hover,
.mailchimp-inputbox button[type="submit"],
.themetechmount-blogbox-style4 .tm-posted-date,
article.themetechmount-box-blog-classic .tm-blog-classic-box-content .tm-posted-date,

.vc_progress_bar.vc_progress-bar-color-white .vc_single_bar .vc_bar:after,
/* Widget Border style */
.site-footer .widget .tm-contactbox .tm-square-iconbox i,
.sidebar .widget-title:before,
.steps-style5 .tm-static-steps-num:before,
.themetechmount-box-blog.themetechmount-blogbox-styleone .tm-postcategory .cat-links a,
.tm-heading-rotate .tm-custom-heading,
.slick-dots li.slick-active button,
.themetechmount-boxes-portfolio .themetechmount-boxes-row-wrapper .slick-prev:after,
.themetechmount-boxes-portfolio .themetechmount-boxes-row-wrapper .slick-next:after,
.slick-dots li.slick-active button,
.themetechmount-iconbox.themetechmount-iconbox-style20 .themetechmount-iconbox-button a:after, .tm-btn-size .tm-vc_btn3.tm-vc_btn3-size-lg.tm-vc_btn3-style-text:after, .themetechmount-box-testimonial.themetechmount-testimonialbox-stylefive .themetechmount-box-content .themetechmount-box-author .themetechmount-box-title:before, .themetechmount-box-blog.themetechmount-blogbox-top-image .themetechmount-blogbox-footer-left a, .tm-btn-style .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md:after {
	background-color: <?php echo esc_attr($skincolor); ?>;
}



/* secondary bg color */
.newsletter-subsc-box input[type="email"],
.themetechmount-iconbox-style19:hover .tm-box-icon:before,
.themetechmount-iconbox-style18:before,
.main-holder .site-content ul.products li.product:hover .tm-product-box-inner:before,
.themetechmount-iconbox-style16 .themetechmount-iconbox-icon:before,
.themetechmount-iconbox-stylethree .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md.tm-vc_btn3-icon-right:not(.tm-vc_btn3-o-empty) .tm-vc_btn3-icon,
.themetechmount-iconbox-stylethree .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md.tm-vc_btn3-icon-right:not(.tm-vc_btn3-o-empty):hover:after,
.themetechmount-iconbox.tm-highlight-sliderbox,
.themetechmount-servicebox-styletwo .tm-featured-wrapper:before,
.widget .tm-custom-ctabox.tm-withbg-box:before,
.imagestyle-one .tm-highlight-box,
.themetechmount-servicebox-stylefour .themetechmount-box-bottom-content .tm-sbox-moreicon:hover,
body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover, body .booked-modal input[type=submit].button-primary:hover,
.themetechmount-teambox-style2 .themetechmount-team-image-box:before,
.themetechmount-sidebar-social li > a:hover,
.themetechmount-boxes-service .row.themetechmount-boxes-row-wrapper .tm-box-col-wrapper:nth-child(even) .themetechmount-servicebox-stylefour .themetechmount-post-item .themetechmount-box-bottom-content,
.themetechmount-ptables-w .ttm-pricetable-column-w.tm-ptablebox-featured-col .tm-vc_btn3.tm-vc_btn3-color-black:hover,
.twentytwenty-handle,
.site-header.tm-sticky-bgcolor-darkgrey.is_stuck,
.tm-header-overlay .site-header.tm-sticky-bgcolor-darkgrey.is_stuck,
.site-header-menu.tm-sticky-bgcolor-darkgrey.is_stuck,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-darkgrey .tm-titlebar .breadcrumb-wrapper .container,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-darkgrey  .breadcrumb-wrapper .container:before,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-darkgrey .breadcrumb-wrapper .container:after,
.tm-header-style-infostack .site-header .tm-stickable-header.is_stuck.tm-sticky-bgcolor-darkgrey,
.tm-header-style-infostack .site-header-menu .is_stuck .tm-sticky-bgcolor-darkgrey,
.tm-header-style-infostack .is_stuck.tm-sticky-bgcolor-darkgrey,
.tm-header-style-infostack .tm-bgcolor-darkgrey,
.themetechmount-topbar-wrapper.tm-bgcolor-darkgrey,
.tm-bg-highlight-dark,
.tm-col-bgcolor-darkgrey .tm-bg-layer-inner,
.tm-bgcolor-darkgrey,
.tm-bg.tm-bgcolor-darkgrey .tm-bg-layer,
.tm-col-bgcolor-darkgrey.tm-col-bgimage-yes .tm-bg-layer-inner,
.tm-bgcolor-darkgrey.tm-bg.tm-bgimage-yes > .tm-bg-layer-inner {
	background-color: <?php echo esc_attr($secondarycolor); ?>;
}

.tm-bgcolor-skincolor.tm-textcolor-dark .inside.tm-fid-view-topicon h4:after,
.tm-textcolor-dark .inside.tm-fid-view-topicon h4:after,
.tm-darkiconbg-box .themetechmount-iconbox-icon .tm-box-icon{
	background-color: <?php echo esc_attr($secondarycolor); ?> !important;
}

.tm-bgcolor-skincolor.tm-textcolor-dark .tm-fid-with-icon.tm-fid-view-topicon .tm-fid-icon-wrapper i,
.tm-textcolor-dark .tm-fid-with-icon.tm-fid-view-topicon .tm-fid-icon-wrapper i,
.themetechmount-iconbox.tm-highlight-sliderbox .tm-box-icon i,
.themetechmount-box-service .themetechmount-serviceboxbox-readmore a:hover,
.steps-style5 .tm-static-steps-num span {
	color: <?php echo esc_attr($secondarycolor); ?>;
}
.themetechmount-box-portfolio .themetechmount-overlay {
	background-color: rgba( <?php echo themetechmount_hex2rgb($secondarycolor); ?>,0.70);
}
.themetechmount-portfoliobox-style2 .themetechmount-box-overlay {
	background-color: rgba( <?php echo themetechmount_hex2rgb($secondarycolor); ?>,0.80);
}
.themetechmount-portfoliobox-style3 .themetechmount-post-overlay:after, .themetechmount-portfoliobox-style3 .themetechmount-post-overlay:before {
	background-color: rgba( <?php echo themetechmount_hex2rgb($secondarycolor); ?>,0.70);
}

.tm-textcolor-dark .tm-fid-with-icon.tm-fid-view-topicon .tm-fid-icon-wrapper {
	border-color: <?php echo esc_attr($secondarycolor); ?>;
}


.themetechmount-iconbox.tm-iconbg-grey .tm-iconstyle-boxed .tm-box-icon,
.themetechmount-blogbox-styletwo .themetechmount-box-desc,
.tm-pf-single-content-wrapper .themetechmount-pf-single-detail-box,
.sidebar .widget,
.themetechmount-iconbox.themetechmount-iconbox-styleone .tm-box-icon:before,
.tm-header-style-infostack .kw-phone .social-icons li > a,
.tm-pageslider-yes .tm-header-style-classic-box .tm-header-block:before,
.tm-social-share-links ul li a,
.themetechmount-iconbox.themetechmount-iconbox-stylenine .tm-iconstyle-rounded .tm-box-icon,
.tm-quote-form input[type="text"], .tm-quote-form input[type="email"], .tm-quote-form textarea,
.single article.post blockquote,
.themetechmount-iconbox.tm-iconbg-grey .tm-iconstyle-rounded .tm-box-icon,
.workhour-style2 ul.tm-pricelist-block li:nth-child(even),
.sidebar .widget_product_categories li span, .sidebar .widget_categories li span,
.comment-body,
.single-tm_team_member .tm-team-social-links-wrapper ul li a,
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,
.themetechmount-teambox-style1 .themetechmount-box-content,
.tm-ptablebox .tm-ptablebox-content:before,
#add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment,
.woocommerce-account .woocommerce-MyAccount-navigation li a, .widget.tm_widget_nav_menu li a, .widget.fablio_all_post_list_widget li a, .widget.fablio_category_list_widget li a,
.sidebar .widget_product_categories li span, .sidebar .widget_categories li span,
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-grey.tm-vc_icon_element-background,
.widget .tm-author-widget,
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a,
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab>a,
.author-info,
.themetechmount-fbar-position-right .themetechmount-fbar-btn a.grey,
.tm-col-bgcolor-grey .tm-bg-layer-inner,
.tm-bgcolor-grey,
.site-header.tm-sticky-bgcolor-grey.is_stuck,
.site-header-menu.tm-sticky-bgcolor-grey.is_stuck,
.tm-header-overlay .site-header.tm-sticky-bgcolor-grey.is_stuck,
.tm-header-style-infostack .site-header .tm-stickable-header.is_stuck.tm-sticky-bgcolor-grey,
.tm-header-style-infostack .site-header-menu .is_stuck .tm-sticky-bgcolor-grey,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-grey .tm-titlebar .breadcrumb-wrapper .container,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-grey  .breadcrumb-wrapper .container:before,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-grey .breadcrumb-wrapper .container:after,
.tm-col-bgcolor-grey > .tm-bg-layer-inner,
.steps-style5 .tm-static-steps-num span,
.tm-bg.tm-bgcolor-grey > .tm-bg-layer,
.steps-style5 .tm-static-steps-num:after {
	background-color: <?php echo esc_attr($secondarygreycolor); ?>;
}

.comment-body:after, .comment-body:before {
	border-color: transparent <?php echo esc_attr($secondarygreycolor); ?> transparent <?php echo esc_attr($secondarygreycolor); ?>;
}
.main-holder #content.site-content ul.products li.product .tm-product-box-inner {
	border-color: <?php echo esc_attr($secondarygreycolor); ?>;
}


/* Drop cap */
.tm-dcap-color-skincolor,

/* Slick Slider */
.themetechmount-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover,

/* Progress Bar */
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar,
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor .vc_bar,
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar:after,

/* Sidebar */
.sidebar .widget .widget-title:before,
.widget .widget-title:after,
.footer .widget .widget-title:after,

.woocommerce-account .woocommerce-MyAccount-navigation li a:before,
.widget.tm_widget_nav_menu li a:before,
.widget.fablio_all_post_list_widget li a:before,
.widget.fablio_category_list_widget li a:before,

/* Global Input Button */
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,

.tm-col-bgcolor-darkgrey .wpcf7 .tm-bookappointmentform input[type="submit"]:hover, 
.tm-row-bgcolor-darkgrey .wpcf7 .tm-bookappointmentform input[type="submit"]:hover, 	

/* Testimonials Section */
.themetechmount-box-view-default .themetechmount-box-author .themetechmount-box-img .themetechmount-icon-box,

.tm-cta3-only.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-3d,

/* Servicebox section */
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:focus, 
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:hover,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-outline:hover,
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-skincolor.tm-vc_icon_element-background,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor,
.single-tm_portfolio .nav-next a:hover, .single-tm_portfolio .nav-previous a:hover,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-3d.tm-vc_btn3-color-inverse:hover,
.tm-bgcolor-skincolor,

.tm-header-overlay .site-header.tm-sticky-bgcolor-skincolor.is_stuck,
.site-header-menu.tm-sticky-bgcolor-skincolor.is_stuck,
.tm-header-style-infostack .site-header .tm-stickable-header.is_stuck.tm-sticky-bgcolor-skincolor,
.is_stuck.tm-sticky-bgcolor-skincolor,
.tm-header-style-infostack .site-header-menu .tm-stickable-header.is_stuck .tm-sticky-bgcolor-skincolor,

/* Blog section */
.themetechmount-box-view-overlay .themetechmount-boxes .themetechmount-box-content.themetechmount-overlay .themetechmount-icon-box a:hover,
.themetechmount-post-box-icon-wrapper,
.themetechmount-pagination .page-numbers.current, 
.themetechmount-pagination .page-numbers:hover,

/*Search Result Page*/
.tm-sresults-title small a,
.tm-sresult-form-wrapper,

/*Pricing Table*/
.main-holder .rpt_style_basic .rpt_recommended_plan .rpt_title,
.main-holder .rpt_4_plans.rpt_style_basic .rpt_plan.rpt_recommended_plan,

/*bbpress*/
#bbpress-forums button,
#bbp_search_submit,
#bbpress-forums ul li.bbp-header,

/* square social icon */
.tm-square-social-icon .themetechmount-social-links-wrapper .social-icons li a:hover,

.inside.tm-fid-view-topicon h3:after,

.themetechmount-servicebox-styletwo .tm-service-iconbox .tm-service-icon-dots:before,
.themetechmount-box-service .tm-seperator:after,

.themetechmount-teambox-style1 .tm-team-social-links-wrapper ul li a:hover,
.tm-processbox-wrapper.processbox-style2 .tm-processbox .process-num,
/*blog top-bottom content */
.themetechmount-box-blog.themetechmount-box-blog-classic .themetechmount-post-date-wrapper,
.entry-content .page-links>span:not(.page-links-title),
.entry-content .page-links a:hover,
mark,
.tm-steps-box.steps-style5:hover .tm-steps-desc, 
ins{
	background-color: <?php echo esc_attr($skincolor); ?> ;
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-color-white.vc_tta-style-modern .vc_tta-panel.vc_active .vc_tta-panel-heading{
	background-color: <?php echo esc_attr($skincolor); ?> !important ;
}


/* Revolution button */
.Sports-Button-skin{
	background-color: <?php echo esc_attr($skincolor); ?> !important ;
    border-color: <?php echo esc_attr($skincolor); ?> !important ;
}
.Sports-Button-skin:hover{
	background-color: #202020 !important;
    border-color: #202020 !important;
}
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading{
    background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.89);
}

.tm-processbox-wrapper .tm-processbox .process-num:before {
    background-color:rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.25);
}
.tm-cta3-only.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-3d,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-3d.tm-vc_btn3-color-skincolor{
	box-shadow: 0 5px 0 <?php echo themetechmount_adjustBrightness($skincolor, -30); ?>;
}
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:focus, 
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:hover{   
    box-shadow: 0 2px 0 <?php echo themetechmount_adjustBrightness($skincolor, -30); ?>;
}


/* This is Titlebar Background color */
<?php if( $titlebar_bg_color=='custom' && !empty($titlebar_bg_custom_color['rgba']) ) : ?>
.tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	background-color: <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
.tm-titlebar-wrapper{
	background-color:  <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
<?php endif; ?>
.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr( $header_height); ?>px;
}
.tm-header-style-classic-box.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	padding-top:0px;
}

/* This is Titlebar Text color */
<?php if( $titlebar_text_color=='custom' && !empty($titlebar_text_custom_color) ): ?>
.tm-titlebar-wrapper .tm-titlebar-main h1.entry-title{
	color: <?php echo esc_attr($titlebar_text_custom_color); ?> !important;
}
.tm-titlebar-wrapper .tm-titlebar-main h3.entry-subtitle{
	color: <?php echo esc_attr($titlebar_subheading_text_custom_color); ?> !important;
}
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar .breadcrumb-wrapper .container,
.tm-titlebar-main .breadcrumb-wrapper, .tm-titlebar-main .breadcrumb-wrapper a:hover{ /* Breadcrumb */
	color: rgba( <?php echo themetechmount_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
.tm-titlebar-main .breadcrumb-wrapper a{ /* Breadcrumb */
	color: rgba( <?php echo themetechmount_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
<?php endif; ?>

.tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	height: <?php echo esc_attr($titlebar_height); ?>px;	
}
.tm-header-overlay .themetechmount-titlebar-wrapper .tm-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr(($header_height+30)); ?>px;
}
.themetechmount-header-style-3.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	padding-top: <?php echo esc_attr(($header_height+55)) ?>px;
}

/* Logo Max-Height */
.headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeight); ?>px;
}
.is_stuck .headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeightSticky); ?>px;
}

/* Extra Code */
span.tm-sc-logo.tm-sc-logo-type-image {
    position: relative;
	display: block;
}
img.themetechmount-logo-img.stickylogo {
    position: absolute;
    top: 0;
    left: 0;
}
.tm-stickylogo-yes .standardlogo{
	opacity: 1;
}
.tm-stickylogo-yes .stickylogo{
	opacity: 0;
}
.is_stuck .tm-stickylogo-yes .standardlogo{
	opacity: 0;
}
.is_stuck .tm-stickylogo-yes .stickylogo{
	opacity: 1;
}
.tm-btn-shape-square.elementor-element.elementor-widget-button .elementor-button,
.tm-vc_btn3.tm-vc_btn3-size-md{
    padding-top:<?php echo esc_attr($button_topbottom_padding); ?>px;
    padding-bottom:<?php echo esc_attr($button_topbottom_padding); ?>px;
}


.themetechmount-iconbox .tm-vc_btn3-container a,.elementor-element.elementor-widget-button .elementor-button,
.themetechmount-box-blog.themetechmount-blog-box-view-left-image .themetechmount-blogbox-footer-left a,
.themetechmount-blogbox-styletwo .themetechmount-blogbox-footer-left a,
button, input[type="submit"], input[type="button"], input[type="reset"], .checkout_coupon input.button, .woocommerce div.product form.cart .button, table.compare-list .add-to-cart td a, .woocommerce .widget_shopping_cart a.button, .woocommerce #review_form #respond .form-submit input, .main-holder .site table.cart .coupon input, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart #content table.cart td.actions input[type="submit"], .woocommerce #payment #place_order, .woocommerce .wishlist_table td.product-add-to-cart a,.main-holder .site .return-to-shop a.button,
.themetechmount-box-blog .themetechmount-blogbox-footer-readmore a,
.themetechmount-box-blog.themetechmount-blogbox-styleone .themetechmount-blogbox-footer-readmore a,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.main-holder .site .woocommerce-cart-form__contents button,
.main-holder .site .woocommerce-cart-form__contents button.button:disabled[disabled],
.main-holder .site table.cart .coupon button,	
 .comment-respond .tm-vc_btn3.tm-vc_btn3-shape-square,
.single-tm_portfolio .navigation.post-navigation .nav-links  a,
.post.themetechmount-box-blog-classic .themetechmount-blogbox-footer-readmore a,
.themetechmount-iconbox-stylefour .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md,
.themetechmount-iconbox-styleeleven .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md,
.themetechmount-box-service .themetechmount-serviceboxbox-readmore a,
.tm-vc_btn3.tm-vc_btn3-size-md{
	font-size:<?php echo esc_attr($medium_button_fontsize); ?>px;
	line-height:<?php echo esc_attr($medium_button_fontsize); ?>px;
}
<?php $headerbgcolor = themetechmount_get_option('headerbgcolor');
if( !empty($headerbgcolor) ){ ?>
#stickable-header,
.themetechmount-header-style-4 #stickable-header .headercontent{
	background-color: <?php echo esc_attr( themetechmount_get_option('headerbgcolor') ); ?>;
}
<?php } ?>

<?php if( !empty($sticky_header_bg_color) && $sticky_header_bg_color=='custom' ){ ?>
.tm-header-overlay.themetechmount-header-style-4 .is-sticky #stickable-header,
.is-sticky #stickable-header{
	background-color: <?php echo esc_attr($sticky_header_bg_custom_color); ?>;
}
<?php } else { ?>
.tm-header-overlay.themetechmount-header-style-4 .is-sticky #stickable-header,
.is-sticky #stickable-header{
	background-color: <?php echo esc_attr($sticky_header_bg_color); ?>;
}
<?php } ?>


/**
 * 2. Topbar Background color
 * ----------------------------------------------------------------------------
 */
<?php if( $topbar_text_color=='custom' && !empty($topbar_text_custom_color) ): ?>
	.site-header .themetechmount-topbar{
		color: rgba( <?php echo themetechmount_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.themetechmount-topbar-textcolor-custom .social-icons li a{
		  border: 1px solid rgba( <?php echo themetechmount_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.site-header .themetechmount-topbar a{
		color: rgba( <?php echo themetechmount_hex2rgb($topbar_text_custom_color); ?> , 1);
	}
<?php endif; ?>

<?php if( $topbar_bg_color=='custom' && !empty($topbar_bg_custom_color) ) : ?>
	.site-header .themetechmount-topbar{
		background-color: <?php echo esc_attr($topbar_bg_custom_color); ?>;
	}
<?php endif; ?>

.top-contact {
	font-size:<?php echo esc_attr($topbar_text_fontsize); ?>px;
}
<?php

if( !empty($topbar_breakpoint) && trim($topbar_breakpoint)!='all' ){
	if( esc_attr($topbar_breakpoint)=='custom' ) {
		$topbar_breakpoint = ( !empty($topbar_breakpoint_custom) ) ?  trim($topbar_breakpoint_custom) : '1200' ;
	}

?>
	
/* Show/hide topbar in some devices */
	@media (max-width: <?php echo esc_attr($topbar_breakpoint); ?>px){
		.themetechmount-topbar-wrapper{
			display: none !important;
		}
	}

	<?php
}
?>


/**
 * 4. Border color
 * ----------------------------------------------------------------------------
 */
 

.footer .social-icons li > a:hover,
.themetechmount-box-service.themetechmount-service-box-view-without-image .tm-service-iconbox,
.tm-link-underline a,
.tm-iconbox-style2 .tm-sbox .tm-vc_cta3-container,
.tm-iconbox-style2 .tm-sbox:hover .tm-vc_cta3-container:after,
.tm-border-skincolor .vc_column-inner,
.slick-dots li.slick-active button:before,
.themetechmount-teambox-view-style2 .themetechmount-box-content:before,
.themetechmount-teambox-view-style2 .themetechmount-box-content:after,
.themetechmount-box-service .tm-seperator:before,
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon,

.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,

.vc_toggle_rounded.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,
.vc_toggle_rounded.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,

.vc_toggle_square.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,

.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,

.tm-cta3-only.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-outline,

.themetechmount-iconbox-styleeleven .themetechmount-iconbox-inner:before,
.main-holder .site #content table.cart td.actions .input-text:focus, 
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, input.input-text:focus, select:focus, 
blockquote,
.tm-process-content img,
.single-tm_portfolio .nav-next a:hover,
.single-tm_portfolio .nav-previous a:hover,
 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::before, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body:after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body:before,

.vc_tta-color-skincolor.vc_tta-style-outline .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:before,

/* testimonial */
.slick-center .testimonial_item .themetechmount-box-img img,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,  
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-outline,
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-skincolor.tm-vc_icon_element-outline,
.themetechmount-box-view-overlay .themetechmount-boxes .themetechmount-box-content.themetechmount-overlay .themetechmount-icon-box a:hover,
.slick-dots li.slick-active button:after
{
	border-color: <?php echo esc_attr($skincolor); ?>;
}

.tm-left-border-styleimg:after,
.themetechmount-fbar-position-default div.themetechmount-fbar-box-w{
	border-bottom-color: <?php echo esc_attr($skincolor); ?>;
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a{
	border-top-color: <?php echo esc_attr($skincolor); ?> !important; 
}
article.themetechmount-box-blog-classic,
.themetechmount-box-blog-classic .tm-post-format-icon-wrapper,
.themetechmount-box-blog .tm-post-format-icon-wrapper,
.themetechmount-box-blog.themetechmount-box-style2 .tm-post-format-icon-wrapper{
	border-top-color: <?php echo esc_attr($skincolor); ?> ; 
}


/**
 * 5. Textcolor
 * ----------------------------------------------------------------------------
 */
 
.themetechmount-iconbox.themetechmount-iconbox-stylenine.tm-iconbg-grey .tm-box-icon i,
.themetechmount-iconbox.tm-iconbg-grey .tm-iconstyle-boxed .tm-box-icon,
.themetechmount-iconbox-style17 .box-plus-icon a,
.tm-bgimage-yes .tm-fid-view-lefticon .tm-fid-icon-wrapper i,
.tm-col-bgcolor-darkgrey .tm-fid-view-lefticon .tm-fid-icon-wrapper i,
.tm-bgcolor-darkgrey .tm-fid-view-lefticon .tm-fid-icon-wrapper i,
.tm-fidbox-custom-style1.tm-fid-without-icon.inside h4,
.themetechmount-iconbox.tm-iconbg-grey .tm-iconstyle-rounded .tm-box-icon,
.themetechmount-iconbox.tm-iconbg-grey .tm-iconstyle-rounded .tm-box-icon i,
.themetechmount-box-service.themetechmount-service-box-view-without-image .tm-service-icon,
.tm-sbox.tm-sbox.tm-iconbox-content-padding a,
.tm-link-underline a,
.tm-underline-skintext u,
.tm-fid-without-icon.inside.tm-fidbox-style2 h4 span,
.tm-fid-view-lefticon.tm-highlight-fid .tm-fld-contents .tm-fid-inner,
.tm-service-topimage-style2 .themetechmount-service-box-view-top-image .themetechmount-serviceboxbox-readmore:hover:after,

.tm-bgcolor-darkgrey .tm-element-heading-wrapper .tm-vc_general.tm-vc_cta3.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-headers h4,
.tm-col-bgcolor-darkgrey .tm-element-heading-wrapper .tm-vc_general.tm-vc_cta3.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-headers h4,

.sidebar .widget a:hover,
.tm-textcolor-dark.tm-bgcolor-grey .tm-fbar-open-icon:hover,
.tm-textcolor-dark.tm-bgcolor-white .tm-fbar-open-icon:hover,

.tm-ptablebox .tm-ptablebox-price,

/*Iconbox element*/
.themetechmount-iconbox .tm-box-icon i,

/* Icon basic color */
.tm-icolor-skincolor,
.widget_calendar table td#today,
.vc_toggle_text_only.vc_toggle_color_skincolor .vc_toggle_title h4,

.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-outline .tm-vc_cta3-content-header,

section.error-404 .tm-big-icon,

.tm-bgcolor-darkgrey ul.fablio_contact_widget_wrapper li a:hover,
.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-classic .tm-vc_cta3-content-header, 
.tm-vc_icon_element-color-skincolor, 
 
.tm-bgcolor-skincolor .themetechmount-pagination .page-numbers.current, 
.tm-bgcolor-skincolor .themetechmount-pagination .page-numbers:hover,

.tm-bgcolor-darkgrey .themetechmount-twitterbox-inner .tweet-text a:hover,
.tm-bgcolor-darkgrey .themetechmount-twitterbox-inner .tweet-details a:hover,

.tm-dcap-txt-color-skincolor,

/* Accordion section */
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,

/* Global Button */ 
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-white:hover,

 /* Blog */
.comment-reply-link,
.single .tm-pf-single-content-area blockquote:before,
.single .tm-pf-single-content-wrapper blockquote:before,
article.themetechmount-blogbox-format-link .tm-format-link-title a:hover, 
article.post.format-link .tm-format-link-title a:hover,
.themetechmount-box-blog .themetechmount-blogbox-desc-footer a,
article.post .entry-title a:hover,
.themetechmount-meta-details a:hover,
.tm-entry-meta a:hover,
.tm-entry-meta .tm-meta-line i,
.post.themetechmount-box-blog-classic .themetechmount-blogbox-footer-readmore a:before,

 /* Team Member meta details */ 
.tm-extra-details-list .tm-team-extra-list-title,
.tm-team-member-single-meta-value a:hover,
.tm-team-member-single-category a:hover,
.tm-team-details-list .tm-team-list-value a:hover,
.themetechmount-teambox-style2 .themetechmount-box-social-links ul li a:hover,

 /* list style */ 
.tm-list-style-disc.tm-list-icon-color-skincolor li,
.tm-list-style-circle.tm-list-icon-color-skincolor li,
.tm-list-style-square.tm-list-icon-color-skincolor li,
.tm-list-style-decimal.tm-list-icon-color-skincolor li,
.tm-list-style-upper-alpha.tm-list-icon-color-skincolor li,
.tm-list-style-roman.tm-list-icon-color-skincolor li,
.tm-list.tm-skincolor li .tm-list-li-content,
 
/* Testimonials Section */
.tm-bgcolor-skincolor .themetechmount-box-view-default .themetechmount-box-author .themetechmount-box-img .themetechmount-icon-box, 
.testimonial_item .themetechmount-author-name,
.testimonial_item .themetechmount-author-name a,
.themetechmount-box-testimonial.tm-testimonial-box-view-style3 .themetechmount-author-name,
.themetechmount-box-testimonial.tm-testimonial-box-view-style3 .themetechmount-author-name a,
.tm-fablio-icon-star-1.tm-active,

.tm-textcolor-white a:hover, 

/* Tab content section */
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-tab>a:focus, 
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-tab>a:hover,
.tm-tourtab-style1.vc_general.vc_tta-tabs.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-title>a:hover, 

/* VCbutton section */
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-outline, 
.tm-vc_btn_skincolor.tm-vc_btn_outlined, .tm-vc_btn_skincolor.vc_btn_square_outlined, 

.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-skincolor,
.tm-fid-icon-wrapper i,
.inside.tm-fid-view-lefticon.tm-fid-view-lefticon-style2 h4,

/* Teammember section */
.themetechmount-box-team.themetechmount-box-view-overlay .themetechmount-box-content h4 a:hover,

.tm-textcolor-skincolor,
.tm-textcolor-skincolor a,
.themetechmount-box-title h4 a:hover,
.tm-textcolor-skincolor.tm-custom-heading,

.themetechmount-box-topimage .themetechmount-box-content .tm-social-share-wrapper .tm-social-share-links ul li a:hover,
.themetechmount-box-blog.themetechmount-box-topimage .themetechmount-box-title h4 a:hover,
.themetechmount-box-blog-classic .entry-header .tm-meta-line a:hover,
.themetechmount-blog-box-view-right-image .themetechmount-box-content .tm-post-categories>.tm-meta-line.cat-links a,
.themetechmount-blog-box-view-left-image .themetechmount-box-content .tm-post-categories>.tm-meta-line.cat-links a,

/* Text color skin in row secion*/
.tm-background-image.tm-row-textcolor-skin h1, 
.tm-background-image.tm-row-textcolor-skin h2, 
.tm-background-image.tm-row-textcolor-skin h3, 
.tm-background-image.tm-row-textcolor-skin h4, 
.tm-background-image.tm-row-textcolor-skin h5, 
.tm-background-image.tm-row-textcolor-skin h6,
.tm-background-image.tm-row-textcolor-skin .tm-element-heading-wrapper h2,
.tm-background-image.tm-row-textcolor-skin .themetechmount-testimonial-title,
.tm-background-image.tm-row-textcolor-skin a,
.tm-background-image.tm-row-textcolor-skin .item-content a:hover,

.tm-row-textcolor-skin h1, 
.tm-row-textcolor-skin h2, 
.tm-row-textcolor-skin h3, 
.tm-row-textcolor-skin h4, 
.tm-row-textcolor-skin h5, 
.tm-row-textcolor-skin h6,
.tm-row-textcolor-skin .tm-element-heading-wrapper h2,
.tm-row-textcolor-skin .themetechmount-testimonial-title,
.tm-row-textcolor-skin a,
.tm-row-textcolor-skin .item-content a:hover,

ul.fablio_contact_widget_wrapper.call-email-footer li:before,

/*Tweets*/
.widget_latest_tweets_widget p.tweet-text:before,

/*Events Calendar*/
.themetechmount-events-box-view-top-image-details .themetechmount-events-meta .tribe-events-event-cost,

/*Price table*/
.main-holder .rpt_style_basic .rpt_plan .rpt_head .rpt_recurrence,
.main-holder .rpt_style_basic .rpt_plan .rpt_features .rpt_feature:before,
.main-holder .rpt_style_basic .rpt_plan .rpt_head .rpt_price,

/*search result page*/
.tm-sresults-first-row .tm-list-li-content a:hover,
.tm-results-post ul.tm-recent-post-list > li > a:hover,
.tm-results-page .tm-list-li-content a:hover,
.tm-sresults-first-row ul.tm-recent-post-list > li > a:hover,

.tm-team-list-title i,
.tm-bgcolor-darkgrey .themetechmount-box-view-left-image .themetechmount-box-title a:hover,
.tm-team-member-view-wide-image .tm-team-details-list .tm-team-list-title,
.tm-bgcolor-skincolor .themetechmount-box-team .themetechmount-box-content h4 a:hover,
.tm-col-bgcolor-skincolor .themetechmount-box-team .themetechmount-box-content h4 a:hover,
.themetechmount-box-portfolio .themetechmount-box-content .themetechmount-box-title h4 a:hover,

/*woocommerce*/
.woocommerce-info:before,
.woocommerce-message:before,
.main-holder .site-content ul.products li.product .price,
.main-holder .site-content ul.products li.product .price ins,
.single .main-holder #content div.product .price ins,
.woocommerce .price .woocommerce-Price-amount,
.main-holder .site-content ul.products li.product h3:hover,
.main-holder .site-content ul.products li.product .woocommerce-loop-category__title:hover,

.tm-bgimage-yes .themetechmount-iconbox-stylesix .tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text:not(:hover),

/* Special Section */
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-color-white:not(.tm-vc_icon_element-background-color-skincolor):hover .tm-vc_icon_element-icon,
body.wpb-js-composer .vc_tta-color-black.vc_tta-style-outline .vc_tta-tab.vc_active>a,
body.wpb-js-composer .vc_tta-color-black.vc_tta-style-outline .vc_tta-tab>a:focus,
body.wpb-js-composer .vc_tta-color-black.vc_tta-style-outline .vc_tta-tab>a:hover,
.themetechmount-iconbox-styleeight .box-more-icon a:hover,
.steps-style4 .tm-static-steps-num span,
.imagestyle-one .tm-highlight-box h4,
.wpb_text_column blockquote:before,
.themetechmount-servicebox-styleone .tm-service-icon,
.themetechmount-servicebox-styleone .themetechmount-serviceboxbox-readmore a:hover,
.themetechmount-pf-detailbox-list .tm-pf-details-date i,
.content-area .social-icons li > a,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a, 
.tm-processbox-wrapper .tm-processbox:hover .tm-box-title h5,
.tm-textcolor-white:not(.tm-bgcolor-skincolor) .tm-titlebar-main .breadcrumb-wrapper a:hover,
.tm-col-bgcolor-darkgrey .tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-skincolor:hover,
.tm-bgcolor-darkgrey .tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-skincolor:hover,
.tm-col-bgimage-yes .tm-sbox .tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-skincolor:hover,
ul.tm-pricelist-block li .service-price strong,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-black:hover,
.themetechmount-box-service .themetechmount-serviceboxbox-readmore a,
.themetechmount-box-blog.themetechmount-blogbox-styleone.themetechmount-blogbox-stylefive .themetechmount-blogbox-footer-left a,
ul.fablio_contact_widget_wrapper li:before,
.themetechmount-iconbox-styleeleven .tm-box-icon i,
.themetechmount-box-blog.themetechmount-blogbox-styleone.themetechmount-blogbox-stylefive .themetechmount-blogbox-footer-left a,	
ul.fablio_contact_widget_wrapper li:before,	
.themetechmount-iconbox-styleeleven .tm-box-icon i,
.tm-ptablebox .tm-sbox-icon-wrapper,
.tm-fid-view-lefticon .tm-fid-icon-wrapper i,
.themetechmount-iconbox-styletwo.tm-custome-iconbox .tm-box-icon i,
.themetechmount-iconbox-style14.tm-custome-iconbox .tm-box-icon i,
.tm-custome-pricetable .tm-ptablebox .tm-sbox-icon-wrapper,
.tm-custome-icon-style .themetechmount-iconbox .tm-iconstyle-rounded .tm-box-icon i,
.themetechmount-iconbox.themetechmount-iconbox-stylenine .tm-iconstyle-rounded .tm-box-icon i,
.themetechmount-box-blog.themetechmount-blogbox-styleone.themetechmount-blogbox-stylefive .themetechmount-blogbox-footer-left a,
.themetechmount-boxes-row-wrapper .tm-box-col-wrapper:nth-of-type(even) .themetechmount-testimonialbox-styleone .themetechmount-box-desc .themetechmount-testimonial-text:before,
.themetechmount-box-testimonial.themetechmount-testimonialbox-styleone:hover .themetechmount-box-desc .themetechmount-testimonial-text:before,
.tm-boxes-carousel-arrows-below .themetechmount-boxes-row-wrapper .slick-prev,
.tm-boxes-carousel-arrows-below .themetechmount-boxes-row-wrapper .slick-next,
.tm-ptablebox .tm-sbox-icon-wrapper,
.themetechmount-iconbox.themetechmount-iconbox-style20 .themetechmount-iconbox-button u a, .tm-custom-heading.tm-heading-before-number-style.tm-custom-heading, 
.themetechmount-box-blog.themetechmount-blogbox-top-image .cat-links a:not(:hover), 
.themetechmount-box-blog.themetechmount-blogbox-top-image .tm-social-share-links ul li a:hover, 
.footer .tm-mailbox .location-inputbox .btn:hover{
	color: <?php echo esc_attr($skincolor); ?>;
}



/*** Defaultmenu ***/     
/*Wordpress Main Menu*/      

/* Menu hover and select section */ 
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,    
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,     
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-item > a,     
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a,             

/*Wordpress Dropdown Menu*/
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,    
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a,    
    
 
 /*Mega Main Menu*/      
 .tm-mmenu-active-color-skin .site-header.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,  
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,      
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,           


/*Mega Dropdown Menu*/  
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a,      
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,  
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current_page_item > a,
.themetechmount-box-blog.themetechmount-blogbox-style4 .tm-entry-meta .tm-meta-line i,
.themetechmount-box-blog.themetechmount-blogbox-style4 .themetechmount-blogbox-footer-left  a:after{
    color: <?php echo esc_attr($skincolor); ?> ;
}
    

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
        /* Main Menu Active Link Color --------------------------------*/                
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
        .tm-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
        
        .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
        .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
            color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
        }
    <?php } ?>

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
            
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
    <?php } ?>



/* Dynamic main menu color applying to responsive menu link text */
.header-controls .search_box i.tmicon-fa-search,
.righticon i,
.menu-toggle i,
.header-controls a{
    color: rgba( <?php echo esc_attr( themetechmount_hex2rgb($mainMenuFontColor) ); ?> , 1) ;
}
.menu-toggle i:hover,
.header-controls a:hover {
    color: <?php echo esc_attr($skincolor); ?> !important;
}

<?php if( !empty($dropdownmenufont['color']) ) : ?>
	.tm-mmmenu-override-yes  #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div{
		color: rgba( <?php echo themetechmount_hex2rgb($dropdownmenufont['color']); ?> , 0.8);
		font-weight: normal;
	}
<?php endif; ?>
#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
	padding-top: 10px;
}

/*Logo Color --------------------------------*/ 
h1.site-title{
	color: <?php echo esc_attr($logo_font['color']); ?>;
}


/**
 * 9. Genral Elements
 * ----------------------------------------------------------------------------
 */

/* Site Pre-loader image */
<?php if( isset($loaderimage_custom['url']) && $loaderimage_custom['url']!='' ): ?>
.pageoverlay{
	background-image:url('<?php echo esc_attr($loaderimage_custom['url']); ?>');
}
<?php elseif( $loaderimg!='' ) : ?>
.pageoverlay{
	background-image:url('../images/loader<?php echo esc_attr($loaderimg); ?>.gif');
}
<?php endif; ?>


/**
 * 10. Heading Elements
 * ----------------------------------------------------------------------------
 */
.tm-textcolor-skincolor h1,
.tm-textcolor-skincolor h2,
.tm-textcolor-skincolor h3,
.tm-textcolor-skincolor h4,
.tm-textcolor-skincolor h5,
.tm-textcolor-skincolor h6,

.tm-textcolor-skincolor .tm-vc_cta3-content-header h2{
	color: <?php echo esc_attr($skincolor); ?> !important;
}
.tm-textcolor-skincolor .tm-vc_cta3-content-header h4{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.90) !important;
}
.tm-textcolor-skincolor .tm-vc_cta3-content .tm-cta3-description{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.60) !important;
}
.tm-custom-heading.tm-textcolor-skincolor{
	color:<?php echo esc_attr($skincolor); ?>!important;
}
.tm-textcolor-skincolor a{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.80);
}



/**
 * 10. Floating Bar
 * ----------------------------------------------------------------------------
 */
<?php

if( !empty($fbar_breakpoint) && trim($fbar_breakpoint)!='all' ){

	if( esc_attr($fbar_breakpoint)=='custom' ) {
		$fbar_breakpoint = ( !empty($fbar_breakpoint_custom) ) ?  trim($fbar_breakpoint_custom) : '1200' ;
	}

	?>
	
/* Show/hide topbar in some devices */
@media (max-width: <?php echo esc_attr($fbar_breakpoint); ?>px){
	.themetechmount-fbar-btn,
    .themetechmount-fbar-box-w{
		display: none !important;
	}
}

	<?php
}
?>




/********************** Tab ****************************/

.ttmbannercmsblock-style1 .bannercms_item a.bannerbtn:hover,
.second .bannercms_item a.bannerbtn:hover,
body.wpb-js-composer .vc_tta.vc_general.vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a,
.wpb-js-composer .tm-tab-top-icon .vc_tta-tab.vc_active>a .vc_tta-icon:before,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-tab>a{
    background-color: <?php echo esc_attr($skincolor); ?>;     
    border-color: <?php echo esc_attr($skincolor); ?>;     
    color: #fff;
}
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-tab>a{
    background-color: <?php echo esc_attr($skincolor); ?> ;   
}

/* Modern skincolor */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading {
    border-color: <?php echo esc_attr($skincolor); ?> ; 
    background-color: <?php echo esc_attr($skincolor); ?> ; 
}

/* Outline skincolor */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a:hover,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a {
    border-color: <?php echo esc_attr($skincolor); ?> ; 
    background-color: transparent;
    color: <?php echo esc_attr($skincolor); ?> ; 
}

.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover {
    background-color: <?php echo esc_attr($skincolor); ?> ; 
    color: #fff;
}
.wpb-js-composer .vc_tta-style-classic.vc_tta-accordion.ttm-accordion-styleone .vc_tta-icon,
.wpb-js-composer .vc_tta-style-classic.vc_tta-accordion.ttm-accordion-styleone .vc_tta-controls-icon,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a{
	color: <?php echo esc_attr($skincolor); ?> ; 
}


/**
 * Extra section
 * ----------------------------------------------------------------------------
 */
 
.elementor-element .themetechmount-iconbox-styletwo.themetechmount-icon-bgcolor-skincolor .tm-box-icon, 
 .themetechmount-box-blog.themetechmount-blog-box-view-left-image .themetechmount-blogbox-footer-left a,
.themetechmount-blogbox-styletwo .themetechmount-blogbox-footer-left a,
.tm-highlighttext-btag b:after,
.themetechmount-iconbox-stylethree.box-styleten .tm-iconbox-digit,
.tm_prettyphoto.tm-fixright-style,
.themetechmount-portfoliobox-stylethree .themetechmount-box-bottom-content,
.tm-bordered-stylebox.tm-fid-view-style6:before,
.tm-bordered-stylebox.tm-fid-view-style6:after,
.themetechmount-iconbox-style17:hover .box-plus-icon a,
.woocommerce div.product .woocommerce-tabs ul.tabs li a,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:hover, 
.main-holder .site-content ul.products li.product .add_to_cart_button:hover,
.main-holder .site-content ul.products li.product .product_type_external:hover,
.main-holder .site-content ul.products li.product .product_type_grouped:hover,
.main-holder .site-content ul.products li.product.outofstock .product_type_simple:hover,
.main-holder .site-content ul.products li.product .product_type_variable:hover,

.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:hover:after,
.main-holder .site-content ul.products li.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:hover:after,
.main-holder .site-content ul.products li.product .add_to_wishlist:hover:after,
.main-holder .site-content ul.products li.product .compare:hover:after,
.main-holder .site-content ul.products li.product .yith-wcqv-button:hover:after,

.inside.tm-fid-view-topicon:not(.tm-fid-without-icon) h4:after,
.themetechmount-testimonial-box-style2 .themetechmount-item-thumbnail:after,
.themetechmount-iconbox-style16 .tm-box-icon,
.themetechmount-iconbox-styleseven .tm-box-icon,
.tm-pf-single-content-wrapper .themetechmount-pf-single-detail-box .tm-portfolio-title,
.themetechmount-team-member-single-featured-area .tm-team-member-header-content,
.tm-stepbox-wrapper .tm-stepsbox:hover .tm-stepnum,
.tm-header-style-infostack .kw-phone .themetechmount-social-links-wrapper li a:hover,
.single article.post blockquote:after,
.sidebar .widget:after,
.subscribe_button .btn,
.themetechmount-box-blog.themetechmount-blogbox-styleone:hover .tm-blog-readmore-icon,
.tm-single-image-wrapper.imagestyle-four .tm-playvideobox,
body.wpb-js-composer .vc_tta.vc_general.vc_tta-color-black.vc_tta-style-outline.tm-history-styletab .vc_tta-tabs-list li.vc_tta-tab.vc_active:before,
.themetechmount-iconbox .tm-iconstyle-rounded .tm-box-icon,
.themetechmount-iconbox .tm-iconstyle-boxed .tm-box-icon,
.themetechmount-iconbox .tm-iconstyle-rounded-less .tm-box-icon,
body.wpb-js-composer .vc_tta.vc_general.vc_tta-color-black.vc_tta-style-outline.tm-history-styletab .vc_tta-tabs-list li:after,
.themetechmount-portfoliobox-style3 .themetechmount-box-link a,
.themetechmount-iconbox-styleseven .themetechmount-iconbox-icon,
.woocommerce.single-product div.summary .stock,
.themetechmount-box-portfolio:not(.themetechmount-portfoliobox-style2) .themetechmount-icon-box a,
.themetechmount-box-portfolio.themetechmount-portfoliobox-style2 .themetechmount-icon-box a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover:before, .widget.tm_widget_nav_menu li a:hover:before, .widget.lawgrid_all_post_list_widget li a:hover:before, .widget.lawgrid_category_list_widget li a:hover:before, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:before, .widget.tm_widget_nav_menu li.current_page_item a:before, .widget.lawgrid_all_post_list_widget li.tm-post-active a:before, .widget.lawgrid_category_list_widget li.current-cat a:before,
.comment-list a.comment-reply-link,
 article.themetechmount-box-blog-classic .tm-post-featured-outer-wrapper .tm-postdate,
.content-area .social-icons li > a:hover,
.tm-primary-second-view .tm-box-col-wrapper:nth-child(3n + 2) .themetechmount-box-bottom-content,
 body.wpb-js-composer .vc_tta.vc_general.vc_tta-color-black.vc_tta-style-outline .vc_tta-tabs-list li:after,
.themetechmount-testimonial-box-style2 .themetechmount-quote-icon:after,
.tm-active-thirditem .row .tm-box-col-wrapper:nth-child(3) .steps-style2 .tm-static-steps-num span:before,
.steps-style2:hover .tm-static-steps-num span:before,
.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md:hover:after,
.themetechmount-serviceboxbox-readmore.tm-ubutton a:hover:after,
.themetechmount-boxes-service .row.themetechmount-boxes-row-wrapper .tm-box-col-wrapper:nth-child(even) .themetechmount-servicebox-stylefour .tm-sbox-moreicon:hover,
#yith-quick-view-content .onsale, .single .main-holder .site-content span.onsale, .main-holder .site-content ul.products li.product .onsale,
.themetechmount-teambox-style1 .themetechmount-box-content:after, 
.themetechmount-teambox-style1 .themetechmount-box-content:before,
.themetechmount-box-portfolio .themetechmount-overlay:before,
.themetechmount-servicebox-stylefour .themetechmount-box-bottom-content,
.themetechmount-teambox-styletwo .themetechmount-box-content:after,
.themetechmount-teambox-styletwo .themetechmount-box-content:before,
.mailchimp-inputbox input[type="submit"],
.widget .tm-separated-link:before,
.tm-vc_btn3.tm-vc_btn3-color-inverse.tm-vc_btn3-style-flat:focus, .tm-vc_btn3.tm-vc_btn3-color-inverse.tm-vc_btn3-style-flat:hover, .tm-vc_btn3.tm-vc_btn3-color-inverse:focus, .tm-vc_btn3.tm-vc_btn3-color-inverse:hover,
.vc_row.wpb_row.tm-skincolor-bordered-box .wpb_column:after,
.widget.woocommerce.widget_product_search input[type="submit"],
.widget.woocommerce.widget_product_search button,
.widget .search-form .search-submit,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
.post.themetechmount-box-blog-classic .tm-box-post-date,
.tooltip:after, [data-tooltip]:after,
.tm-skincolor-utext u:after,
.single-tm_team_member .tm-team-social-links-wrapper ul li a:hover, 
.tm-custom-heading.tm-diet-heading,
.wpb-js-composer .vc_tta.vc_general.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a:after,
.tm-processbox-wrapper .tm-processbox .process-num,
.themetechmount-service-box-view-top-image .tm-service-icon,
.tm-sbox .tm-vc_general.tm-vc_cta3 a.tm-vc_general.tm-vc_btn3:hover:after,
.tm-header-social-box div.tm-icon-wrapper ul li a:hover,
.tm-sbox.ttm-service-box-separator .tm-vc_cta3-container>.tm-vc_general:after,
.wpb_row.tm-process-style2 .vc_column_container>.vc_column-inner:after,
.tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3.tm-vc_btn3-color-grey,
.tm_prettyphoto.tm-vc_icon_element .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-skincolor:before,
.tm_prettyphoto.tm-vc_icon_element .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-skincolor:after,
.entry-title-wrapper .entry-title:before,
.post.themetechmount-box-blog-classic .tm-box-post-icon,
.themetechmount-box-blog .tm-box-post-date,
.themetechmount-teambox-view-overlay .themetechmount-overlay a,
.themetechmount-box-team.themetechmount-box-view-topimage-bottomcontent .themetechmount-overlay a,
.themetechmount-fbar-position-right .themetechmount-fbar-btn a.skincolor,
.themetechmount-fbar-position-default .themetechmount-fbar-btn a.skincolor,
.themetechmount-portfolio-box-view-styleone:hover .themetechmount-box-link,
.widget .tm_info_widget,
.widget_subscribe_form input[type="submit"],
.themetechmount-box-blog .tm-box-post-date,
.tribe-events-list-separator-month span,
#tribe-events-content .tribe-events-read-more:hover,
.tribe-events-list .tribe-events-loop .tribe-event-featured .tribe-events-event-cost .ticket-cost,
#tribe-events-content.tribe-events-single .tribe-events-back a:hover,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-next a:hover,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-previous a:hover,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-left a:hover,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-right a:hover,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat:focus,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat:hover,
.tm-vc_btn3.tm-vc_btn3-color-black:focus, .tm-vc_btn3.tm-vc_btn3-color-black:hover,
.tm-header-icons .tm-header-wc-cart-link span.number-cart,
.themetechmount-events-box-view-top-image-details .themetechmount-post-readmore a:hover,
.themetechmount-box-events .themetechmount-meta-date,
.tm-col-bgcolor-darkgrey .social-icons li > a:hover,
.themetechmount-topbar-wrapper .themetechmount-fbar-btn,
.tm-skincolor-bg,
.footer .widget .widget-title:before,
.tm-bg-highlight,
.tm-bgcolor-darkgrey .themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-desc:after,
.tm-row .tm-col-bgcolor-darkgrey .themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-desc:after,
.themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-desc:after,
.wpcf7 .tm-contactform input[type="radio"]:checked:before,
.tm-dropcap.tm-bgcolor-skincolor,
.newsletter-form input[type="submit"],
.themetechmount-twitterbox-inner i,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-skincolor .tm-titlebar .breadcrumb-wrapper .container,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-skincolor  .breadcrumb-wrapper .container:before,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-skincolor .breadcrumb-wrapper .container:after {
	background-color: <?php echo esc_attr($skincolor); ?>; 
}

.footer .social-icons li > a:hover,
.tm-sbox.sbox-hover-style2:hover,
.themetechmount-box-portfolio .themetechmount-box-title h4:after,
.themetechmount-fbar-box-w .submit_field button,
.themetechmount-events-box-view-top-image-details .themetechmount-post-readmore a,
.themetechmount-box-events .event-box-content .themetechmount-eventbox-footer a,
#tribe-events-content .tribe-events-read-more, 
#tribe-events-content.tribe-events-single .tribe-events-back a,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-next a,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-previous a,
#tribe-events .tribe-events-button, 
.tribe-events-button,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-left a,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-right a,
.k_flying_searchform_wrapper {
	background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.93);
}

.tm-sbox-hover .tm-sbox:hover {
	border-bottom: 2px solid <?php echo esc_attr($skincolor); ?>;	
}

.themetechmount-teambox-style2:hover .themetechmount-box-content,
.tm-active-thirditem .row .tm-box-col-wrapper:nth-child(3) .steps-style2 .tm-steps-descbox,
.steps-style2:hover .tm-steps-descbox,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-panel-heading, .wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-tab>a,

.footer .tm-bg.tm-bgcolor-transparent.tm-textcolor-white .social-icons li > a:hover,
.tm-processbox-wrapper .tm-processbox:hover .tm-process-icon:before,
.tm-single-image-wrapper.imagestyle-two .tm-single-image-inner:after, 
.tm-single-image-wrapper.imagestyle-two .tm-single-image-inner:before,
.tm-single-image-wrapper.imagestyle-one .tm-single-image-inner:after,
.tm-single-image-wrapper.imagestyle-one .tm-single-image-inner:before,

.vc_row.wpb_row.tm-skincolor-bordered-box,
.single .tm-pf-single-content-area blockquote,
.single .tm-pf-single-content-wrapper blockquote,
.single article.post blockquote,
.tm-social-share-links ul li a:hover,
.tm-header-icons .tm-header-icon  a:hover,
.tm-header-social-box div.tm-icon-wrapper ul li a:hover,
.themetechmount-teambox-view-style2:hover .themetechmount-team-image-box,
.themetechmount-blog-box-view-right-image .themetechmount-box-content .tm-post-categories>.tm-meta-line.cat-links a,
.themetechmount-blog-box-view-left-image .themetechmount-box-content .tm-post-categories>.tm-meta-line.cat-links a,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:after,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:before,
.themetechmount-boxes-row-wrapper .slick-arrow:hover,
.sbox-hover-borderbox .tm-sbox .tm-vc_cta3-container>.tm-vc_general:after,
.widget .search-form .search-field:focus,
.themetechmount-box-events.themetechmount-box-view-top-image:hover .event-box-content,
.ttm-skin-outline-border .tm-vc_icon_element-style-rounded:before,
.tm-sbox.tm-iconbox-bottom-border .tm-vc_cta3-icons:after,
.tm-bgcolor-darkgrey .wpcf7 .tm-contactform .wpcf7-textarea:focus,
.wpcf7 .tm-commonform .wpcf7-text:focus,
.wpcf7 .tm-commonform textarea:focus {
	border-color:<?php echo esc_attr($skincolor); ?>;
}

.footer .tm-post-no-radius ul.tm-recent-post-list > li .post-date:before,
.tm-element-heading-wrapper.tm-seperator-style-one .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-content-header h4,
.content-area .social-icons li > a,
.wpb_text_column blockquote,
.themetechmount-boxes-testimonial .themetechmount-box.themetechmount-box-view-default .themetechmount-post-item .themetechmount-box-desc:after,
.themetechmount-box-team .themetechmount-box-social-links ul li a:hover,
.tm-header-style-infostack .header-widget .header-icon .icon,
.tm-pf-single-content-wrapper.tm-pf-view-top-image .themetechmount-pf-single-detail-box,
.tm-rounded-shadow-box > .vc_column-inner > .wpb_wrapper,
.widget .woocommerce-product-search .search-field:focus,
.widget .search-form .search-field:focus,
.themetechmount-teambox-view-overlay .themetechmount-overlay,
.themetechmount-box-team.themetechmount-box-view-topimage-bottomcontent .themetechmount-overlay,
body table.booked-calendar td.today .date span,
.servicebox-number .tm-sbox.tm-sbox-istyle-rounded-outline .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner:before,
.tm-sbox.tm-iconbox-bottom-border .tm-vc_cta3-icons:after,
.tm-sevicebox-skinborder .tm-sbox .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-color-skincolor,
.tm-skincolor-bottom-boder {
	border-color: <?php echo esc_attr($skincolor); ?>;	
}
.widget .widget-title{
	border-left-color: <?php echo esc_attr($skincolor); ?>;	
}
.themetechmount-fbar-position-right .themetechmount-fbar-btn a:after,
.tm-steps-box.steps-style5:hover .tm-steps-desc:before
 {
	border-right-color: <?php echo esc_attr($skincolor); ?>;	
}

.themetechmount-blogbox-styletwo .themetechmount-box-desc,
.tooltip-top:before, .tooltip:before, [data-tooltip]:before,
.themetechmount-fbar-position-default .themetechmount-fbar-btn a:after {
	border-top-color: <?php echo esc_attr($skincolor); ?>;	
}

.themetechmount-servicebox-stylethree .themetechmount-box-bottom-content .tm-servicebox-detials:before,
.tm-bordercolor-skincolor,
.tm-footer-cta-wrapper .cta-widget-area .tm-phone-block:before,
.tm-search-overlay .w-search-form-row:before {
	border-bottom-color: <?php echo esc_attr($skincolor); ?>;	
}
 
body table.booked-calendar td.today:hover .date span,
.tm-search-outer .tm-icon-close:before,
.tm-sbox-bordered-style .tm-sbox:hover,
.serviceboxes-with-banner.tm-servicebox-hover .tm-sbox.tm-bg.tm-bgimage-yes:hover .tm-bg-layer,
.tm-blockquote-class:before {
  background-color: <?php echo esc_attr($skincolor); ?> !important;
}

::selection {
	background-color: <?php echo esc_attr($skincolor); ?>;
}
::-moz-selection {
	background-color: <?php echo esc_attr($skincolor); ?>;
}

.themetechmount-box-service.themetechmount-servicebox-stylethree .themetechmount-serviceboxbox-readmore a:hover,
.tm-header-style-infostack.tm-header-overlay .kw-phone .ttm-custombutton a.tm-cta-button,
.woocommerce .star-rating span::before,
.single .main-holder .entry-summary a.button.single_add_to_wishlist:hover,
.single .main-holder .entry-summary button.button.single_add_to_wishlist:hover, 
.single .main-holder .entry-summary input.button.single_add_to_wishlist:hover,
.single .main-holder .single_add_to_wishlist:hover,
.single .main-holder .single_add_to_wishlist:hover,

.main-holder .site-content ul.products li.product .star-rating:before,
.main-holder .site-content ul.products li.product .star-rating,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:not(:hover):after,
.woocommerce .main-holder ul.products li.product .price .woocommerce-Price-amount,
h2.tm-fontweight-normal b,
.themetechmount-servicebox-styletwo:hover .tm-details-link a,
.tm-titlebar .breadcrumb-wrapper .breadcrumb-wrapper-inner i,
.tm-header-style-infostack .kw-phone .themetechmount-social-links-wrapper li a:not(:hover),
.tm-header-quick-callbox .tm-callbox-icon,
.single-post .tm_tag_lists .themetechmount-tags-links-title i,
.themetechmount-boxes-testimonial.themetechmount-boxes-view-carousel .slick-current + .slick-active .themetechmount-testimonialbox-styleone .themetechmount-box-desc .themetechmount-testimonial-text:before,
.single article.post blockquote:before,
body.wpb-js-composer .vc_tta-color-black.vc_tta-style-outline.tm-history-styletab .vc_tta-tab>a:focus,
body.wpb-js-composer .vc_tta-color-black.vc_tta-style-outline.tm-history-styletab .vc_tta-tab>a:hover,
.tm-vc_icon_element-color-gradient .tm-vc_icon_element-icon:before,
.tm-textcolor-white .themetechmount-iconbox-styleone .tm-box-icon i,

.themetechmount-iconbox.tm-highlight-icon .tm-iconstyle-rounded .tm-box-icon i,
ul.tm-pricelist-block li .tm-highlight,
.themetechmount-iconbox .tm-iconstyle-rounded-less-outline .tm-box-icon i,
.themetechmount-iconbox .tm-iconstyle-boxed-outline .tm-box-icon i,
.themetechmount-iconbox .tm-iconstyle-rounded-outline .tm-box-icon i,

.themetechmount-box-portfolio:not(.themetechmount-portfoliobox-style2):hover .themetechmount-icon-box a:hover,
.themetechmount-portfoliobox-style3 .themetechmount-box-category,
.themetechmount-portfoliobox-style3 .themetechmount-box-category a,
.themetechmount-portfoliobox-style2 .themetechmount-box-category a:hover,
.vc_toggle_title > h4:hover,
.tm-processbox-wrapper.processbox-style2 .tm-processbox .tm-process-icon .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-size-md .tm-vc_icon_element-icon,
 .tm-bgcolor-darkgrey .themetechmount-iconbox.themetechmount-iconbox-styleone .tm-box-icon i,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-inverse:hover,
.tm-header-icons .tm-header-wc-cart-link a:hover,
.themetechmount-topbar-wrapper.tm-bgcolor-darkgrey.tm-textcolor-white a:hover,
.tm-textcolor-white .themetechmount-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before,
.tm-bgcolor-skincolor .themetechmount-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before, 
.tm-bgcolor-darkgrey .themetechmount-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before,
body.wpb-js-composer .vc_tta-color-white.vc_tta-style-classic .vc_tta-tab:not(.vc_active) .vc_tta-icon,
.tm-ptable-box.pricebox-style1 .tm-static-box-price span,
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time i.booked-icon,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a .vc_tta-icon,

.wpb-js-composer .vc_tta-tabs.tm-cattab-style.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover,
.widget.tm_widget_nav_menu li a:hover,
.widget.fablio_all_post_list_widget li a:hover,
.widget.fablio_category_list_widget li a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a,
.widget.tm_widget_nav_menu li.current_page_item a:before,
.widget.fablio_all_post_list_widget li.tm-post-active a,
.widget.fablio_category_list_widget li.current-cat a,
.themetechmount-box-blog .themetechmount-blogbox-footer-readmore a,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-modern .vc_tta-tab.vc_active>a,
.tm-skincolor-utext u,
.tm-element-heading-wrapper .tm-vc_cta3-headers h4 strong,
h2.tm-custom-heading strong,
.tm-element-heading-wrapper .tm-vc_cta3-headers h2 strong,
ul.fablio_contact_widget_wrapper li:before,
.tm-link-underline a,
a.tm-link-underline,
.tm-highlight-quote3 blockquote:before,
.tm-bgcolor-darkgrey .wpb_text_column a,
.tm-header-icon.tm-header-social-box a.tm-social-btn-link i:focus,
.tm-header-icon.tm-header-social-box a.tm-social-btn-link i:hover,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic.tm-tourtab-style1 .vc_tta-icon,
.themetechmount-boxes-testimonial .themetechmount-box.themetechmount-box-view-default .themetechmount-post-item .themetechmount-box-desc:after,
.woocommerce .summary .compare.button:hover,
.bottom-footer-text.tm-bgcolor-custom.tm-textcolor-white a:not(:hover),
.tm-newsletter-box h3 strong,
.tm-tab-top-icon .vc_tta-tab >a:not(:hover) .vc_tta-icon:before,
.tm-fid-with-icon.tm-fid-view-topicon .tm-fid-icon-wrapper i,
.tm-header-style-toplogo .info-widget-inner h2,
.vc_row.tm-bgcolor-darkgrey .social-icons li > a,
.tm-sbox-separator .tm-sbox .tm-vc_cta3-content-header h4,
.tm-col-bgcolor-darkgrey .themetechmount-boxes-testimonial .themetechmount-box-view-default .themetechmount-author-name,
.themetechmount-content-team-search-box .search_field i,
.themetechmount-events-box-view-top-image-details .themetechmount-eventbox-footer a:not(:hover),
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-title,
.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-menu-parent > a,
.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,
.tm-topbar-content .social-icons li > a:hover,
.tm-header-style-infostack .header-widget .header-icon i,
#tribe-events-content a:hover,
.tribe-event-schedule-details,
.comment-meta a:hover,
.themetechmount-box-events .event-box-content .tribe-events-vanue i,
.themetechmount-box-events .event-box-content .themetechmount-meta-details i,
.tm-comment-owner a:hover,
.wpb-js-composer .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-controls-icon-position-right .vc_tta-controls-icon,
h4.tm-custom-heading.tm-skincolor,
h3.tm-custom-heading.tm-skincolor,
.tm-list-style-none li .tm-list-li-content:before,
.themetechmount-iconbox-styleeleven .tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-size-md .tm-vc_btn3-icon,
.themetechmount-iconbox-styleeleven:hover .tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-black,
.cmt-custome-lefticonclass .tm-fid-view-lefticon .tm-fid-icon-wrapper i {
	color: <?php echo esc_attr($skincolor); ?>;	
}

themetechmount-box-portfolio .themetechmount-icon-box a:hover,
body.wpb-js-composer .vc_tta-color-white.vc_tta-style-classic .vc_tta-tab>a:focus,
body.wpb-js-composer .vc_tta-color-white.vc_tta-style-classic .vc_tta-tab>a:hover,
body.wpb-js-composer .vc_tta-color-white.vc_tta-style-classic .vc_tta-tab.vc_active>a,
body.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-panel .vc_tta-panel-title>a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-tab >a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-skincolor:not(.vc_tta-accordion) .vc_tta-tab.vc_active>a,
.tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3-container.tm-vc_btn3-inline .tm-vc_btn3,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel .vc_tta-panel-title>a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-tab >a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-tab.vc_active>a {
    border-color: <?php echo esc_attr($skincolor); ?>;	
	background-color: <?php echo esc_attr($skincolor); ?>;	
}
.widget.tm-getintouch-box .social-icons li > a:hover,
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button[disabled], body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button[disabled]:hover {
    border-color: <?php echo esc_attr($skincolor); ?> !important;	
	background-color: <?php echo esc_attr($skincolor); ?> !important;		
}


.tm-col-bgcolor-darkgrey .tm-element-heading-content-wrapper h4.tm-element-subheading,
.tm-fid.tm-fidbox-stylecustom .tm-fid-icon-wrapper i,
.bannercms_item a.bannerbtn:hover,
.tm-textcolor-white .tm-vc_cta3-content-header h4.tm-skincolor-headingtext,
.tm-skincolor-headingtext,
.tm-subhead-skin.tm-element-heading-wrapper .tm-vc_general.tm-vc_cta3.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-content-header h4,
.tm-subhead-skin .tm-element-heading-wrapper .tm-vc_general.tm-vc_cta3.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-content-header h4,
.site-footer .tm-skincolor,
.tm-skincolo-strong .tm-element-heading-wrapper .tm-custom-heading strong ,
.tm-custom-heading.tm-skincolo-strong strong,
.vc_row .tm-skincolor,
.tm-row .tm-skincolor,
.tm-skincolor,
.tm-skincolor-bfont b,
span.tm-skincolor a,
.tm-ptablebox .tm-ptablebox-cur-symbol-before {
	color: <?php echo esc_attr($skincolor); ?> !important;	 
}

.themetechmount-iconbox .tm-iconstyle-rounded-less-outline .tm-box-icon,
.themetechmount-iconbox .tm-iconstyle-boxed-outline .tm-box-icon,
.themetechmount-iconbox .tm-iconstyle-rounded-outline .tm-box-icon,
.themetechmount-servicebox-styletwo .tm-service-iconbox {
	color: <?php echo esc_attr($skincolor); ?>;	
	border-color: <?php echo esc_attr($skincolor); ?>;
}
.themetechmount-box-service .tm-seperator {
    background-image: linear-gradient(to right,transparent 0,transparent 75%,<?php echo esc_attr($skincolor); ?> 75%,<?php echo esc_attr($skincolor); ?>);
}

.tm-rotating-text text  {
	 fill: <?php echo esc_attr($skincolor); ?>;
}

/*woocommerce*/

.skincolor-border,
.skincolor-border .vc_column-inner,
.tm-sbox.tm-border-skincolor .tm-vc_cta3-container,
.rpt_style_basic .rpt_plan:not(.rpt_recommended_plan) .rpt_custom_btn a.tm-vc_general.tm-vc_btn3:hover {
	border-color: <?php echo esc_attr($skincolor); ?> !important;	 
}


.tm-custome-top-border-style .tm-col-bgimage-yes .tm-bg-layer-inner,
.themetechmount-progress-bar .tm-vc_label_units.vc_label_units:before,
.tm-center-markrow:before,
.woocommerce-message,
.woocommerce-info,
.single .main-holder div.product .woocommerce-tabs ul.tabs li.active:before,
.tm-search-overlay {
    border-top-color: <?php echo esc_attr($skincolor); ?>;
}

.tm-single-image-wrapper.imagestyle-three .tm-single-image-inner:before {
	  border-color: transparent transparent <?php echo esc_attr($skincolor); ?> transparent;
}

/* Blackish Button Color */

.themetechmount-box-service.themetechmount-servicebox-stylethree .themetechmount-serviceboxbox-readmore a,
.newsletter-subsc-box input[type="submit"]:focus,
.newsletter-subsc-box input[type="submit"]:hover,
.newsletter-subsc-box input[type="submit"],
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-color-black .tm-vc_icon_element-icon,
.tm-list.tm-black li .tm-list-li-content,
.single-post .tm_tag_lists .themetechmount-tags-links-title,
.wpb-js-composer .vc_tta-tabs.tm-cattab-style.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title>a,
.tm-header-overlay .tm-header-text-area .header-info-widget .tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-white:hover .tm-vc_btn3-icon,
.themetechmount-pf-detailbox-list .tm-pf-details-date .tm-pf-left-details,
.tm-sortable-list .tm-sortable-link a,
body.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title>a,
.themetechmount-box-team.themetechmount-teambox-style2 ul.tm-team-social-links a:hover,
.themetechmount-progress-bar.vc_progress_bar .vc_general.vc_single_bar .vc_label,
span.tm-vc_label_units.vc_label_units,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-skincolor:hover,
.themetechmount-blogbox-styleone .themetechmount-blogbox-footer-readmore a,
.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-grey.tm-vc_cta3-style-classic .tm-vc_cta3-content-header h2,
.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-grey.tm-vc_cta3-style-flat .tm-vc_cta3-content-header,
.themetechmount-box-portfolio .themetechmount-box-bottom-content h4 a:not(:hover),
.tm-publised-in-wrapper span.post-title,
.tm-team-member-single-category a:not(:hover),
.tm-team-social-links a:not(:hover),
.tm-bgcolor-darkgrey .themetechmount-team-box-view-overlay .themetechmount-box-title a,
.tm-comment-owner,
.tm-comment-owner a:not(:hover),
.comment-reply-link:hover,
.testimonial_item .themetechmount-author-name a:hover,
.tm-social-share-wrapper,
.themetechmount-box-team.themetechmount-box-view-top-image .themetechmount-box-content h4 a,
.themetechmount-team-box-view-overlay .themetechmount-box-social-links ul a,
.themetechmount-box-content h4 a,
.themetechmount-post-readmore a,
.tm-bgcolor-skincolor .themetechmount-blogbox-footer-readmore a:hover,
.logged-in-as a:hover,
.vc_column-inner.tm-col-bgcolor-grey .tm-element-heading-wrapper .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-headers h2,
.vc_column-inner.tm-col-bgcolor-white .tm-element-heading-wrapper .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-headers h2,
.tm-team-details-list .tm-team-list-title,
.tribe-events-list-separator-month,
.widget.fablio_category_list_widget .widget-title,
.widget.fablio_category_list_widget li a {
	 color: <?php echo esc_attr($blackish_buttoncolor); ?>;
}

.themetechmount-iconbox-style19 .tm-box-icon:before,
.tm-primary-second-view .tm-box-col-wrapper:nth-child(3n + 2) .themetechmount-box-title h4 a:hover,
.tm-primary-second-view .tm-box-col-wrapper:nth-child(3n + 2) .themetechmount-serviceboxbox-readmore a:hover,
.wpb_text_column blockquote footer,
.wpb-js-composer .vc_tta.vc_general.vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab:not(.vc_active) > a:hover,
body.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:hover,
.themetechmount-servicebox-styleone .themetechmount-serviceboxbox-readmore a,
.tm-fid-view-righticon .tm-fid-icon-wrapper i, .tm-fid-view-lefticon .tm-fid-icon-wrapper i,
.themetechmount-iconbox-styleseven .tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-transparent.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-headers h4.tm-custom-heading,
body.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_active .vc_tta-panel-title>a,
body.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab.vc_active>a,
body.vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:focus, 
body.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:hover,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:not(:hover),
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-black:not(:hover) {
    color: <?php echo esc_attr($blackish_buttoncolor); ?>;
}
.themetechmount-blogbox-styleone .themetechmount-blogbox-footer-readmore a,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline {
    border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}

.themetechmount-blogbox-styletwo .themetechmount-blogbox-footer-left a:hover,
.themetechmount-box-blog.themetechmount-blog-box-view-left-image .themetechmount-blogbox-footer-left a:hover,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"], .main-holder .site-content ul.products li.product .add_to_cart_button, .main-holder .site-content ul.products li.product .product_type_external, .main-holder .site-content ul.products li.product .product_type_grouped, .main-holder .site-content ul.products li.product.outofstock .product_type_simple, .main-holder .site-content ul.products li.product .product_type_variable,
.themetechmount-boxes-row-wrapper .slick-arrow,
.comment-list a.comment-reply-link:hover,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor:hover,
.mailchimp-inputbox button[type="submit"]:hover,
.mailchimp-inputbox-style4 input[type="submit"]:hover,
.tm-vc_btn3.tm-vc_btn3-color-black.active, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat.active, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat:active, .tm-vc_btn3.tm-vc_btn3-color-black:active,
.tm-vc_btn3.tm-vc_btn3-color-black, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat,
 .tm-vc_btn3.tm-vc_btn3-color-black:focus {
	background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}

 .tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:hover,
.themetechmount-blogbox-styleone .themetechmount-blogbox-footer-readmore a:hover,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-modern,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline.active, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:active, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:focus, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:hover {
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}

.tm-column-styleview .tm-portfoliobox-inner .tm-slick-arrow:hover,
.tm-pageslider-yes .tm-header-style-classic-box .themetechmount-social-links-wrapper .social-icons a:hover,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-modern:focus, .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-modern:hover {
	border-color:<?php echo esc_attr($skincolor); ?>;
	background-color:<?php echo esc_attr($skincolor); ?>;
}

.site-footer .tm-footer-cta-wrapper .tm-sboxfooter-cta-inner .newsletter-wrapper .subscribe_button .btn:hover,
.single article.post blockquote cite,
.tm-sbox .tm-custom-heading a, .entry-header:not(.tm-titlebar) .entry-title > a{
	color: <?php echo esc_attr($blackish_buttoncolor); ?>;
}
.tm-textcolor-dark h1,
.tm-textcolor-dark h2,
.tm-textcolor-dark h3,
.tm-textcolor-dark h4,
.tm-textcolor-dark h5,
.tm-textcolor-dark h6,
h2.tm-custom-heading.tm-textcolor-dark,
h4.tm-custom-heading.tm-textcolor-dark,
h3.tm-custom-heading.tm-textcolor-dark,
.tm-textcolor-dark .tm-vc_cta3-content-header h2{
    color: <?php echo esc_attr($blackish_buttoncolor); ?>!important;
}

.tm-textcolor-dark .tm-cta3-content-wrapper {
	color: rgba( <?php echo themetechmount_hex2rgb($blackish_buttoncolor); ?>,0.70);
}

.tm-header-style-infostack.tm-header-overlay .kw-phone .ttm-custombutton a.tm-cta-button,
.tm-pf-view-left-image.style2 .themetechmount-pf-detailbox-list .tm-pf-details-date .tm-pf-left-details:first-child,
.steps-style5 .tm-static-steps-num span,
.widget .tm-file-links .tm-links a,
.woocommerce-account .woocommerce-MyAccount-navigation li a, .widget.tm_widget_nav_menu li a, .widget.fablio_all_post_list_widget li a, .widget.fablio_category_list_widget li a,
 .vc_toggle_title > h4,
body.wpb-js-composer .vc_tta.vc_general.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel-title {
	font-family:"<?php echo esc_attr($special_element_fontfamily); ?>";	
}
.woocommerce-account .woocommerce-MyAccount-navigation li a, .widget.tm_widget_nav_menu li a, .widget.fablio_all_post_list_widget li a, .widget.fablio_category_list_widget li a {
	font-weight:<?php echo esc_attr($special_element_fontweight); ?>;	
}
.site-footer .widget .tm-contactbox h2.tm-custom-heading{
	font-weight:<?php echo esc_attr($widget_font_fontweight); ?>;	
}


.tm-bordered-stylebox.tm-fid-view-style6 h3 {
	font-family:"<?php echo esc_attr($bodyptagelement_fontfamily); ?>";	
}

/* Gradient color */


.tm-vc_icon_element-inner.tm-vc_icon_element-background-color-gradient.tm-vc_icon_element-background,
.themetechmount-topbar-wrapper.tm-bgcolor-gradient,
.tm-col-bgcolor-gradient .tm-bg-layer-inner,
.tm-bgcolor-gradient ,
.tm-bg.tm-bgcolor-gradient .tm-bg-layer,
.tm-col-bgcolor-gradient.tm-col-bgimage-yes .tm-bg-layer-inner,
.tm-bgcolor-gradient.tm-bg.tm-bgimage-yes > .tm-bg-layer-inner {
	background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> ) !important;	
}

/* button color */

.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient{
	background: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> 0%, <?php echo esc_attr($second_gradientcolor); ?> 100%);
	color: #fff;
}
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient:hover{
	background: linear-gradient(to right, <?php echo esc_attr($second_gradientcolor); ?> 0%, <?php echo esc_attr($first_gradientcolor); ?> 100%);
	color: #fff;
}
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient.tm-vc_btn3-style-outline {
	background: transparent;
	border-color:<?php echo esc_attr($first_gradientcolor); ?>;
}
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient.tm-vc_btn3-style-outline:focus,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient.tm-vc_btn3-style-outline:hover{
	background: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> 0%, <?php echo esc_attr($second_gradientcolor); ?> 100%);
}
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient.tm-vc_btn3-style-3d {
	box-shadow: 0 5px 0 <?php echo esc_attr($first_gradientcolor); ?>;
}
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient.tm-vc_btn3-style-outline:not(:hover),
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-gradient.tm-vc_btn3-style-text {
	color:<?php echo esc_attr($first_gradientcolor); ?>;
	background: transparent;
}

.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-gradient.tm-vc_icon_element-outline {
    border-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?>, <?php echo esc_attr($second_gradientcolor); ?>);
    border-image-slice: 1;
}
.vc_progress_bar.vc_progress-bar-color-gradient .vc_single_bar .vc_bar:after,
.vc_progress_bar.vc_progress-bar-color-gradient .vc_single_bar .vc_bar,
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-gradient .vc_bar {
		background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> );	
}


<?php 
$show_gradient_colors = themetechmount_get_option('gradient_color_show');
	if( $show_gradient_colors==true ){
?>

.main-holder .site-content ul.products li.product .onsale,
.tm-header-style-infostack .kw-phone .ttm-custombutton,
.tm-post-prev-next-buttons .tm-vc_btn3.tm-vc_btn3-shape-square,
.comment-respond .tm-vc_btn3.tm-vc_btn3-shape-square,
.tm-single-top-btn .tm-vc_btn3.tm-vc_btn3-shape-square,
.comment-list a.comment-reply-link,
.themetechmount-teambox-style1 .themetechmount-team-icon,
.tm-ptablebox .tm-sbox-icon-wrapper,
.tm-quote-form input[type="submit"],
.tm-header-icons .tm-header-wc-cart-link span.number-cart,
article.themetechmount-box-blog-classic .tm-post-featured-outer-wrapper .tm-postdate,
.tooltip:after, [data-tooltip]:after,
.footer .social-icons li > a:hover,
.tm-search-overlay .tm-site-searchform button,
.tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3-container.tm-vc_btn3-inline .tm-vc_btn3,
.site-footer .widget .tm-contactbox .tm-square-iconbox i,
#totop,
.themetechmount-testimonial-box-style2 .themetechmount-quote-icon:after,
.mailchimp-inputbox button[type="submit"],
.tm-ptablebox-featured-col .tm-ptablebox-content:before{
	background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> );	
}
.tm-post-prev-next-buttons .tm-vc_btn3.tm-vc_btn3-shape-square:hover,
.comment-respond .tm-vc_btn3.tm-vc_btn3-shape-square:hover,
.tm-single-top-btn .tm-vc_btn3.tm-vc_btn3-shape-square:hover,
.mailchimp-inputbox button[type="submit"]:hover,
.tm-quote-form input[type="submit"]:hover,
.tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:hover,
.newsletter-form input[type="submit"]:hover {
	background-image: linear-gradient(to right, <?php echo esc_attr($second_gradientcolor); ?> , <?php echo esc_attr($first_gradientcolor); ?> );	
}

.imagestyle-one .tm-highlight-box h4 ,
.themetechmount-iconbox-icon .tm-box-icon i {
	width: 55px;
}

.tm-ptablebox-featured-col .tm-ptablebox .tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-outline:hover,
.tm-active-thirditem .row .tm-box-col-wrapper:nth-child(3) .steps-style2 .tm-steps-descbox,
.steps-style2:hover .tm-steps-descbox {
    border-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?>, <?php echo esc_attr($second_gradientcolor); ?>);
    border-image-slice: 1;	
}
.footer .tm-bg.tm-bgcolor-transparent.tm-textcolor-white .social-icons li > a:hover {
	border-color: transparent;
}
<?php } ?>

/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require_once( get_template_directory() .'/css/dynamic-menu-style.php' ); // Functions
?>
/* ********************** Responsive Menu Code END **************************** */


/****************** Custom Code **********************/

<?php
// We are not escaping / sanitizing as we are expecting css code. 
$custom_css_code = themetechmount_get_option('custom_css_code');
if( !empty($custom_css_code) ){
	$custom_css_code = html_entity_decode($custom_css_code);
	echo trim($custom_css_code);
}
?>

/******************************************************/