<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Quote Post Format
 */

wpex_hook_entry_before(); ?>
<?php
	global $is_featured; 
	$post_class = ($is_featured) ? 'loop-entry entry-quote featured-entry' : 'loop-entry entry-quote';
?>
<article <?php post_class($post_class); ?>>  
	<?php wpex_hook_entry_top(); ?>
	<?php if( $post->post_excerpt ) { the_excerpt(); } else { the_content(); } ?>
	<div class="entry-quote-author">- <?php the_title(); ?> -</div>
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /loop-entry -->

<?php wpex_hook_entry_after();
