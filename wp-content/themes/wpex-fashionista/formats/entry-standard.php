<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Standard Post Format
 */

wpex_hook_entry_before(); ?>
<?php

	global $is_featured; 
	$post_class = ($is_featured) ? 'loop-entry container featured-entry' : 'loop-entry container';

	$thisweekpost = true;
	$thisweekpost = $thisweekpost && (date('W') == get_the_date('W'));
	$thisweekpost = $thisweekpost && (date('Y') == get_the_date('Y'));

	$post_class .= ($thisweekpost) ? ' category-this-week' : '';
?>
<article <?php post_class($post_class); ?>>
	<?php wpex_hook_entry_top(); ?>
	<?php wpex_entry_thumbnail(); ?>
	<span class="dbl-arrow">&raquo; </span><?php the_category(); ?>
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<div class="entry-text">
		<?php the_excerpt();?>
	</div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /entry -->

<?php wpex_hook_entry_after();
