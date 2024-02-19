<?php
/*
 * Plugin Name: ThemetechMount Fablio Demo Content Setup
 * Plugin URI: https://www.themetechmount.com
 * Description: Fablio Demo Content Setup Plugin By ThemetechMount
 * Version: 1.0
 * Author: ThemetechMount
 * Author URI: https://www.themetechmount.com
 * Text Domain: fablio-demosetup
 * Domain Path: /languages
 */
 
 
 
/**
 *  Version and directory
 */
define( 'FABLIO_TMDC_VERSION', '1.0' );
define( 'FABLIO_TMDC_DIR', plugin_dir_path( __FILE__ ) );
define( 'FABLIO_TMDC_URI', plugins_url( '', __FILE__ ) );



/**
 *  Demo Content setup
 */
require_once FABLIO_TMDC_DIR . 'one-click-demo/demo-content.php';



/**
 *  Translation
 */
function fablio_demosetup_load_plugin_textdomain() {
	$domain = 'fablio-demo-content-setup';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	if ( $loaded = load_textdomain( 'fablio-demosetup', trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
		return $loaded;
	} else {
		load_plugin_textdomain( 'fablio-demosetup', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'fablio_demosetup_load_plugin_textdomain' );



/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function fablio_demosetup_load_textdomain() {
	load_plugin_textdomain( 'fablio-demosetup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'fablio_demosetup_load_textdomain' );







function fablio_demo_content_scripts_styles(){

	wp_enqueue_style(
		'tm-one-click-demo-style',
		plugin_dir_url( __FILE__ ) . 'style.css',
		time(),
		true
	);
	wp_enqueue_script(
		'tm-one-click-demo-set-js',
		plugin_dir_url( __FILE__ ) . 'functions.js',
		array( 'jquery' ),
		time(),
		true
	);
	


}
add_action( 'admin_enqueue_scripts', 'fablio_demo_content_scripts_styles', 20 );



/**
 * HTML Output for the one click demo setup
 *
 * @since 1.0.0
 */
if( !function_exists('themetechmount_fablio_one_click_html') ){
function themetechmount_fablio_one_click_html() {
	?>
	
	<div id="import-demo-data-results">
				
		<div class="import-demo-data-text-w">
		
			<div class="import-demo-data-layout">
				<!-- <h3>Select demo data type  <small>(select below)</small>: </h3> -->
				
				<div class="tm-import-demo-left">
					<div class="tm-import-demo-left-inner">
						
						<select id="import-layout-type" name="import-layout-type">
							<option value="Classic">Classic Site</option>
							<option value="Elegant">Elegant Site</option>
							<option value="Infostack">Infostack Site</option>
							<option value="RTL">RTL Site</option>	
							<option value="Demo2">Demo2 Site</option>	
							<option value="Onepage">One page</option>	
							<option value="Demo3">Demo3</option>	
							<option value="classic-elementor">Classic Site (Elementor Builder)</option>	
							<option value="elegant-elementor">Elegant Site (Elementor Builder)</option>	
							<option value="infostack-elementor">Infostack Site (Elementor Builder)</option>	
							<option value="Demo4">Demo4 (Elementor Builder)</option>
						</select>
						
						<br><br><hr>
						
						<div class="import-demo-data-text">
						
							<strong><?php esc_attr_e('NOTE:', 'fablio'); ?></strong>
							<?php esc_attr_e('This process may overwrite your existing content or settings. So please do this on fresh WordPress setup only.', 'fablio'); ?>
							<br /><br />
							<?php esc_attr_e('Also if you already included demo data than this will add multiple menu links and you need to remove the repeated menu items by going to "Admin > Appearance > menus" section.', 'fablio'); ?>
							
						</div>

						
					</div>
				</div>
				
				<div class="tm-import-demo-right">
				
					<!-- Multi purpose -->
					<span class="import-demo-thumb-w import-demo-thumb-classic">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/home3/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-classic.png" alt="Classic">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Elegant -->
					<span class="import-demo-thumb-w import-demo-thumb-elegant" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-elegant.png" alt="elegant">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Overlay-Infostack -->
					<span class="import-demo-thumb-w import-demo-thumb-infostack" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/home2/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-infostack.png" alt="Infostack">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- rtl -->
					<span class="import-demo-thumb-w import-demo-thumb-rtl" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/fablio-rtl/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-rtl.png" alt="RTL">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Demo2 -->
					<span class="import-demo-thumb-w import-demo-thumb-demo2" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/demo2" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-demo2.png" alt="Demo2">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Onepage -->
					<span class="import-demo-thumb-w import-demo-thumb-onepage" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/fablio-onepage/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-onepage.png" alt="Onepage">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Demo3 -->
					<span class="import-demo-thumb-w import-demo-thumb-demo3" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/demo3" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-demo3.png" alt="Demo3">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Classic-Elementor -->
					<span class="import-demo-thumb-w import-demo-thumb-classic-elementor" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/elementor/home3/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-classic.png" alt="Demo3">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Elegant -->
					<span class="import-demo-thumb-w import-demo-thumb-elegant-elementor" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/elementor/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-elegant.png" alt="elegant">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Overlay-Infostack -->
					<span class="import-demo-thumb-w import-demo-thumb-infostack-elementor" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/elementor/home2/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-infostack.png" alt="Infostack">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Overlay-Infostack -->
					<span class="import-demo-thumb-w import-demo-thumb-demo4" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://themetechmount.com/wordpress/fablio/demo4/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-demo4.png" alt="demo4">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
				</div>
				
				<div class="clear clr"></div>
				
			</div>
		
			
			<br /><br />
			<input type="button" class="button button-primary" id="themetechmount_one_click_demo_content" value="<?php esc_attr_e('I agree, continue demo content setup', 'fablio'); ?>" /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			<a href="#" class="tm-one-click-error-close"><?php esc_attr_e('Cancel', 'fablio' ); ?></a>
		</div>
	
	</div>
	
	<div class="clear"></div>
	
	<?php
}
}