<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Standard Post Format
 */

//load slider script
wp_enqueue_script('flexslider-gallery-init', get_template_directory_uri() .'/js/flexslider-gallery-init.js', array('jquery','flexslider'), '1.0', true);
	
	//get img attachments
	$attachments = wpex_get_gallery_ids();
	if ( $attachments ) { ?>
		<div class="flexslider-container single-post-slider">
			<div id="slider-<?php echo get_the_ID() ?>" class="flexslider flexslider-gallery">
				<ul class="slides">
					<?php
					// Loop through img attachments	
					foreach ( $attachments as $attachment ) :
						$attachment_meta = wpex_get_attachment( $attachment ); ?>
						<li class="slide">
							<?php if ( wpex_gallery_is_lightbox_enabled() == 'on' ) { ?>
								<a href="<?php echo wp_get_attachment_url( $attachment ); ?>" title="<?php echo $attachment_meta['alt']; ?>" class="fancybox" rel="wpexLightboxGallery">
							<?php } ?>
							<img id="post-thumbnail" src="<?php echo aq_resize( wp_get_attachment_url( $attachment ), wpex_img_size( 'post', 'width' ), wpex_img_size( 'post', 'height' ), wpex_img_size( 'post', 'crop' ) ); ?>" alt="<?php echo the_title(); ?>" />
							<?php if ( wpex_gallery_is_lightbox_enabled() == 'on' ) { ?>
								</a>
							<?php } ?>
							<?php if ( $attachment_meta['description'] ) { ?>
								<div class="single-post-slider-caption clearfix">
									<?php echo $attachment_meta['description']; ?>
								</div>
							<?php } ?>
						</li>
					<?php endforeach; //end $img_attachment ?>
			</ul><!-- /slides -->
		</div><!-- /portfolio-slider -->
	</div><!-- /flex-slider-container -->
<?php } //end if $img_attachments ?>