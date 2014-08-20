<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 */


if( ! function_exists( 'wpex_post_meta' ) ) {
	function wpex_post_meta() { ?>
		<ul>
			<li class="meta-single-date"><span class=""></span><?php the_date('jS F, Y'); ?></li>
			<li class="meta-single-cat"><span class=""></span><?php the_category(' / '); ?></li>
			<li class="meta-single-user"><span class=""></span>by <?php the_author_posts_link(); ?></li>
		</ul>
	<?php }
}