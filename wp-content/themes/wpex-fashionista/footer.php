<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file outputs your footer content including your footer widgets and copyright info
 */
?>
<div class="clear"></div>
<?php wpex_hook_content_bottom(); ?>
</div><!-- /main-content -->
<?php wpex_hook_content_after(); ?>
</div><!-- /wrap -->

<?php wpex_hook_footer_before(); ?>
<div id="footer-wrap">
	<?php wpex_hook_footer_top(); ?>
	<?php
	//show widgetized footer if enabled
	if(of_get_option('widgetized_footer')) { ?>
	<footer id="footer" class="outerbox">
		<div id="footer-widgets" class="clearfix">
			<div class="footer-box">
				<?php dynamic_sidebar('footer-one'); ?>
			</div>
			<!-- /footer-one -->
			<div class="footer-box">
				<?php dynamic_sidebar('footer-two'); ?>
			</div>
			<!-- /footer-two -->
			<div class="footer-box remove-margin">
				<?php dynamic_sidebar('footer-three'); ?>
			</div>
			<!-- /footer-three -->
		</div>
		<!-- /footer-widgets -->
	</footer>
	<!-- /footer -->
	<?php } //widgetized footer disabled ?>
	<div id="footer-bottom">
		<div class="outerbox clearfix">
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
		</div><!-- /outerbox -->
	</div><!-- /footer-bottom -->
	<?php wpex_hook_footer_bottom(); ?>
</div><!-- /footer-wrap -->
<?php wpex_hook_footer_after(); ?>
<a href="#toplink" id="toplink"><span class="fa fa-chevron-up"></span></a>
<?php wp_footer(); ?>
</body>
</html>