<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file is used for author pages
 */

//get template header
get_header();

//start post loop
if(have_posts()) : ?>

<?php if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) echo '<div id="post" class="home-sidebar">'; ?>
    <header id="page-heading">
        <?php
        if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
        else :
        $curauth = get_userdata(intval($author));
        endif; ?>
         <h1><span><?php _e('Posts by','wpex'); ?>: <?php echo $curauth->display_name; ?></span></h1>
    </header><!-- /page-heading -->
    
    <div id="archive-entries-wrap" class="clearfix">
    	<div class="grid-loader"><i class="icon-spinner icon-spin"></i></div>
    
        <div id="wpex-grid-wrap">
            <?php
			while (have_posts()) {
				the_post( );
				$format = get_post_format();
				if ( false === $format ) $format = 'standard';
				get_template_part( '/formats/entry', $format );
			} ?>
        </div><!-- /wpex-grid-wrap -->
        <?php if( of_get_option( 'pagination_style', 'infinite_scroll' ) == 'infinite_scroll' ) { ?>
            <?php wpex_infinite_scroll(); ?>
        <?php } elseif( of_get_option( 'pagination_style', 'infinite_scroll' ) == 'load_more' ) { ?>
            <?php echo aq_load_more(); ?>
        <?php } else { ?>
            <?php wpex_paginate_pages(); ?>
        <?php } ?>
        
	</div><!-- /archive-entries-wrap -->
    
<?php if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) echo '</div>';

//end loop
endif;

// display sidebar if enabled
if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) get_sidebar();

//get footer template
get_footer(); ?>