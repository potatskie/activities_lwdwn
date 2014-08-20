<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get template header
get_header(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>	
</div><!-- /page-heading -->
<div id="img-attch-page">
    <a href="<?php echo wp_get_attachment_url(get_the_ID(), 'full-size'); ?>" class="fancybox"><?php $portimg = wp_get_attachment_image( get_the_ID(), 'full' ); echo preg_replace('#(width|height)="\d+"#','',$portimg);?></a>
    <div id="img-attach-page-content">
        <?php the_content(); ?>
    </div><!-- /img-attach-page-content -->
</div><!-- /img-attch-page -->  
<?php
//get template footer
get_footer(); ?>