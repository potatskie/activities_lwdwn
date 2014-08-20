<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 */


if( ! function_exists( 'wpex_social_share' ) ) {
	function wpex_social_share() {
		if( !of_get_option( 'blog_social', '1' ) ) return;
		global $post;
		if ( !$post ) return;
		$postid = $post->ID;
		$permalink = get_permalink($postid);
		$url = urlencode( $permalink );
		$title = urlencode( esc_attr( the_title_attribute( 'echo=0' ) ) );
		$summary = urlencode( wp_trim_words( get_the_content( $postid ), '40' ) );
		$img = urlencode( wp_get_attachment_url( get_post_thumbnail_id( $postid ) ) );
		$source = urlencode( home_url() );
		$share_text = apply_filters( 'wpex_share_text', __( 'Share', 'wpex' ) ); ?>
		<div id="single-share" class="clearfix">
			<h4 class="single-share-title"><?php echo $share_text; ?></h4>
			<div id="single-share-buttons" class="clearfix">
				<?php
				// Twitter ?>
				<a href="http://twitter.com/share?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>" target="_blank" title="<?php _e( 'Share on Twitter', 'wpex' ); ?>" rel="nofollow" class="twitter-share wpex-social-share-button wpex-tooltip" onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="fa fa-twitter"></span></a>
				<?php
				// Facebook ?>
				<a href="http://www.facebook.com/share.php?u=<?php echo $url; ?>" target="_blank" title="<?php _e( 'Share on Facebook', 'wpex' ); ?>" rel="nofollow" class="facebook-share wpex-social-share-button wpex-tooltip" onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="fa fa-facebook"></span></a>
				<?php
				// Google Plus ?>
				<a title="<?php _e( 'Share on Google+', 'wpex' ); ?>" rel="external" href="https://plus.google.com/share?url=<?php echo $url; ?>" class="googleplus-share wpex-social-share-button wpex-tooltip" onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="fa fa-google-plus"></span></a>
				<?php
				// Pinterest ?>
				<a href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&amp;media=<?php echo $img; ?>&amp;description=<?php echo $summary; ?>" target="_blank" title="<?php _e( 'Share on Pinterest', 'wpex' ); ?>" rel="nofollow" class="pinterest-share wpex-social-share-button wpex-tooltip" onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="fa fa-pinterest"></span></a>
				<?php
				// Linkedin ?>
				<a title="<?php _e( 'Share on LinkedIn', 'wpex' ); ?>" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url; ?>&amp;title=<?php echo $title; ?>&amp;summary=<?php echo $summary; ?>&amp;source=<?php echo $source; ?>" target="_blank" rel="nofollow" class="linkedin-share wpex-social-share-button wpex-tooltip" onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="fa fa-linkedin"></span></a>
			</div>
		</div><!-- /single-share -->
	<?php }
}


/* OLD METHOD HTML

<div class="share-btns">
	<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>
	<div class="fb-like" data-send="false" data-show-faces="false" data-layout="button_count"></div>
	<div class="g-plusone" data-size="medium"></div>
	<a data-pin-config="above" href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
</div><!-- /share-btns -->


/* OLD METHOD SCRIPTS - FOR FOOTER.php

	<!-- google plus button -->
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

	<!-- twitter share button -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
	<!-- facebook like button -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, "script", "facebook-jssdk"));</script>
	
	<!-- pinterest share button -->
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
*/