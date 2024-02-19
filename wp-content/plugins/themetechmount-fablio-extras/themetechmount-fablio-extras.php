<?php
/*
 * Plugin Name: ThemeTechMount Extras for Fablio Theme
 * Plugin URI: https://www.themetechmount.com
 * Description: ThemeTechMount Plugin for Fablio Theme
 * Version: 1.2
 * Author: ThemeTechMount
 * Author URI: https://www.themetechmount.com
 * Text Domain: tmte
 * Domain Path: /languages
 */

/**
 *  TMTE = ThemeTechMount Theme Extras
 */
define( 'TMTE_VERSION', '1.0' );
define( 'TMTE_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'TMTE_URI', plugins_url( '', __FILE__ ) );

/**
 *  Codestar Framework core files
 */
function themetechmount_fablio_cs_framework_init(){
	defined('CS_OPTION'          ) or define('CS_OPTION',           'fablio');
	defined('CS_ACTIVE_FRAMEWORK') or define('CS_ACTIVE_FRAMEWORK', true    ); // default true
	defined('CS_ACTIVE_METABOX'  ) or define('CS_ACTIVE_METABOX',   true    ); // default true
	defined('CS_ACTIVE_SHORTCODE') or define('CS_ACTIVE_SHORTCODE', true    ); // default true
	defined('CS_ACTIVE_CUSTOMIZE') or define('CS_ACTIVE_CUSTOMIZE', true    ); // default true
	
	// Make shortcode work in text widget
	//add_filter('widget_text', 'do_shortcode');
	add_filter('widget_text', 'do_shortcode', 11);
	
}
add_action( 'init', 'themetechmount_fablio_cs_framework_init', 2 );




/**
 *  Codestar Framework core files
 */
function themetechmount_header_css(){
	echo '
<style>
th#themetechmount_featured_image, td.themetechmount_featured_image {
    width: 115px !important;
}
td.themetechmount_featured_image img{
    max-width: 75px;
	height: auto;
}
</style>
';
}
add_action( 'admin_head', 'themetechmount_header_css' );






add_action( 'plugins_loaded', 'themetechmount_fablio_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function themetechmount_fablio_load_textdomain() {
	load_plugin_textdomain( 'tmte', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}







/**
 *  Custom Post Types - With Post Meta Boxes
 */
if( function_exists('vc_map') ){
	require_once TMTE_DIR . 'vc/themetechmount_iconpicker/themetechmount_iconpicker.php';
	require_once TMTE_DIR . 'vc/themetechmount_style_selector/themetechmount_style_selector.php';
	require_once TMTE_DIR . 'vc/themetechmount_responsive_editor/themetechmount_responsive_editor.php';
	require_once TMTE_DIR . 'vc/themetechmount_attach_image/themetechmount_attach_image.php';
	require_once TMTE_DIR . 'vc-template/themetechmount-vc-template.php';
}
if( file_exists( get_template_directory() . '/inc/tools.php' ) ){
	require_once get_template_directory() . '/inc/tools.php';
} else {
	require_once TMTE_DIR . 'tools.php';
}
require_once TMTE_DIR . 'custom-post-types/tm-portfolio.php';
require_once TMTE_DIR . 'custom-post-types/tm-service.php';
require_once TMTE_DIR . 'custom-post-types/tm-team.php';
require_once TMTE_DIR . 'custom-post-types/tm-testimonial.php';
require_once TMTE_DIR . 'custom-post-types/tm-client.php';


/**
 *  Theme widgets
 */
if( !function_exists('themetechmount_fablio_init_widgets') ){
function themetechmount_fablio_init_widgets(){
	require TMTE_DIR .'widgets/widgets.php';
}
}
add_action( 'widgets_init', 'themetechmount_fablio_init_widgets' );


/**
 *  Shortcodes
 */
require_once TMTE_DIR . 'shortcodes.php';



function themetechmount_rewrite_flush() {
    // ATTENTION: This is *only* done during plugin activation hook
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'themetechmount_rewrite_flush' );




/**
 * Enqueue scripts and styles
 */
if( !function_exists('themetechmount_fablio_scripts_styles') ){
function themetechmount_fablio_scripts_styles() {
	wp_enqueue_script( 'jquery-resize', TMTE_URI . '/js/jquery-resize.min.js', array( 'jquery' ) );
}
}
add_action( 'wp_enqueue_scripts', 'themetechmount_fablio_scripts_styles' );



if( !function_exists('themetechmount_fablio_admin_scripts') ){
function themetechmount_fablio_admin_scripts() {
	wp_enqueue_style( 'tmte-fablio-admin-style', plugins_url('/css/admin-style.css', __FILE__) );
}
}
add_action( 'admin_enqueue_scripts', 'themetechmount_fablio_admin_scripts' );


/**
 * Login page CSS script
 */
if( !function_exists('themetechmount_login_stylesheet') ){
function themetechmount_login_stylesheet() {
    wp_enqueue_style( 'themetechmount-style-login', plugins_url('/css/style-login.min.css', __FILE__)  );
}
}
add_action( 'login_enqueue_scripts', 'themetechmount_login_stylesheet' );



/**
 * @param $param_value
 * @param string $prefix
 *
 * @since 4.2
 * @return string
 */
if( !function_exists('themetechmount_vc_shortcode_custom_css_class') ){
function themetechmount_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
}
}


/**
 *  This function will do encoding things. The encode function is not allowed in theme so we created function in plugin
 */
if( !function_exists('themetechmount_enc_data') ){
function themetechmount_enc_data( $htmldata='' ) {
	return base64_encode($htmldata);
}
}


/**
 *  This function will encode URL
 */
if( !function_exists('themetechmount_url_encode') ){
function themetechmount_url_encode( $url='' ) {
	return urlencode($url);
}
}


/************** Start Plugin Options settings ************************/




/**
 *  This will create option link and option page
 */
if( !function_exists('themetechmount_fablio_register_options_page') ){
function themetechmount_fablio_register_options_page() {
	add_options_page(
		esc_attr__('Fablio Extra Options', 'tmte'),  // Page title in TITLE tag
		esc_attr__('Fablio Extra Options', 'tmte'),  // heading on page
		'manage_options',
		'tmte-fablio',
		'themetechmount_fablio_options_page'
	);
}
}
add_action('admin_menu', 'themetechmount_fablio_register_options_page');


/**
 *  Save plugin options
 */
if( !function_exists('themetechmount_fablio_register_settings') ){
function themetechmount_fablio_register_settings() {
	
	// Social share for Blog
	register_setting( 'tmte_fablio_options_group', 'tmte_fablio_social_share_blog', 'themetechmount_fablio_social_share_blog_callback' );
	//add_option( 'tmte_fablio_option_name', 'This is my option value.');
	
	// Social share for Portfolio
	register_setting( 'tmte_fablio_options_group', 'tmte_fablio_social_share_portfolio', 'themetechmount_fablio_social_share_portfolio_callback' );
	//add_option( 'tmte_fablio_option_name', 'This is my option value.');
	

}
}
add_action( 'admin_init', 'themetechmount_fablio_register_settings' );




if( !function_exists('themetechmount_fablio_social_share_blog_callback') ){
function themetechmount_fablio_social_share_blog_callback( $data ){
	// Save settings to theme options so we can re-use it
	$fablio_toptions = get_option('fablio_theme_options');
	if( !empty($fablio_toptions['post_social_share_services']) ){
		$fablio_toptions['post_social_share_services'] = $data;
		update_option('fablio_theme_options', $fablio_toptions);
	}
	return $data;
}
}



if( !function_exists('themetechmount_fablio_social_share_portfolio_callback') ){
function themetechmount_fablio_social_share_portfolio_callback( $data ){
	// Save settings to theme options so we can re-use it
	$fablio_toptions = get_option('fablio_theme_options');
	if( !empty($fablio_toptions['portfolio_social_share_services']) ){
		$fablio_toptions['portfolio_social_share_services'] = $data;
		update_option('fablio_theme_options', $fablio_toptions);
	}
	return $data;
}
}






if( !function_exists('themetechmount_fablio_options_page') ){
function themetechmount_fablio_options_page(){
	
	// Commong elements
	$fablio_toptions	= get_option('fablio_theme_options');
	$social_list	= array(
						'Facebook'		=> 'facebook',
						'Twitter'		=> 'twitter',
						'Google Plus'	=> 'gplus',
						'Pinterest'		=> 'pinterest',
						'LinkedIn'		=> 'linkedin',
						'Stumbleupon'	=> 'stumbleupon',
						'Tumblr'		=> 'tumblr',
						'Reddit'		=> 'reddit',
						'Digg'			=> 'digg',
					);
	
	
	
	?>
	<div class="wrap"> 
		<h1>Fablio Extra Options</h1>
		
		<form method="post" action="options.php">
		
			<?php settings_fields( 'tmte_fablio_options_group' ); ?>

			<p>This page will set some extra options for Fablio theme. So it will be stored even when you change theme.</p>
			<br><br>
			
			
			<h2>Select Social Share Service (for single Post or Portfolio)</h2>
			<p>The selected social service icon will be visible on single view so user can share on social sites.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="tmte_fablio_option_name"> Select Social Share Service for Blog Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tmte_fablio_social_share_blog = array();
						if( !empty($fablio_toptions['post_social_share_services']) ){
							$tmte_fablio_social_share_blog = $fablio_toptions['post_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tmte_fablio_social_share_blog) && in_array( $social_slug, $tmte_fablio_social_share_blog ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tmte_fablio_social_share_blog[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
				
				<!-- ---------- -->
				<tr valign="top">
					<th scope="row"><label for="tmte_fablio_option_name"> Select Social Share Service for Portfolio Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tmte_fablio_social_share_portfolio = array();
						if( !empty($fablio_toptions['portfolio_social_share_services']) ){
							$tmte_fablio_social_share_portfolio = $fablio_toptions['portfolio_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tmte_fablio_social_share_portfolio) && in_array( $social_slug, $tmte_fablio_social_share_portfolio ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tmte_fablio_social_share_portfolio[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
			</table>
			<?php  submit_button(); ?>
		</form>
		
	</div>
	<?php
}
}



/*******
 *  Social Share links creations
 */
if ( !function_exists( 'themetechmount_social_share_links' ) ){
function themetechmount_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);	
	if( !empty($post_type) ){		
		$post_type = esc_attr($post_type);		
		$social_services = themetechmount_get_option( $post_type.'_social_share_services' );		
		$return = '';
		if( !empty( $social_services ) && is_array( $social_services ) ){		
			foreach( $social_services as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="tm-social-share tm-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TMSocialWindow=window.open(\''. esc_url($link) .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="tm-fablio-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="tm-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}


/*******
 *  Social Share links creations
 */
if ( !function_exists( 'themetechmount_social_share_links' ) ){
function themetechmount_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);
	
	if( !empty($post_type) ){
		
		$post_type = esc_attr($post_type);
		
		${ $post_type.'_social_share_services' } = themetechmount_get_option( $post_type.'_social_share_services' );
		
		$return = '';
		
		if( !empty( ${ $post_type.'_social_share_services' } ) && is_array( ${$post_type.'_social_share_services'} ) && count( ${$post_type.'_social_share_services'} > 0 ) ){
			foreach( ${$post_type.'_social_share_services'} as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="tm-social-share tm-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TMSocialWindow=window.open(\''. esc_url($link) .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="tm-fablio-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="tm-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}





// Show Featured image in the admin section
add_filter( 'manage_post_posts_columns', 'themetechmount_post_set_featured_image_column' );
add_action( 'manage_post_posts_custom_column' , 'themetechmount_post_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'themetechmount_post_set_featured_image_column' ) ) {
function themetechmount_post_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['themetechmount_featured_image'] = esc_attr__( 'Featured Image', 'fablio' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'themetechmount_post_set_featured_image_column_content' ) ) {
function themetechmount_post_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'themetechmount_featured_image' ){
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img style="max-width:75px;height:auto;" src="' . TMTE_URI . '/images/admin-no-image.png" />';
		}
	}
}
}





if( !function_exists('themetechmount_author_socials') ){
function themetechmount_author_socials( $contactmethods ) {
	$contactmethods['twitter']  = esc_attr__( 'Twitter Link', 'fablio' );  // Add Twitter
	$contactmethods['facebook'] = esc_attr__( 'Facebook Link', 'fablio' );  //add Facebook
	$contactmethods['linkedin'] = esc_attr__( 'LinkedIn Link', 'fablio' );  //add LinkedIn
	$contactmethods['gplus']    = esc_attr__( 'Google Plus Link', 'fablio' );  //add Google Plus
	return $contactmethods;
}
}
add_filter('user_contactmethods','themetechmount_author_socials',10,1);





/**
 *  Login page logo link
 */
if( !function_exists('themetechmount_loginpage_custom_link') ){
function themetechmount_loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
}
add_filter('login_headerurl','themetechmount_loginpage_custom_link');






/**
 * Login page logo link title
 */
if( !function_exists('themetechmount_change_title_on_logo') ){
function themetechmount_change_title_on_logo() {
	return esc_attr( get_bloginfo( 'name', 'display' ) );
}
}
add_filter('login_headertext', 'themetechmount_change_title_on_logo');






/**
 *  add skincolor class style
 */
add_action( 'admin_head', 'themetechmount_admin_skincolor_css' );
function themetechmount_admin_skincolor_css(){
	global $fablio_theme_options;
	if( !empty($fablio_theme_options['skincolor']) ){
	?>
	<style>
		.tm_vc_colored-dropdown .skincolor,
		.vc_colored-dropdown .skincolor,
		.vc_btn3.vc_btn3-color-skincolor{  /* VC button */
			background-color: <?php echo esc_attr($fablio_theme_options['skincolor']); ?> !important;
			color: #fff !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-outline{
			color: <?php echo esc_attr($fablio_theme_options['skincolor']); ?> !important;
			border-color: <?php echo esc_attr($fablio_theme_options['skincolor']); ?> !important;
			background-color: transparent !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-3d {
			box-shadow: 0 4px rgba(<?php echo themetechmount_hex2rgb($fablio_theme_options['skincolor']); ?>, 0.73), 0 4px rgb(0, 0, 0) !important;
		}
		
		.vc_btn3.vc_btn3-style-text.vc_btn3-color-skincolor{ /* Normal Text style button */
			color: <?php echo esc_attr($fablio_theme_options['skincolor']); ?> !important;
			background-color: transparent !important;
		}
		
	</style>
	<?php
	}
}







/**
 *  Login page stylesheet
 */
if( !function_exists('themetechmount_login_page_css') ){
function themetechmount_login_page_css() {
	$fablio_theme_options = get_option('fablio_theme_options');
	
	$bg_size = '';
	$return  = '.login #backtoblog a, .login #nav a{color: white; text-shadow: 1px 1px black;}
	.login #backtoblog a:hover, .login #nav a:hover{color: white; text-decoration: underline;}
	';
	
	// Custom CSS Code for login page only
	if( isset($fablio_theme_options['login_custom_css_code']) && trim($fablio_theme_options['login_custom_css_code'])!='' ){
		$return .= $fablio_theme_options['login_custom_css_code'];
	}
	
	// Login page background
	$return .= themetechmount_get_background_css('body.login', $fablio_theme_options['login_background']);
	
	
	$logo_a_tag = '';
	$image      = '';
	$imgwidth   = '';
	$imgheight  = '';
	$bg_size    = '';
	
	if( !empty($fablio_theme_options['logoimg']) ){
		
		if( !empty($fablio_theme_options['logoimg']['full-url']) ){
			
			$image = $fablio_theme_options['logoimg']['full-url'];  // Image src
			
			if( function_exists('getimagesize') ){
				$imgsize_array = getimagesize( $fablio_theme_options['logoimg']['full-url'] );
				$imgwidth      = $imgsize_array[0];  // Image width
				$imgheight     = $imgsize_array[1];  // Image height
			}
			
		} else if( isset($fablio_theme_options['logoimg']['id']) && trim($fablio_theme_options['logoimg']['id'])!='' ){
			$image     = wp_get_attachment_image_src( $fablio_theme_options['logoimg']['id'], 'full' );
			$imgwidth  = $image[1];  // Image width
			$imgheight = $image[2];  // Image height
			$image     = $image[0];  // Image src
		}
		
		if( !empty($imgwidth) && $imgwidth>320 ){
			$imgheight = ceil( ($imgheight / $imgwidth) * 320 );
			$imgwidth  = 320;
			$bg_size   = 'background-size: 100%;';
		}
		
		
		
		if( !empty($image) ){
			$logo_a_tag .= 'background-image: url("'. $image .'");';
		}
		if( !empty($imgwidth) ){
			$logo_a_tag .= 'width:'. $imgwidth .'px;';
		}
		if( !empty($imgheight) ){
			$logo_a_tag .= 'height:'. $imgheight .'px;';
		}
	}
	
	// Login button
	if( !empty($fablio_theme_options['skincolor']) ){
		$return .= '#wp-submit{background-color:'. $fablio_theme_options['skincolor'] .'}';
	}
	
	if( !empty($logo_a_tag) ){
		$return .= '.login #login form{background-color: #f7f7f7; box-shadow: none;}';
		$return .= '.login #login h1 a{ background-size:cover; '. $logo_a_tag .' '. $bg_size .' }';
	}
	
	// Remove text shadow from login button
	$return .= '.wp-core-ui #login .button-primary {text-shadow: none;}';
	
	if( !empty($return) ){
		echo '<style type="text/css"> /* ThemeTechMount CSS for login page */ '. $return .'</style>';
	}
	
}
}
add_action('login_head', 'themetechmount_login_page_css');



/**
 *  W#C Remove type attribute from css & script tags fles
*/

function themetechmount_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if( !themetechmount_is_login_page() && !is_admin() ){

	add_filter('style_loader_tag', 'themetechmount_remove_type_attribute', 10, 2);
	add_filter('script_loader_tag', 'themetechmount_remove_type_attribute', 10, 2);
		
	// remove type from all css & script tags from files
	if( !function_exists('themetechmount_remove_type_attribute') ){
	function themetechmount_remove_type_attribute($tag, $handle) {
		return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
	}
	}
	add_action('shutdown', 'themetechmount_output_loading_end');
	function themetechmount_output_loading_end() { 
		if (ob_get_contents()){ ob_end_flush(); }
	}
	
}


/**
 *  Delete WPBackery Welcome page
 */
function delete_wpbackery_welcomepage(){
	delete_transient( '_vc_page_welcome_redirect' );
}
add_action( 'admin_init', 'delete_wpbackery_welcomepage', 1 );



/**
 *  Create New Param Type : Info
 */
if( function_exists('vc_add_shortcode_param') ){
	vc_add_shortcode_param( 'themetechmount_info', 'themetechmount_vc_param_info' );
	function themetechmount_vc_param_info( $settings, $value ) {
		$return  = '';
		$head    = ( !empty($settings['head']) ) ? '<h2 class="kw_vc_info_heading">'.$settings['head'].'</h2>' : '' ;
		$subhead = ( !empty($settings['subhead']) ) ? '<h4 class="kw_vc_info_subheading">'.$settings['subhead'].'</h4>' : '' ;
		$desc    = ( !empty($settings['desc']) ) ? '<div class="kw_vc_info_desc">'.$settings['desc'].'</div>' : '' ;
		
		
		
		
		$return .= '<div class="themetechmount_vc_param_info '.$settings['param_name'].'">'
					. '<div class="themetechmount_vc_param_info_inner">'
						. $head
						. $subhead
						. $desc 
					. '</div>'
			   . '</div>'; // This is html markup that will be outputted in content elements edit form
	   return $return;
	}
}



/**
 * Register widget areas.
 *
 * @since Fablio 1.0
 *
 * @return void
 */
function fablio_widgets_init() {
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Blog', 'fablio' ),
		'id' => 'sidebar-left-blog',
		'description' => esc_attr__( 'This is left sidebar for blog section', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Blog', 'fablio' ),
		'id' => 'sidebar-right-blog',
		'description' => esc_attr__( 'This is right sidebar for blog section', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Pages', 'fablio' ),
		'id' => 'sidebar-left-page',
		'description' => esc_attr__( 'This is left sidebar for pages', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Pages', 'fablio' ),
		'id' => 'sidebar-right-page',
		'description' => esc_attr__( 'This is right sidebar for pages', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Portfolio - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Portfolio', 'fablio' ),
		'id' => 'sidebar-left-portfolio',
		'description' => esc_attr__( 'This is left sidebar for Portfolio', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Portfolio', 'fablio' ),
		'id' => 'sidebar-right-portfolio',
		'description' => esc_attr__( 'This is right sidebar for Portfolio', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio Category - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Portfolio Category', 'fablio' ),
		'id' => 'sidebar-left-portfoliocat',
		'description' => esc_attr__( 'This is left sidebar for Portfolio Category pages.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio Category - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Portfolio Category', 'fablio' ),
		'id' => 'sidebar-right-portfoliocat',
		'description' => esc_attr__( 'This is right sidebar for Portfolio Category pages.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		// Service - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Service', 'fablio' ),
		'id' => 'sidebar-left-service',
		'description' => esc_attr__( 'This is left sidebar for Service', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Service', 'fablio' ),
		'id' => 'sidebar-right-service',
		'description' => esc_attr__( 'This is right sidebar for Service', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service Category - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Service Category', 'fablio' ),
		'id' => 'sidebar-left-servicecat',
		'description' => esc_attr__( 'This is left sidebar for Service Category pages.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service Category - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Service Category', 'fablio' ),
		'id' => 'sidebar-right-servicecat',
		'description' => esc_attr__( 'This is right sidebar for Service Category pages.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Team Member - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Team Member', 'fablio' ),
		'id' => 'sidebar-left-team-member',
		'description' => esc_attr__( 'This is left sidebar for Team Member', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Team Member - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Team Member', 'fablio' ),
		'id' => 'sidebar-right-team-member',
		'description' => esc_attr__( 'This is right sidebar for Team Member', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Team Member Group - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Team Member Group pages', 'fablio' ),
		'id' => 'sidebar-left-team-member-group',
		'description' => esc_attr__( 'This is left sidebar for Team Member Group.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Team Member Group - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Team Member Group pages', 'fablio' ),
		'id' => 'sidebar-right-team-member-group',
		'description' => esc_attr__( 'This is right sidebar for Team Member Group', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Search', 'fablio' ),
		'id' => 'sidebar-left-search',
		'description' => esc_attr__( 'This is left sidebar for search', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for search', 'fablio' ),
		'id' => 'sidebar-right-search',
		'description' => esc_attr__( 'This is right sidebar for search', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	if( function_exists('is_woocommerce') ){
		// WooCommerce - Left
		register_sidebar( array(
			'name' => esc_attr__( 'Left Sidebar for WooCommerce Shop', 'fablio' ),
			'id' => 'sidebar-left-woocommerce',
			'description' => esc_attr__( 'This is left sidebar for WooCommerce shop pages.', 'fablio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		// WooCommerce - Right
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for WooCommerce Shop', 'fablio' ),
			'id' => 'sidebar-right-woocommerce',
			'description' => esc_attr__( 'This is right sidebar for WooCommerce shop pages.', 'fablio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	
	if( function_exists('is_bbpress') ){
		// BBPress - Left
		register_sidebar( array(
			'name'          => esc_attr__( 'Left Sidebar for BBPress', 'fablio' ),
			'id'            => 'sidebar-left-bbpress',
			'description'   => esc_attr__( 'This is left sidebar for BBPress.', 'fablio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// BBPress - Right
		register_sidebar( array(
			'name'          => esc_attr__( 'Right Sidebar for BBPress', 'fablio' ),
			'id'            => 'sidebar-right-bbpress',
			'description'   => esc_attr__( 'This is right sidebar for BBPress.', 'fablio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	if( function_exists('tribe_is_upcoming') ){
		// The Events Calendar - Left
		register_sidebar( array(
			'name'          => esc_attr__( 'Left Sidebar for Events', 'fablio' ),
			'id'            => 'sidebar-left-events',
			'description'   => esc_attr__( 'This is left sidebar for "The Events Calendar" plugin only.', 'fablio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// The Events Calendar - Right
		register_sidebar( array(
			'name'          => esc_attr__( 'Right Sidebar for Events', 'fablio' ),
			'id'            => 'sidebar-right-events',
			'description'   => esc_attr__( 'This is right sidebar for "The Events Calendar" plugin only.', 'fablio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - Top', 'fablio' ),
		'id'            => 'floating-widgets-top',
		'description'   => esc_attr__( 'This widget will appear (as full width) before the widget columns. So you can set any full width content here.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 1st column', 'fablio' ),
		'id'            => 'floating-widgets-1',
		'description'   => esc_attr__( 'Set 1st column widgets for Floatingbar area.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 2nd column', 'fablio' ),
		'id'            => 'floating-widgets-2',
		'description'   => esc_attr__( 'Set 2nd column widgets for Floatingbar area.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 3rd column', 'fablio' ),
		'id'            => 'floating-widgets-3',
		'description'   => esc_attr__( 'Set 3rd column widgets for Floatingbar area.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 4th column', 'fablio' ),
		'id'            => 'floating-widgets-4',
		'description'   => esc_attr__( 'Set 4th column widgets for Floatingbar area.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - Bottom', 'fablio' ),
		'id'            => 'floating-widgets-bottom',
		'description'   => esc_attr__( 'This widget will appear (as full width) after the widget columns. So you can set any full width content here.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	// First Footer widgets
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 1st Widget Area', 'fablio' ),
		'id' => 'first-footer-1-widget-area',
		'description' => esc_attr__( 'This is first footer widget area for first row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 2nd Widget Area', 'fablio' ),
		'id' => 'first-footer-2-widget-area',
		'description' => esc_attr__( 'This is second footer widget area for first row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 3rd Widget Area', 'fablio' ),
		'id' => 'first-footer-3-widget-area',
		'description' => esc_attr__( 'This is third footer widget area for first row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 4th Widget Area', 'fablio' ),
		'id' => 'first-footer-4-widget-area',
		'description' => esc_attr__( 'This is fourth footer widget area for first row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Second Footer widgets
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 1st Widget Area', 'fablio' ),
		'id' => 'second-footer-1-widget-area',
		'description' => esc_attr__( 'This is first footer widget area for second row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 2nd Widget Area', 'fablio' ),
		'id' => 'second-footer-2-widget-area',
		'description' => esc_attr__( 'This is second footer widget area for second row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 3rd Widget Area', 'fablio' ),
		'id' => 'second-footer-3-widget-area',
		'description' => esc_attr__( 'This is third footer widget area for second row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 4th Widget Area', 'fablio' ),
		'id' => 'second-footer-4-widget-area',
		'description' => esc_attr__( 'This is fourth footer widget area for second row of footer.', 'fablio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	// Dynamic Sidebars (Unlimited Sidebars)
	global $fablio_theme_options;
	$fablio_theme_options = get_option('fablio_theme_options');
	if( isset($fablio_theme_options['custom_sidebars']) && is_array($fablio_theme_options['custom_sidebars']) && count($fablio_theme_options['custom_sidebars'])>0 ){
		foreach( $fablio_theme_options['custom_sidebars'] as $custom_sidebar ){
			
			if( isset($custom_sidebar['custom_sidebar']) && trim($custom_sidebar['custom_sidebar'])!='' ){
				$custom_sidebar = $custom_sidebar['custom_sidebar'];
				if( trim($custom_sidebar)!='' ){
					$custom_sidebar_key = sanitize_title($custom_sidebar);
					register_sidebar( array(
						'name'          => $custom_sidebar,
						'id'            => $custom_sidebar_key,
						'description'   => esc_attr__( 'This is custom widget developed from "Fablio Options".', 'fablio' ),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>',
					) );
				}
			}
			
		}
	}
	
}
add_action( 'widgets_init', 'fablio_widgets_init' );

