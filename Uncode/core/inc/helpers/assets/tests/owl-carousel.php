<?php
/**
 * Owl Carousel test
 */

function uncode_page_require_asset_owl_carousel( $content_array ) {
	global $uncode_post_data, $uncode_check_asset;

	if ( apply_filters( 'uncode_enqueue_owl_carousel', false ) ) {
		return true;
	}

	// Always include owl in pages with Quick Views
	if ( isset( $uncode_post_data['has_quick_view'] ) && $uncode_post_data['has_quick_view'] ) {
		$uncode_check_asset['ilightbox'] = true;
		return true;
	}

	if ( uncode_post_data_is_singular() ) {
		$with_builder = false;
		if ( isset( $uncode_post_data['post_content'] ) && strpos( $uncode_post_data['post_content'], '[vc_row' ) !== false ) {
			$with_builder = true;
		}

		if ( ! $with_builder && isset( $uncode_post_data['post_type'] ) && isset( $uncode_post_data['ID'] ) ) {
			$media_visible = get_post_meta( $uncode_post_data['ID'], '_uncode_specific_media', true );

			if ( $media_visible === '' ) {
				$generic_media_visible = ot_get_option( '_uncode_' . $uncode_post_data['post_type'] . '_media' );
				$media_visible = $generic_media_visible;
			}

			if ( $media_visible !== 'off' ) {
				$generic_media_display = ot_get_option( '_uncode_' . $uncode_post_data['post_type'] . '_featured_media_display' );
				$media_display         = get_post_meta( $uncode_post_data['ID'], '_uncode_featured_media_display', true );

				if ( $media_display === '' ) {
					$media_display = $generic_media_display;
				}

				if ($media_display === 'carousel') {
					$uncode_check_asset['ilightbox'] = true; // This activates also the lightbox
					return true;
				}
			}
		}

		// Always include owl in single products
		if ( $uncode_post_data['post_type'] === 'product' ) {
			$uncode_check_asset['ilightbox'] = true;

			return true;
		}
	}

	foreach ( $content_array as $content ) {
		// Sliders are carousels
		if ( strpos( $content, '[uncode_slider' ) !== false ) {
			return true;
		}

		// Carousels are activated by this property in uncode_index
		if ( strpos( $content, 'index_type="carousel"' ) !== false ) {
			return true;
		}

		// Carousels are activated by this property in vc_gallery
		if ( strpos( $content, 'type="carousel"' ) !== false ) {
			return true;
		}
	}

	return false;
}
