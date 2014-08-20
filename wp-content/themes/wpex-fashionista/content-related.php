<?php
if(of_get_option('related') == 'related') {
	$category = get_the_category(); //get first current category ID
	$category = $category[0]->cat_ID;
} else { $category = NULL; }

$this_post = $post->ID; // get ID of current post

$args = array(
	'numberposts' => of_get_option('related_random_count', '10'),
	'orderby' => 'rand',
	'category' => $category,
	'exclude' => $this_post,
	'offset' => null
);
$posts = get_posts($args);
if($posts) { ?>
	<div class="clear"></div>
	<section id="related-posts">
		<div id="related-heading">
			<?php $related_random_title = (of_get_option('related') == 'related') ? __('Related Posts','wpex') : __('More Posts','wpex') ?>
			<h4><span><?php echo $related_random_title; ?></span></h4>
		</div>
		<div id="wpex-grid-wrap">
			<?php
			foreach($posts as $post) : setup_postdata($post);
			$format = get_post_format();
			if ( false === $format ) $format = 'standard';
			get_template_part( '/formats/entry', $format ); endforeach; wp_reset_postdata(); ?>
			</div><!-- /wpex-grid-wrap -->
	</section> 
	<!-- /related-posts --> 
<?php } // no posts found ?>