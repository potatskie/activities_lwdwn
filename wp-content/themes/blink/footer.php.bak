<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Blink
 */

$footer_text        = get_theme_mod( 'footer-text', blink_get_default( 'footer-text' ) );
$hide_footer_credit = (bool) get_theme_mod( 'footer-credits', blink_get_default( 'footer-credits' ) );
$social_links       = blink_get_social_links();

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner-block">
			<div class="footer-links footer-logo">
				<a href="http://lwdwn.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""></a>
			</div>
			<div class="footer-links footer-menu">
				<a href="http://www.lwdwn.com">Venues</a>
				<a href="http://www.lwdwn.com/events/all">Events</a>
				<a href="mailto:admin@lwdwn.com">Contact</a>
				<span>&copy; <span id="copyrighttext"><?php _e('Copyright', 'wpex'); ?> </span><?php echo date('Y'); ?></span>
			</div>
			<div class="footer-links footer-social">
				<a class="fb" href="https://www.facebook.com/lwdwndwnlw">facebook</a>
				<a class="twitter" href="https://twitter.com/lwdwndwnlw">twitter</a>
				<a class="insta" href="http://instagram.com/lwdwn">instagram</a>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
