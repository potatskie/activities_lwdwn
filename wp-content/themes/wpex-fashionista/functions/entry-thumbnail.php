<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 */


if( ! function_exists( 'wpex_entry_thumbnail' ) ) {
	function wpex_entry_thumbnail() { ?>
		<?php
		if( !has_post_thumbnail() ) return;
		// Overlay Icon
		$url = get_the_permalink();
		$overlay_icon = 'fa fa-plus';
		$extra_classes = '';
		$format = get_post_format();
		if ( 'gallery' == $format ) {
			$overlay_icon ='fa-picture-o';
		} elseif ( 'audio' == $format ) {
			$overlay_icon ='fa-music';
		} elseif ( 'link' == $format ) {
			$url = get_post_meta( get_the_ID(), 'wpex_post_url', true ) ? get_post_meta( get_the_ID(), 'wpex_post_url', true ) : get_the_permalink();
			$overlay_icon ='fa-link';
		} elseif ( 'image' == $format ) {
			$url = wp_get_attachment_url( get_post_thumbnail_id() );
			$extra_classes = 'fancybox';
			$overlay_icon ='fa-arrows-alt';
		} ?>
		<a href="<?php echo $url; ?>" title="<?php the_title(); ?>" class="loop-entry-img-link <?php echo $extra_classes; ?>">
			<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img_size( 'entry', 'width' ), wpex_img_size( 'entry', 'height' ), wpex_img_size( 'entry', 'crop' ) ); ?>" alt="<?php echo the_title(); ?>" />
		</a>
	<?php }
}