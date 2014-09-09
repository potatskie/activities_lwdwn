<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get template header
get_header();

//start post loop
while (have_posts()) : the_post(); ?>

<div id="post" class="clearfix">
	<div class="container clearfix">
		<?php
		$format = get_post_format();
		if ( false === $format ) $format = 'standard';
		if($format == 'quote') { ?>
			<div id="single-quote"><?php the_content(); ?><div class="entry-quote-author">- <?php the_title(); ?> -</div></div>
		<?php } elseif($format == 'link'){
			$post_url = get_post_meta(get_the_ID(), 'wpex_post_url', true); ?>
			<div id="single-media-wrap">
				<?php get_template_part( '/formats/single', $format ); ?>
			</div><!-- /single-media-wrap -->
			<div id="single-link">
				<header id="single-heading">
				<h1><a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h1>
			</header><!-- /single-meta -->
			<article class="entry clearfix">
				<?php the_content(); ?>
				<a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><span class="fa fa-link"></span><?php echo $post_url; ?></a>
			</article><!-- /entry -->
			</div><!-- /single-link -->
		<?php } else { ?>
		<div id="single-media-wrap">
			<?php get_template_part( '/formats/single', $format ); ?>
			<div class="meta-overlay">
				<h1><?php the_title(); ?></h1>
				<span>&raquo;</span> <?php the_category(); ?>
			</div>
		</div><!-- /single-media-wrap -->
		
		<div class="text-content-wrapper">
			<header id="single-heading">
				<h1><?php the_excerpt(); ?></h1>
			</header>
			<div class="post-meta">
				<?php wpex_post_meta(); ?>
				<div class="hide-in-small clearfix">
					<?php wpex_social_share(); ?>
					<div class="related-venues clearfix">
						<h3>Lwdwn Venues</h3>
						<ul>
						</ul>
					</div>
				</div>
				
			</div>
			
			<article class="entry clearfix">
				<?php the_content(); ?>
			</article><!-- /entry -->
			
			<?php wp_link_pages(' '); ?>
			
			<div class="show-in-small clearfix">
				<?php wpex_social_share(); ?>
				<div class="related-venues clearfix">
					<h3>Lwdwn Venues</h3>
					<ul>
					</ul>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if(simple_fields_value('venue_ids')): ?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			var url = "http://www.lwdwn.com/findvenue/<?php echo urlencode(simple_fields_value('venue_ids')); ?>";
			jQuery.ajax({
				type: 'GET',
			    url: url,
			    async: false,
			    jsonpCallback: 'loadvenues',
			    contentType: "application/json",
			    dataType: 'jsonp',
			    success: function(venues) {
			    	if(venues.length > 0){
			    		jQuery('.related-venues').show();
			    		var venue_html = '';
			    		jQuery.each(venues, function(i, current_venue){
			    			venue_html += '<li>';
			    			venue_html += '<a href="http://www.lwdwn.com/venue/' + current_venue._id +'" target="_blank" class="image-link">';
			    			venue_html += '<img src="http://lwdwn.com/images/venues/' + current_venue.image + '" alt="' + current_venue.name + '" />';
			    			venue_html += '</a>';
			    			venue_html += '<a href="http://www.lwdwn.com/venue/' + current_venue._id +'" target="_blank" class="name-link">';
			    			venue_html += '<span class="venue-name">' + current_venue.name + '</span>';
			    			venue_html += '<span class="venue-address">' + current_venue.area.toUpperCase() + ', ' + current_venue.street + '</span>';
			    			venue_html += '</li>';
			    		});
			    		jQuery('.related-venues ul').html(venue_html);
				    	console.log(venue_html);
			    	}

			    },
			    error: function(e) {
			       console.log(e.message);
			    }
			});
	    });
	</script>
	<?php endif; ?>
	</div><!-- /container -->
	<br />
    <?php related_posts(); ?>
</div><!-- /post -->

<?php
//end post loop
endwhile;

//get template sidebar
get_sidebar(); ?>

	<?php if(of_get_option('related_random_show') =='1') { ?>
		<?php get_template_part( 'content', 'related' ); ?>
	<?php } ?>

<?php
//get template footer
get_footer(); ?>