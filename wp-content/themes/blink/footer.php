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
			<div class="footer-top">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer-menu' ) ); ?>
				<div class="footer-links footer-social">
					<a class="fb" href="https://www.facebook.com/lwdwndwnlw"><i class="fa fa-facebook"></i></a>
					<a class="twitter" href="https://twitter.com/lwdwndwnlw"><i class="fa fa-twitter"></i></a>
					<a class="insta" href="http://instagram.com/lwdwn"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="footer-bottom">
				<span>&copy; <span id="copyrighttext"><?php _e('Copyright', 'wpex'); ?> </span><?php echo date('Y'); ?> Lowdown. All Rights Reserved</span>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
