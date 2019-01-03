<?php
function gfblock_enqueue_block_banner_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'gfblock-block-banner', // Handle.
		plugin_dir_url( __FILE__ ) . 'block.js', // File.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime â€” Gets file modification time.
	);

	// Styles.
	wp_enqueue_style(
		'gfblock-block-banner-editor', // Handle.
		plugin_dir_url( __FILE__ ) . 'editor.css', // File.
		array( 'wp-edit-blocks' ), // Dependency.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime â€” Gets file modification time.
	);
}
add_action( 'enqueue_block_editor_assets', 'gfblock_enqueue_block_banner_editor_assets' );

/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function gfblock_enqueue_block_banner_assets() {
	wp_enqueue_style(
		'gfblock-banner-frontend', // Handle.
		plugin_dir_url( __FILE__ ) . 'style.css', // File.
		array( 'wp-blocks' ), // Dependency.
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ) // filemtime â€” Gets file modification time.
	);
}
add_action( 'enqueue_block_assets', 'gfblock_enqueue_block_banner_assets' );