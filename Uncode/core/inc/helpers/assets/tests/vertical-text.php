<?php
/**
 * Vertical Text test
 */

function uncode_page_require_asset_vertical_text( $content_array ) {
	if ( apply_filters( 'uncode_enqueue_vertical_text', false ) ) {
		return true;
	}

	// Required by the Vertical Text module
	foreach ( $content_array as $content ) {
		if ( strpos( $content, '[uncode_vertical_text' ) !== false ) {
			return true;
		}
	}

	return false;
}
