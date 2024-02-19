<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Getting skin color */
$skincolor = themetechmount_get_option('skincolor');

/* Dark BG color */
$secondarycolor = themetechmount_get_option('secondarycolor');

/* Grey BG color */
$secondarygreycolor = themetechmount_get_option('secondary-greycolor');

/* Blackish Button Color */
$blackish_buttoncolor = themetechmount_get_option('blackish_buttoncolor');
$special_element_font  = themetechmount_get_option('element_title');
$special_element_fontfamily   = $special_element_font['family'];
$special_element_fontweight   = $special_element_font['variant'];
$general_font = themetechmount_get_option('general_font');
$h4_heading_font = themetechmount_get_option('h4_heading_font');
$h4_heading_font_fontweight   = $h4_heading_font['variant'];

if( $h4_heading_font_fontweight == 'regular' ){
	$h4_heading_font_fontweight  = '400';
}

$general_font = themetechmount_get_option('general_font');

/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}

?>


.elementor-column.elementor-top-column.tm-col-bgcolor-darkgrey:not(.tm-bgimage-yes) .elementor-widget-wrap>.tm-stretched-div, .elementor-column.elementor-top-column.tm-col-bgcolor-darkgrey:not(.tm-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.tm-col-bgcolor-darkgrey:not(.tm-bgimage-yes)>.elementor-widget-wrap
{
	background-color: <?php echo esc_attr($secondarycolor); ?> !important;
}

.elementor-column.elementor-top-column.tm-col-bgcolor-darkgrey.tm-bgimage-yes .elementor-widget-wrap .tm-stretched-div:before {
    background-color: rgba( <?php echo themetechmount_hex2rgb($secondarycolor); ?>,0.90)!important;
}

.elementor-section.elementor-top-section.tm-bgcolor-darkgrey,
.elementor-section.elementor-top-section.tm-bgcolor-darkgrey:before,
.elementor-section.elementor-inner-section.tm-bgcolor-darkgreys,
.elementor-progress-wrapper {
   background-color: <?php echo esc_attr($secondarycolor); ?>;
}

/***Secondary Grey color***/

.elementor-column.elementor-top-column.tm-col-bgcolor-grey:not(.tm-bgimage-yes) .elementor-widget-wrap>.tm-stretched-div, .elementor-column.elementor-top-column.tm-col-bgcolor-grey:not(.tm-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.tm-col-bgcolor-grey:not(.tm-bgimage-yes)>.elementor-widget-wrap {
	background-color: <?php echo esc_attr($secondarygreycolor); ?> !important;
}
.elementor-column.elementor-top-column.tm-col-bgcolor-grey.tm-bgimage-yes .elementor-widget-wrap .tm-stretched-div:before {
    background-color: rgba( <?php echo themetechmount_hex2rgb($secondarygreycolor); ?>,0.70)!important;
}
.elementor-section.elementor-top-section.tm-bgcolor-grey,
.elementor-section.elementor-top-section.tm-bgcolor-grey:before,
.elementor-section.elementor-inner-section.tm-bgcolor-grey,
.tm-btn-style-flat.tm-btn-color-grey .elementor-button {
   background-color: <?php echo esc_attr($secondarygreycolor); ?>;
}

.elementor-column.elementor-top-column.tm-col-bgcolor-skincolor:not(.tm-bgimage-yes) .elementor-widget-wrap>.tm-stretched-div, .elementor-column.elementor-top-column.tm-col-bgcolor-skincolor:not(.tm-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.tm-col-bgcolor-skincolor:not(.tm-bgimage-yes)>.elementor-widget-wrap
{
	background-color: <?php echo esc_attr($skincolor); ?> !important;
}
.elementor-column.elementor-top-column.tm-col-bgcolor-skincolor.tm-bgimage-yes .elementor-widget-wrap .tm-stretched-div:before {
    background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?>,0.85)!important;
}

.elementor-section.elementor-top-section.tm-bgcolor-skincolor,
.elementor-section.elementor-top-section.tm-bgcolor-skincolor:before,
 .elementor-section.elementor-inner-section.tm-bgcolor-skincolor,
 .tm-btn-style-flat.tm-btn-color-skincolor .elementor-button,
.elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar{
   background-color: <?php echo esc_attr($skincolor); ?>;
}
.themetechmount-iconbox.themetechmount-iconcolor-skincolor .tm-box-icon i {
	color: <?php echo esc_attr($skincolor); ?>;
}
.themetechmount-iconbox.themetechmount-iconcolor-darkgrey .tm-box-icon i {
	color: <?php echo esc_attr($blackish_buttoncolor); ?>;
}



.tm-btn-style-flat.tm-btn-color-darkgrey .elementor-button,
.tm-btn-style-flat.tm-btn-color-skincolor .elementor-button:hover{
	background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}

.themetechmount-iconbox.themetechmount-iconbox-styletwo .tm-iocnbox-btn a:hover,
.tm-btn-style-flat.tm-btn-color-grey .elementor-button,
.tm-btn-style-flat.tm-btn-color-white .elementor-button,
.tm-btn-style-text.tm-btn-color-darkgrey .elementor-button{
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.tm-btn-style-flat.tm-btn-color-darkgrey.tm-btn-shape-square:not(.tm-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:before,
.tm-btn-style-flat.tm-btn-color-darkgrey.tm-btn-shape-square:not(.tm-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:after,

.tm-btn-style-flat.tm-btn-color-skincolor.tm-btn-shape-square:not(.tm-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:before,
.tm-btn-style-flat.tm-btn-color-skincolor.tm-btn-shape-square:not(.tm-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:after{
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.themetechmount-iconbox.themetechmount-iconcolor-darkgrey .tm-box-icon i,
.tm-btn-style-outline.tm-btn-color-white .elementor-button:hover,
.tm-btn-style-text.tm-btn-color-skincolor .elementor-button:hover{
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.tm-btn-style-text.tm-btn-color-grey .elementor-button{
	color:<?php echo esc_attr($secondarygreycolor); ?>;
}
.tm-btn-style-flat.tm-btn-color-grey .elementor-button{
   background-color: <?php echo esc_attr($secondarygreycolor); ?>;
}
.tm-btn-style-outline.tm-btn-color-grey .elementor-button{
	border-color:<?php echo esc_attr($secondarygreycolor); ?> !important;
	color:<?php echo esc_attr($secondarygreycolor); ?>;
}
.tm-btn-style-outline.tm-btn-color-grey .elementor-button:hover{
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	background-color:<?php echo esc_attr($secondarygreycolor); ?>;
}
.tm-btn-style-outline.tm-btn-color-skincolor .elementor-button{
	border-color:<?php echo esc_attr($skincolor); ?>;
	color:<?php echo esc_attr($skincolor); ?>;
}
.tm-btn-style-outline.tm-btn-color-skincolor .elementor-button:hover{
	color:#fff;
	background-color:<?php echo esc_attr($skincolor); ?>;
	border-color:<?php echo esc_attr($skincolor); ?>;
}
.tm-btn-style-outline.tm-btn-color-darkgrey .elementor-button{
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.tm-btn-style-outline.tm-btn-color-darkgrey .elementor-button:hover{
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	color:#fff;
	background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}


.elementor-widget-progress .elementor-title {
	font-family:<?php echo esc_attr($special_element_font['family']); ?>;
	font-weight:<?php echo esc_attr($special_element_font['variant']); ?>;
}
.themetechmount-iconbox.themetechmount-iconcolor-grey .tm-box-icon i {
    color:<?php echo esc_attr($secondarygreycolor); ?>;
}
.themetechmount-iconbox.themetechmount-icon-bgcolor-grey.tm-iconstyle-outline-boxed .tm-box-icon,
.themetechmount-iconbox.themetechmount-icon-bgcolor-grey.tm-iconstyle-outline-rounded .tm-box-icon,
.themetechmount-iconbox.themetechmount-icon-bgcolor-grey.tm-iconstyle-outline-rounded-less .tm-box-icon {
	border-color: <?php echo esc_attr($secondarygreycolor); ?>;
}
.themetechmount-iconbox.themetechmount-icon-bgcolor-darkgrey.tm-iconstyle-outline-boxed .tm-box-icon,
.themetechmount-iconbox.themetechmount-icon-bgcolor-darkgrey.tm-iconstyle-outline-rounded .tm-box-icon,
.themetechmount-iconbox.themetechmount-icon-bgcolor-darkgrey.tm-iconstyle-outline-rounded-less .tm-box-icon {
	border-color: <?php echo esc_attr($secondarycolor); ?>;
}
.elementor-element .tm-ptablebox .tm-ptablebox-featured-col .tm-vc_btn3-container.tm-vc_btn3-inline .tm-vc_btn3:hover,
.elementor-element .tm-ptablebox .tm-vc_btn3-container.tm-vc_btn3-inline .tm-vc_btn3:hover,
.themetechmount-iconbox.themetechmount-icon-bgcolor-darkgrey .tm-box-icon {
	background-color: <?php echo esc_attr($secondarycolor); ?>;	
}
.themetechmount-iconbox.themetechmount-icon-bgcolor-grey .tm-box-icon {
	background-color: <?php echo esc_attr($secondarygreycolor); ?>;	
}
.themetechmount-iconbox.themetechmount-icon-bgcolor-white .tm-box-icon {
	background-color:#fff;	
}
.themetechmount-iconbox.themetechmount-icon-bgcolor-white .tm-box-icon {
    border-color: #fff;
}

.themetechmount-blogbox-styleone .themetechmount-blogbox-footer-left a {
	font-size:<?php echo esc_attr($general_font['font-size']); ?>px;
}