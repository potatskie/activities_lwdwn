<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 */
?>
<?php wpex_hook_sidebar_before(); ?>

	<?php $wpex_show_sidebar = 'true'; ?>
	<?php if( of_get_option( 'sidebar_layout' ) == 'none' && is_singular( ) ) $wpex_show_sidebar = 'false'; ?>

	<?php if ( $wpex_show_sidebar == 'true' ) { ?>
		<div id="sidebar" class=" container <?php if(of_get_option('sidebar_responsive','') !='1') { echo 'hide-mobile-portrait hide-mobile-landscape'; } ?>">
			<?php wpex_hook_sidebar_top(); ?>
			<?php dynamic_sidebar('sidebar'); ?>
			<?php wpex_hook_sidebar_bottom(); ?>
		</div>
		<!-- /sidebar -->
	<?php } ?>

<?php wpex_hook_sidebar_after(); ?>