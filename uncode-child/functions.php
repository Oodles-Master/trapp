<?php
add_action('after_setup_theme', 'uncode_language_setup');
function uncode_language_setup()
{
	load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');
}

function theme_enqueue_styles()
{
	$production_mode = ot_get_option('_uncode_production');
	$resources_version = ($production_mode === 'on') ? null : rand();
	if ( function_exists('get_rocket_option') && ( get_rocket_option( 'remove_query_strings' ) || get_rocket_option( 'minify_css' ) || get_rocket_option( 'minify_js' ) ) ) {
		$resources_version = null;
	}
	$parent_style = 'uncode-style';
	$child_style = array('uncode-style');
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', $child_style, $resources_version);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 100);function uncode_custom_block_import_default_placeholders_medias() {	return false;}add_filter( 'uncode_wireframes_create_placeholders_medias', 'uncode_custom_block_import_default_placeholders_medias' );

function uncode_custom_generic_placeholder_media_id( $id ) {
    $placeholders = array(
        5065, // media ID
        5066, // media ID
        5067 // media ID
    );
    $random_placeholder = $placeholders[ mt_rand( 0, count( $placeholders ) - 1 ) ];
    return $random_placeholder;
}
add_filter( 'uncode_wireframes_get_generic_placeholder_media_id', 'uncode_custom_generic_placeholder_media_id' );

