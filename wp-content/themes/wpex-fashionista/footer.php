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
			<div id="copyright">
				&copy; <?php _e('Copyright', 'wpex'); ?> <?php echo date('Y'); ?>
			</div><!-- /copyright -->
			<?php wp_nav_menu( array(
				'container'			=> 'ul',
				'menu_class'		=> 'footer-menu',
				'theme_location'	=> 'footer_menu',
				'sort_column'		=> 'menu_order',
				'fallback_cb'		=> ''
			)); ?>
		</div><!-- /outerbox -->
	</div><!-- /footer-bottom -->
	<?php wpex_hook_footer_bottom(); ?>
</div><!-- /footer-wrap -->
<?php wpex_hook_footer_after(); ?>
<a href="#toplink" id="toplink"><span class="fa fa-chevron-up"></span></a>
<?php wp_footer(); ?>
</body>
</html>