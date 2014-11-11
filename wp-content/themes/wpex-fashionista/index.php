<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get template header
get_header();

//get sidebar wrap
if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) echo '<div id="post" class="home-sidebar">'; ?>

    <div id="home-wrap" class="clearfix">
        <div class="category-filters-wrapper">
            <?php $cat_arr = category_filter_array(); ?>
            <ul>
                <li>
                    <a href="#" class="category-filters compound" data-slug="category-day-trips"><?php echo $cat_arr['day-trips']['title']; ?></a>
                </li>
                <li>
                    <a href="#" class="category-filters compound" data-slug="category-24-hours"><?php echo $cat_arr['24-hours']['title']; ?></a>
                </li>
                <li>
                    <a href="#" class="category-filters compound" data-slug="category-walking-tours"><?php echo $cat_arr['walking-tours']['title']; ?></a>
                </li>
                <li>
                    <a href="#" class="category-filters compound" data-slug="category-this-week">This Week</a>
                </li>
                <li class="selected">
                    <a  class="category-filters single" href="#" data-slug="category-all">All</a>
                </li>
            </ul>
        </div>
    	<div class="grid-loader"><i class="icon-spinner icon-spin"></i></div>
         <div id="wpex-grid-wrap">
           <?php
            if (have_posts()) { 
                while (have_posts()) {
                    the_post( );
                    $is_featured = simple_fields_value('featured');
                    $format = get_post_format();
                    if ( false === $format ) $format = 'standard';
                    get_template_part( '/formats/entry', $format );
                }
            }
            ?>
        </div><!-- /wpex-grid-wrap -->
        <?php if( of_get_option( 'pagination_style', 'infinite_scroll' ) == 'infinite_scroll' ) { ?>
        	<?php wpex_infinite_scroll(); ?>
        <?php } elseif( of_get_option( 'pagination_style', 'infinite_scroll' ) == 'load_more' ) { ?>
        	<?php echo aq_load_more(); ?>
        <?php } else { ?>
        	<?php wpex_paginate_pages(); ?>
        <?php } ?>
    </div><!-- /home-wrap -->
    
<?php
// Get Sidebar
if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) {
	echo '</div>';
	get_sidebar();
}
//get template footer
get_footer(); ?>
