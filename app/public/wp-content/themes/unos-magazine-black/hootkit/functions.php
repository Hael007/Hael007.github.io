<?php
/**
 * This file contains functions and hooks for styling Hootkit plugin
 *   Hootkit is a free plugin released under GPL license and hosted on wordpress.org.
 *   It is recommended to the user via wp-admin using TGMPA class
 *
 * This file is loaded at 'after_setup_theme' action @priority 10 ONLY IF hootkit plugin is active
 *
 * @package    Unos Magazine Black
 * @subpackage HootKit
 */

// Register HootKit
// Parent added @priority 5
add_filter( 'hootkit_register', 'unosmbl_register_hootkit', 7 );

// Add dynamic CSS for hootkit
add_action( 'hoot_dynamic_cssrules', 'unosmbl_hootkit_dynamic_cssrules', 8 );

/**
 * Register Hootkit
 * Parent added @priority 5
 *
 * @since 1.0
 * @param array $config
 * @return string
 */
if ( !function_exists( 'unosmbl_register_hootkit' ) ) :
function unosmbl_register_hootkit( $config ) {
	// Array of configuration settings.
	if ( isset( $config['supports'] ) && is_array( $config['supports'] ) )
		$config['supports'][] = 'widget-subtitle';
	return $config;
}
endif;

add_action( 'wp_enqueue_scripts', 'unosmbl_enqueue_hootkit', 15 );
if ( !function_exists( 'unosmbl_enqueue_hootkit' ) ) :
function unosmbl_enqueue_hootkit() {

	// Backward compatibility // @deprecated < Unos2.9.16 @7.21
	if ( !function_exists( 'unos_enqueue_childhootkit' ) ) {
	/* 'unos-hootkit' is loaded using 'hoot_locate_style' which loads child theme location. Hence deregister it and load files again */
	wp_deregister_style( 'unos-hootkit' );
	/* Load Hootkit Style - Add dependency so that hotkit is loaded after */
	if ( file_exists( hoot_data()->template_dir . 'hootkit/hootkit.css' ) )
	wp_enqueue_style( 'unos-hootkit', hoot_data()->template_uri . 'hootkit/hootkit.css', array( 'hoot-style' ), hoot_data()->template_version );
	if ( file_exists( hoot_data()->child_dir . 'hootkit/hootkit.css' ) )
	wp_enqueue_style( 'unosmbl-hootkit', hoot_data()->child_uri . 'hootkit/hootkit.css', array( 'hoot-style', 'unos-hootkit' ), hoot_data()->childtheme_version );
	}

}
endif;

add_filter( 'hoot_style_builder_inline_style_handle', 'unosmbl_dynamic_css_hootkit_handle', 8 );
if ( !function_exists( 'unosmbl_dynamic_css_hootkit_handle' ) ) :
function unosmbl_dynamic_css_hootkit_handle( $handle ) {
	// Backward compatibility // @deprecated < Unos2.9.16 @7.21
	if ( !function_exists( 'unos_dynamic_css_childhootkit_handle' ) )
	return 'unosmbl-hootkit';
	else return $handle;
}
endif;

/**
 * Custom CSS built from user theme options for hootkit features
 *
 * @since 1.0
 * @access public
 */
if ( !function_exists( 'unosmbl_hootkit_dynamic_cssrules' ) ) :
function unosmbl_hootkit_dynamic_cssrules() {

	global $hoot_style_builder;

	// Get user based style values
	$styles = unos_user_style();
	extract( $styles );

	$hoot_style_builder->remove( array(
		'.social-icons-icon',
		'#topbar .social-icons-icon, #page-wrapper .social-icons-icon',
	) );

	/*** Add Dynamic CSS ***/

	hoot_add_css_rule( array(
						'selector'  => '.content-block-subtitle',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color'
					) );

}
endif;

/**
 * Modify category placement for widgets
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
add_filter( 'hootkit_post_grid_display_catblock', '__return_true' );
// add_filter( 'hootkit_slider_postlistcarousel_display_catblock', '__return_true' );
// add_filter( 'hootkit_posts_list_display_catblock', '__return_true' );
// add_filter( 'hootkit_content_posts_block_display_catblock', '__return_true' );

/**
 * Modify Post Grid default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosmbl_post_grid_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['unitheight']['desc'] ) )
		$settings['form_options']['unitheight']['desc'] = __( 'Default: 240 (in pixels)', 'unos-magazine-black' );
	return $settings;
}
add_filter( 'hootkit_post_grid_widget_settings', 'unosmbl_post_grid_widget_settings', 5 );
add_filter( 'hootkit_content_grid_widget_settings', 'unosmbl_post_grid_widget_settings', 5 );

/**
 * Modify Ticker default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */

/**
 * Modify Products Cart Icon default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosmvu_products_carticon_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['background'] ) )
		$settings['form_options']['background']['std'] = '#ffe42d';
	if ( isset( $settings['form_options']['fontcolor'] ) )
		$settings['form_options']['fontcolor']['std'] = '#000000';
	return $settings;
}
add_filter( 'hootkit_products_carticon_widget_settings', 'unosmvu_products_carticon_widget_settings', 5 );

/**
 * Filter Ticker and Ticker Posts display Title markup
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosmbl_hootkit_widget_title( $display, $title, $context, $icon = '' ) {
	// if ( $context == 'ticker-posts' || $context == 'ticker' || $context == 'products-ticker' )
	$display = '<div class="ticker-title accent-typo">' . $icon . $title . '</div>';
	return $display;
}
add_filter( 'hootkit_widget_ticker_title', 'unosmbl_hootkit_widget_title', 5, 4 );