<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Video Post Format
 */

// Display video
if( get_post_meta(get_the_ID(), 'wpex_post_video_oembed', true) !== '') { ?>
	<div class="post-video responsive-video-wrap"><?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_post_video_oembed', true ) ); ?></div>
<?php } elseif( get_post_meta(get_the_ID(), 'wpex_post_video', true) !== '') { ?>
	<div class="post-video responsive-video-wrap"><?php echo do_shortcode( get_post_meta(get_the_ID(), 'wpex_post_video', true) ); ?></div>
<?php } ?>
