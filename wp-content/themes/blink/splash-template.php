<?php
/**
Template Name: Splash Template
*/

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php remove_filter( 'the_content', 'wpautop' ); ?>
				<?php the_content(); ?>
				<?php
					//echo  "<pre>";
					//print_r(get_post_custom(get_the_ID()));
					//echo "</pre>";
					$custom_fields = get_post_custom(get_the_ID());
					$featured_image_1 = $custom_fields['featured image 1'][0];
					$featured_image_2 = $custom_fields['featured image 2'][0];
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<script type="text/javascript">
		(function($){
			$(document).ready(function() {
				var img1 = '<?php echo $featured_image_1; ?>';
				var img2 = '<?php echo $featured_image_2; ?>';
				var my_images = [img1,img2];
			    $('.page1add').css({
			        "background":"url('" + img1 + "')",
			        "background-size":"cover"
			    });
			    $('.page1').css({
			        "opacity":0,
			        "background":"url('" + img2 + "')",
			        "background-size":"cover"
			    });
			    var i = 2;
			    setInterval(function(){
			        if(i>2) {
			            i = 1;
			            j = 2;
			        } else {
			            j = i - 1;
			        }
			        $('.page1add').css({
			            "background":"url('" + my_images[j-1] + "')",
			            "background-size":"cover"
			        });
			        $('.page1').css({
			            "opacity":0,
			            "background":"url('" + my_images[i-1] + "')",
			            "background-size":"cover"
			        });
			        $('.page1').animate({ opacity: 1 }, { duration: 3000 });
			        i = i + 1;
			    },5000);

			    $('#page-content').css('margin-top', $('.page1').css('height'));
			    
			});
			
			$(window).resize(function () {
			    $('#page-content').css('margin-top', $('.page1').css('height'));
			});
			
		})(jQuery);
	</script>

<?php get_footer(); ?>
