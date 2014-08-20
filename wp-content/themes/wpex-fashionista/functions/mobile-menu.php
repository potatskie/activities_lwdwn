<?php
/**
 * Outputs toggles & JS for the responsive menu
 *
 * @package WordPress
 * @subpackage Total
 * @since Total 1.0
*/

if ( ! function_exists( 'wpex_mobile_menu' ) ) {
	function wpex_mobile_menu() {
		echo '<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div><a href="#sidr" class="mobile-menu-toggle"><span class="fa fa-bars"></span>'. __('Browse','wpex') .'<span class="fa fa-caret-down"></span></a>';
	}
}