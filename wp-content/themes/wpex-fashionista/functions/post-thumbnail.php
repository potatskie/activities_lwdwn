<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 */


if( ! function_exists( 'wpex_post_thumbnail' ) ) {
	function wpex_post_thumbnail() { ?>
		<?php
		if( !has_post_thumbnail() ) return;
		// Overlay Icon
		$overlay_icon = 'fa fa-arrows-alt';
		$url = wp_get_attachment_url( get_post_thumbnail_id() );
		$extra_classes = '';
		$format = get_post_format();
		if ( 'link' == $format ) {
			$url = get_post_meta( get_the_ID(), 'wpex_post_url', true ) ? get_post_meta( get_the_ID(), 'wpex_post_url', true ) : get_the_permalink();
			$overlay_icon ='fa-link';
		} elseif ( 'audio' == $format ) {
			$extra_classes .= ' audio-thumb';
		} elseif ( 'image' == $format ) {
			$extra_classes = 'fancybox';
		} ?>

		<?php if ( 'image' == $format || 'link' == $format ) { ?>
			<a id="post-thumbnail" href="<?php echo $url; ?>" title="<?php the_title(); ?>" class="loop-entry-img-link <?php echo $extra_classes; ?>">
				<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img_size( 'post', 'width' ), wpex_img_size( 'post', 'height' ), wpex_img_size( 'post', 'crop' ) ); ?>" alt="<?php echo the_title(); ?>" />
			</a>
		<?php } else { ?>
			<img id="post-thumbnail" src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img_size( 'post', 'width' ), wpex_img_size( 'post', 'height' ), wpex_img_size( 'post', 'crop' ) ); ?>" alt="<?php echo the_title(); ?>" class="<?php echo $extra_classes; ?>" />
		<?php } ?>

	<?php }
}