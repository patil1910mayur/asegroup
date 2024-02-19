<?php
global $fablio_theme_options;

$search_input = ( !empty($fablio_theme_options['search_input']) ) ? esc_attr($fablio_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'fablio');

$searchform_title = ( isset($fablio_theme_options['searchform_title']) ) ? esc_attr($fablio_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'fablio');

if( !empty($searchform_title) ){
	$searchform_title = '<div class="tm-form-title">' . esc_attr($searchform_title) . '</div>';
}

if(( !empty( $fablio_theme_options['header_search'] ) && $fablio_theme_options['header_search'] == true ) || !empty( $fablio_theme_options['topbar_search'] ) && $fablio_theme_options['topbar_search'] == true ){

?>
<div class="tm-search-overlay">
	<div class="tm-bg-layer"></div>
	<div class="tm-icon-close"></div>
	<div class="tm-search-outer">
		<?php echo themetechmount_wp_kses($searchform_title); ?>
		<form method="get" class="tm-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="tm-fablio-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>