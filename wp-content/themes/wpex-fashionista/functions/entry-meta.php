<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 */


if( ! function_exists( 'wpex_entry_meta' ) ) {
	function wpex_entry_meta() { ?>
		<ul class="loop-entry-meta clearfix">
			<li class="meta-date"><span class="fa fa-calendar"></span><?php echo get_the_date(); ?></li>
			<?php if( comments_open() ) { ?>
				<li class="meta-comments"><span class="fa fa-comment"></span> <?php comments_popup_link(__('0 comments', 'wpex'), __('1 comment', 'wpex'), __('% comments', 'wpex'), 'comments-link', __('comments closed', 'wpex')); ?></li>
			<?php } ?>
			<?php if( function_exists('zilla_likes') ) { ?><li class="meta-zilla-likes"><?php zilla_likes(); ?></li><?php } ?>
		</ul> <!-- /loop-entry-meta -->
	<?php }
}