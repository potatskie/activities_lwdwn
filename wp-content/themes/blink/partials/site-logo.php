<?php
/**
 * @package Blink
 */
?>

<?php if ( blink_is_wpcom() ) : ?>
	<?php the_site_logo(); ?>
<?php elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) : ?>
	<?php jetpack_the_site_logo(); ?>
<?php endif; ?>
