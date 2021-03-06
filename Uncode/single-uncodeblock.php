<?php

/**
 * The Template for displaying all Content Block posts.
 *
 * @package uncode
 */

get_header();

/**
 * DATA COLLECTION - START
 *
 */

/** Init variables **/
$with_builder = false;

$style = ot_get_option('_uncode_general_style');
$bg_color = ' style-'.$style.'-bg';

while (have_posts()):
	the_post();
	echo '<script type="text/javascript">UNCODE.initHeader();</script>';

	$the_content = uncode_get_the_content();
	if (has_shortcode($the_content, 'vc_row')) {
		$with_builder = true;
	}
	if ($with_builder) {
		$the_content = '<div class="post-content">' . apply_filters('the_content', $the_content) . '</div>';
	} else {
		$the_content = apply_filters('the_content', $the_content);
		$the_content = '<div class="post-content">' . uncode_get_row_template($the_content, '', '', $style, 'page_editable', 'double', true, 'double') . '</div>';
	}

	/** Display post html **/
	echo 	'<article id="post-'. get_the_ID().'" class="'.implode(' ', get_post_class('page-body' . $bg_color)) .'">
          <div class="post-wrapper">
          	<div class="post-body">' . uncode_remove_p_tag($the_content) . '</div>
          </div>
        </article>';

endwhile;
// end of the loop.

get_footer(); ?>
