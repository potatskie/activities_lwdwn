<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Link Post Format
 */

wpex_hook_entry_before(); ?>
<?php
	global $is_featured; 
	$post_class = ($is_featured) ? 'loop-entry container featured-entry' : 'loop-entry container';
?>
<article <?php post_class($post_class); ?>>
	<?php wpex_hook_entry_top(); ?>
	<?php wpex_entry_thumbnail(); ?>
	<span class="dbl-arrow">&raquo; </span><?php the_category(); ?>
	<h2><a href="<?php echo get_post_meta(get_the_ID(), 'wpex_post_url', true); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h2>
	<div class="entry-text">
		<?php if( $post->post_excerpt ) { the_excerpt(); } else { the_content(); } ?>
	</div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /entry -->
<?php wpex_hook_entry_after(); ?>
