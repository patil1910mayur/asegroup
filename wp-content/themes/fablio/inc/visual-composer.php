<?php

/* ------------------------- */
/* --- VC Shared Library --- */
require_once get_template_directory().'/inc/vc/vc-shared.php';

/* ------------------------- */
/* --- VC Shared Library --- */
require_once get_template_directory().'/inc/vc/vc-extras.php';


/* -------------------- */
/* --- Element List --- */

// tm_custom_heading
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_custom_heading' );
function themetechmount_vc_custom_element_custom_heading(){ get_template_part('inc/vc/element-tm','custom-heading'); }

// themetechmount_icon
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_icon' );
function themetechmount_vc_custom_element_icon(){ get_template_part('inc/vc/element-tm','icon'); }

// themetechmount_btn
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_btn' );
function themetechmount_vc_custom_element_btn(){ get_template_part('inc/vc/element-tm','btn'); }

// themetechmount_heading
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_heading' );
function themetechmount_vc_custom_element_heading(){ get_template_part('inc/vc/element-tm','heading'); }

// themetechmount_progress_bar
add_action( 'vc_after_init', 'themetechmount_vc_progress_bar' );
function themetechmount_vc_progress_bar(){ get_template_part('inc/vc/element-tm','progress-bar'); }

// themetechmount_attach_image
add_action( 'vc_after_init', 'themetechmount_vc_single_image' );
function themetechmount_vc_single_image(){ get_template_part('inc/vc/element-tm','single-image'); }

// themetechmount_blogbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_blogbox' );
function themetechmount_vc_custom_element_blogbox(){ get_template_part('inc/vc/element-tm','blogbox'); }

// themetechmount_portfoliobox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_portfoliobox' );
function themetechmount_vc_custom_element_portfoliobox(){ get_template_part('inc/vc/element-tm','portfoliobox'); }

// themetechmount_portfoliobox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_servicesbox' );
function themetechmount_vc_custom_element_servicesbox(){ get_template_part('inc/vc/element-tm','servicesbox'); }

// themetechmount_teambox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_teambox' );
function themetechmount_vc_custom_element_teambox(){ get_template_part('inc/vc/element-tm','teambox'); }

// themetechmount_testimonialbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_testimonialbox' );
function themetechmount_vc_custom_element_testimonialbox(){ get_template_part('inc/vc/element-tm','testimonialbox'); }

// themetechmount_clientsbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_clientsbox' );
function themetechmount_vc_custom_element_clientsbox(){ get_template_part('inc/vc/element-tm','clientsbox'); }

// themetechmount_eventsbox
if( class_exists('Tribe__Events__Main') ){
	add_action( 'vc_after_init', 'themetechmount_vc_custom_element_eventsbox' );
	function themetechmount_vc_custom_element_eventsbox(){ get_template_part('inc/vc/element-tm','eventsbox'); }
}

// themetechmount_facts_in_digits
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_facts_in_digits' );
function themetechmount_vc_custom_element_facts_in_digits(){ get_template_part('inc/vc/element-tm','facts-in-digits'); }

// tm_static_contentbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_featureplan_contentbox' );
function themetechmount_vc_custom_element_featureplan_contentbox(){ get_template_part('inc/vc/element-tm','static-contentbox'); }

// themetechmount_cta
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_cta' );
function themetechmount_vc_custom_element_cta(){ get_template_part('inc/vc/element-tm','cta'); }

// themetechmount_twitterbox
if( function_exists('latest_tweets_render') ){
	add_action( 'vc_after_init', 'themetechmount_vc_custom_element_twitterbox' );
	function themetechmount_vc_custom_element_twitterbox(){ get_template_part('inc/vc/element-tm','twitterbox'); }
}

// themetechmount_contactbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_contactbox' );
function themetechmount_vc_custom_element_contactbox(){ get_template_part('inc/vc/element-tm','contactbox'); }

// themetechmount_list
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_list' );
function themetechmount_vc_custom_element_list(){ get_template_part('inc/vc/element-tm','list'); }

// themetechmount_socialbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_socialbox' );
function themetechmount_vc_custom_element_socialbox(){ get_template_part('inc/vc/element-tm','socialbox'); }

// themetechmount_pricelistbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_pricelistbox' );
function themetechmount_vc_custom_element_pricelistbox(){ get_template_part('inc/vc/element-tm','pricelistbox'); }

// tm-pricing-table
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_pricingtable' );
function themetechmount_vc_custom_element_pricingtable(){ get_template_part('inc/vc/element-tm','pricing-table'); }

// tm-processbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_static_contentbox' );
function themetechmount_vc_custom_element_static_contentbox(){ get_template_part('inc/vc/element-tm','processbox'); }

// tm-iconbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_iconbox' );
function themetechmount_vc_custom_element_iconbox(){ get_template_part('inc/vc/element-tm','iconbox'); }

// tm_datecounter
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_datecounter' );
function themetechmount_vc_custom_element_datecounter(){ get_template_part('inc/vc/element-tm','datecounter'); }

// tm_woocategory_block
add_action( 'vc_after_init', 'themetechmount_vc_woocategory_block' );
function themetechmount_vc_woocategory_block(){ get_template_part('inc/vc/element-tm','woocategory-block'); }

// tm_stepbox
add_action( 'vc_after_init', 'themetechmount_vc_custom_element_stepbox' );
function themetechmount_vc_custom_element_stepbox(){ get_template_part('inc/vc/element-tm','stepbox'); }


// themetechmount_cmsbanner_block
add_action( 'vc_after_init', 'themetechmount_vc_cmsbanner_block' );
function themetechmount_vc_cmsbanner_block(){ get_template_part('inc/vc/element-tm','cmsbanner-block'); }