<?php
/**
 * Outputs your social links
 *
 * @package WordPress
 * @subpackage Foxy Portfolio
 * @since Foxy Portfolio 1.0
 */


if ( !function_exists('wpex_social_links') ) {
	function wpex_social_links() {
		//define array of icons
		$social_icons = array('twitter','facebook','google','googleplus','pinterest','flickr','yahoo','dribbble','instagram','tumblr','vimeo','youtube','linkedin','forrst', 'apple', 'behance', 'blogger', 'friendfeed','deviantart','digg', 'lastfm', 'netvibes', 'picasa', 'newsvine', 'orkut','reddit','skype','rss','mail','support');
		//return array
		return apply_filters( 'wpex_get_social', $social_icons );
	}
}

if ( !function_exists('wpex_display_social') ) {
	function wpex_display_social() {
		$wpex_social_links = wpex_social_links();
		if ( !$wpex_social_links ) return;
		$output = '<ul id="header-social" class="clr">';
				//get social links from array
				$social_links = wpex_social_links();
				//social loop
				foreach($social_links as $social_link) {
					if(of_get_option($social_link)) {
						$output .='<li><a href="'. esc_url( of_get_option($social_link) ) .'" title="'. $social_link .'" target="_blank" class="wpex-tooltip"><img src="'. get_template_directory_uri() .'/images/social/'.$social_link.'.png" alt="'. $social_link .'" /></a></li>';
					} //option empty
				} //end foreach 
		$output .= '</ul><!-- #social -->';
		echo $output;
	}
}