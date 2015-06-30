<?php
/**
 * The template for displaying all single posts.
 *
 * @package Blink
 */

$hide_navigation = (bool) get_theme_mod( 'layout-post-navigation', blink_get_default( 'layout-post-navigation' ) );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'single' ); ?>

			<?php
			if ( ! $hide_navigation  ) :
				blink_post_nav();
			endif;
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
