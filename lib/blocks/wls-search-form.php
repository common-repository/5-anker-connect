<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package anker-connect
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type/#enqueuing-block-scripts
 */
function wls_search_form_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = dirname( __FILE__ );

	$index_js = 'wls-search-form/index.js';
	wp_register_script(
		'wls-search-form-block-editor',
		plugins_url( $index_js, __FILE__ ),
		[
			'wp-editor',
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		],
		filemtime( "$dir/$index_js" )
	);

	$editor_css = 'wls-search-form/editor.css';
	wp_register_style(
		'wls-search-form-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		[],
		filemtime( "$dir/$editor_css" )
	);

	/*
	$style_css = 'wls-search-form/style.css';
	wp_register_style(
		'wls-search-form-block',
		plugins_url( $style_css, __FILE__ ),
		[],
		filemtime( "$dir/$style_css" )
	);
	*/

	register_block_type( 'anker-connect/wls-search-form', [
		'editor_script' => 'wls-search-form-block-editor',
		'editor_style'  => 'wls-search-form-block-editor',
		// 'style'         => 'wls-search-form-block',
	] );

	wp_set_script_translations( 'wls-search-form-block-editor', '5-anker-connect' );
}

add_action( 'init', 'wls_search_form_block_init' );